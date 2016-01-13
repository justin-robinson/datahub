<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 9:42 AM
 */

namespace Services\Meroveus;

use Services\AbstractService;
use Zend\Json;

/**
 * Class CompanyService
 * @package Services\Meroveus
 */
class CompanyService extends AbstractService
{

    /**
     * queries meroveus and formats the return
     *
     * @param \Services\Meroveus\Client $meroveusClient
     * @param $market
     * @param array $meroveusParams
     * @return array
     */
    public function fetchByMarket(\Services\Meroveus\Client $meroveusClient, $market = '', array $meroveusParams = [])
    {

        if (!$meroveusClient) {
            //@todo log and catch it
            return false;
        }
        $result          = $meroveusClient->send('SEARCH', $market, $meroveusParams);
        $formattedResult = $this->formatResult($result);
        return $formattedResult;
    }


    /**
     * return company object
     *
     * @param $refineryId
     * @return \Hub\Model\Company
     * @todo refactor for DI and write test
     */
    public function findOneByRefineryId($refineryId)
    {
        /** @var $companyFactory  \Hub\Model\Company */
        $companyFactory = $this->getServiceLocator()->get('Hub\Model\Company');
        /** @var $company  \Hub\Model\Company */
        $company = $companyFactory->findOneBy(['refinery_id' => $refineryId]);
        return $company;
    }


    /**
     * returns json encoded company
     *
     * @param $refineryId
     * @return string
     * @todo refactor for DI and write test
     */
    public function get($refineryId)
    {
        /** @var $companyFactory  \Hub\Model\Company */
        $companyFactory = $this->getServiceLocator()->get('Hub\Model\Company');
        /** @var $company  \Hub\Model\Company */
        $company = $companyFactory->findOneBy(['hub_id' => $refineryId]);
        $contacts = $company->getContacts();
        $company = $company->toArray();
        $company['contacts'] = $contacts;
        return json_encode($company);
    }

    public function findOneByMeroveusId($meroveusId)
    {
        /** @var $companyFactory  \Hub\Model\Company */
        $companyFactory = $this->getServiceLocator()->get('Hub\Model\Company');
        /** @var $company  \Hub\Model\Company */
        $company = $companyFactory->findOneBy(['meroveus_id' => $meroveusId]);
        return $company;
    }

    /**
     * formats the merovious return
     *
     * @param array $result
     * @return mixed array/bool
     */
    private function formatResult(array $result)
    {

        $labels = isset($result['LABELS']) ? $result['LABELS'] : null;
        $list   = [];
        if (isset($result['SET']['RECS'])) {

            // data we care about is in the RECS index of the result SET
            // each record is a company in the queried market
            foreach ($result['SET']['RECS'] as $k => $record) {

                $company = [];
                // walk the company data and extract and normalise
                foreach ($record['DATA'] as $dk => $data) {
                    $company['meroveusId'] = isset($record['ID']) ? $record['ID'] : null;

                    // figure out the correct state vaule
                    $stateId = null;
                    $state   = null;
                    if (!isset($data['VAL']) && $data['KEY'] === "street-state_static") {
                        $stateId = $data['LABELIDS'][0];

                        $state = $this->getStateFromId($stateId, $labels);
                    }
                    if (isset($data['VAL'])) {
                        $value = !is_array($data['VAL']) ? $data['VAL'] : null;
                    } else {
                        $value = $state;
                    }
                    $company[$data['KEY']] = $value;
                    // extract latitute and longitude from the return
                    $company['coordinates'] = [
                        'lat'  => isset($record['LATLONG']) ? $record['LATLONG'][0] : 0,
                        'long' => isset($record['LATLONG']) ? $record['LATLONG'][1] : 0,
                    ];
                    $company['contacts'] = [];
                    if (!empty($data['SET']) && $data['KEY'] === 'keycontact-set_static') {
                        if (!empty($data['SET']['RECS'])) {

                            foreach ($data['SET']['RECS'] as $meroveusContact) {
                                array_push($company['contacts'], $meroveusContact);
                            }
                        }
                    }
                    // We want consistency in the field order
                    ksort($company);
                }
                array_push($list, $company);
            }
            return $list;
        } else {
            return false;
        }
    }

    /**
     * used for getting state data in the form that we want by extracing them from the labels
     * returned by meroveus
     *
     * @param $stateId
     * @param array $labelsArray
     * @return null|string
     */
    private function getStateFromId($stateId, array $labelsArray)
    {
        if (!$stateId) {
            return null;
        }
        foreach ($labelsArray as $k => $label) {
            if ($label['LABELID'] === $stateId) {
                return isset($label['PostalCode']) ? $label['PostalCode'] : 'not available';
            }
        }
    }

    /**
     * pull out, normalize and save contact info
     * @param $data
     */
    private function processContact($data)
    {
        $contactService = $this->getServiceLocator()->get('Services\Meroveus\Contact');
        return $contactService;
    }
}