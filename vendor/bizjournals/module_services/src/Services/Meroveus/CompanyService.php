<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 9:42 AM
 */

namespace Services\Meroveus;

use Services\AbstractService;
use Hub\Model\Company;
use Zend\Json;

/**
 * Class CompanyService
 * @package Services\Meroveus
 */
class CompanyService extends AbstractService
{

    /**
     * @param \Services\Meroveus\Client $meroveusClient
     * @param $market
     * @param array $meroveusParams
     * @return array
     */
    public function fetchByMarket
    (\Services\Meroveus\Client $meroveusClient, $market = '', array $meroveusParams = [])
    {
        $result          = $meroveusClient->send('SEARCH', $market, $meroveusParams);
        $formattedResult = $this->formatResult($result);
        return $formattedResult;
    }

    public function findOneByRefineryId($refineryId)
    {
        $companyFactory = $this->getServiceLocator()->get('Hub\Model\Company');
        $company        = $companyFactory->findOneBy(['refinery_id' => $refineryId]);

        return $company;
    }

    /**
     * @param array $result
     * @return array
     *
     */
    private function formatResult(array $result)
    {
        $labels = isset($result['LABELS']) ? $result['LABELS'] : null;
        $list   = [];
        if (isset($result['SET']['RECS'])) {
            foreach ($result['SET']['RECS'] as $k => $record) {
                $company = [];

                foreach ($record['DATA'] as $dk => $data) {
                    $company['meroveusId'] = isset($record['ID']) ? $record['ID'] : null;
                    $stateId               = null;
                    $state                 = null;
                    if (!isset($data['VAL']) && $data['KEY'] === "street-state_static") {
                        $stateId = $data['LABELIDS'][0];
                        $state   = $this->getStateFromId($stateId, $labels);
                    }
                    if (isset($data['VAL'])) {
                        $value = !is_array($data['VAL']) ? $data['VAL'] : null;
                    } else {
                        $value = $state;
                    }
                    $company[$data['KEY']] = $value;
                    // I want consistency
                    ksort($company);
                }
                array_push($list, $company);
            }

            return $list;
        } else {
            return null;
        }
    }

    /**
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
}