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
     * @param \Services\Meroveus\Client $meroveusClient
     * @param $market
     * @param array $meroveusParams
     * @return array
     */
    public function fetchByMarket(\Services\Meroveus\Client $meroveusClient, $market = '', array $meroveusParams = [])
    {
        $result          = $meroveusClient->send('SEARCH', $market, $meroveusParams);
        $formattedResult = $this->formatResult($result);
        return $formattedResult;
    }


    /**
     * @param $result
     * @return array
     *
     */
    private function formatResult($result)
    {
        $keepFields = [
            'firm-name_static',
            'street-address_static',
            'street-zip_static',
            'street-city_static',
            'street-state_static',
        ];

        $labels = isset($result['LABELS']) ? $result['LABELS'] : null;
        $list   = [];
        if (isset($result['SET']['RECS'])) {
            foreach ($result['SET']['RECS'] as $k => $record) {
                $company = [];
                foreach ($record['DATA'] as $dk => $data) {
                    if (in_array($data['KEY'], $keepFields)) {
                        $stateId = null;
                        $state   = null;
                        if (!isset($data['VAL']) && $data['KEY'] === "street-state_static") {
                            $stateId = $data['LABELIDS'][0];
                            $state   = $this->getStateFromId($stateId, $labels);
                        }
                        if (isset($data['VAL'])) {
                            $value = !is_array($data['VAL']) ? $data['VAL'] : null;
                        } else {
                            $value = $state;
                        }
                        $mergedData = [$data['KEY'] => $value];
                        array_push($company, $mergedData);
                    }
                }
                array_push($list, $company);
            }
            return $list;
        } else {
            return null;
        }
    }

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