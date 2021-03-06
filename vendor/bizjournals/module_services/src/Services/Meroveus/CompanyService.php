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

    private $akey;

    private $ekey;

    private $meroveus;

    private $curl;

    public function __construct()
    {
        $this->akey     = 'dJoJubaKc2sGEyVWvg3h6ICUC';
        $this->ekey     = 'UdHuwsJhWgyhMWhpBAxkmydnT';
        $this->meroveus = 'http://acbj-stg.meroveus.com:8080/api';
        $this->curl     = curl_init($this->meroveus);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Expect:']);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
    }

    public function __destruct () {
        curl_close($this->curl);
    }

    /**
     * queries meroveus and formats the return
     *
     * @param \Services\Meroveus\Client $meroveusClient
     * @param $market
     * @param array $meroveusParams
     * @return array
     */
//    public function fetchByMarket(\Services\Meroveus\Client $meroveusClient, $market = '', array $meroveusParams = [])
    public function fetchByMarket(array $meroveusParams)
    {
        return $this->formatResult($this->queryMeroveus($meroveusParams));
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
        $company             = $companyFactory->findOneBy(['hub_id' => $refineryId]);
        $contacts            = $company->getContacts();
        $company             = $company->toArray();
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
        $labels = [];

        if ( isset($result['LABELS']) ) {

            foreach ( $result['LABELS'] as &$label ) {
                $labels[$label['LABELID']] = $label;
            }
        }

        $list   = [];
        if (isset($result['SET']['RECS'])) {

            // data we care about is in the RECS index of the result SET
            // each record is a company in the queried market
            foreach ($result['SET']['RECS'] as $k => $record) {

                $company = [
                    'meroveusId' => isset($record['ID']) ? $record['ID'] : null,
                    'createdAt'  => isset($record['CREATEDATE']) ? $record['CREATEDATE'] : null,
                    'updatedAt'  => isset($record['LASTUPDATE']) ? $record['LASTUPDATE'] : null,
                    'contacts'   => [ ],
                    'execs'      => [ ],
                ];

                // walk the company data, extract and normalise
                foreach ($record['DATA'] as $dk => $data) {

                    // figure out the correct state value
                    if (!isset($data['VAL']) && $data['KEY'] === "street-state_static") {
                        $data['VAL'] = $this->getValueFromLabelId($data['LABELIDS'][0], $labels, 'PostalCode');
                    }
                    // figure out the correct industry values
                    else if (!isset($data['VAL']) && $data['KEY'] === 'firm-industry_static') {
                        $industries = [];
                        foreach ( $data['LABELIDS'] as $labelId ) {
                            $industries[] = "'" . $this->getValueFromLabelId($labelId, $labels) . "'";
                        }
                        $data['VAL'] = implode(',', $industries);
                    }

                    if (isset($data['VAL'])) {
                        $value = !is_array($data['VAL']) ? $data['VAL'] : null;
                    } else {
                        $value = null;
                    }

                    $company[$data['KEY']] = $value;

                    // extract latitute and longitude from the return
                    $company['coordinates'] = [
                        'lat'  => isset($record['LATLONG']) ? $record['LATLONG'][0] : 0,
                        'long' => isset($record['LATLONG']) ? $record['LATLONG'][1] : 0,
                    ];

                    if (!empty($data['SET']) && $data['KEY'] === 'keycontact-set_static') {
                        if (!empty($data['SET']['RECS'])) {
                            foreach ($data['SET']['RECS'] as $meroveusContact) {
                                $company['contacts'][] = $meroveusContact;
                            }
                        }
                    }


                    if (!empty($data['SET']) && $data['KEY'] === 'keyexec-set_static') {
                        if (!empty($data['SET']['RECS'])) {
                            foreach ($data['SET']['RECS'] as $execs) {
                                $company['execs'][] = $execs;
                            }
                        }
                    }
                }

                // We want consistency in the field order
                ksort($company);

                $list[] = $company;
            }

            return $list;
        } else {
            return false;
        }
    }

    /**
     * lookup a label value by id and key name
     *
     * @param        $labelId
     * @param array  $labels
     * @param string $key
     *
     * @return null|string
     */
    private function getValueFromLabelId($labelId, array &$labels, $key = 'NAME'){
        if (!$labelId) {
            return null;
        }

        if ( empty($labels[$labelId]) ) {
            return null;
        }

        return isset($labels[$labelId][$key]) ? $labels[$labelId][$key] : 'not available';
    }

    /**
     * pull out, normalize and save contact info
     * @param $data
     * @return \Services\Meroveus\Contact
     */
    private function processContact($data)
    {
        $contactService = $this->getServiceLocator()->get('Services\Meroveus\Contact');
        return $contactService;
    }

    /**
     * fetch the meroveus return
     * @param $meroveusParams
     * @return bool
     */
    private function queryMeroveus(array $meroveusParams = [], $isRootQuery = false)
    {

        /* Uncomment to simulate all requests after the first one
         * if ( isset($this->return) ) {

            return rand(0,10) > 2 ? $this->return : $this->returnEmpty;
        }*/

        $return    = null;
        $sendArray = $meroveusParams + [
                'AKEY' => $this->akey,
                'EKEY' => $this->ekey,
                'MODE' => 'SEARCH',
            ];
        $sendJson  = json_encode($sendArray);
        /* send a request to Meroveus! takes JSON string, posts via curl, returns JSON string */
        $json = str_replace('%2B', '+', $sendJson);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, ($isRootQuery ? 'MROOT' : 'MCORE') . '=' . urlencode($json));
        $result = curl_exec($this->curl);
        if ($result) {
            $result   = str_replace(":NaN", ":0", gzinflate(substr($result, 10, -8)));
            try {
                $result = Json\Json::decode($result, Json\Json::TYPE_ARRAY);
            } catch ( \RuntimeException $e ) {

            }
            /* Uncomment to simulate all requests after the first one
             *             $this->return = $return;
                        $return['Labels'] = [];
                        $return['RECCOUNT'] = 0;
                        unset($return['FOOTNOTES']);
                        unset($return['SET']['RECS']);
                        $this->returnEmpty = $return;
            */
            return $result;
        } else {
            echo 'no meroveus reaponse';
            return false;
        }
    }

    /**
     * Query meroveus with MROOT payload
     * @param array $meroveusParams
     *
     * @return bool
     */
    public function queryMeroveusRoot(array $meroveusParams) {
        return $this->queryMeroveus($meroveusParams, true);
    }


}

