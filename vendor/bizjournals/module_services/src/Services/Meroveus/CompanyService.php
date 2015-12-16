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
     * @param $client \Services\Meroveus\Client
     * @param $id
     *
     * @return string
     */
    public function findById($id)
    {
        $request = 'a bunch of meroveus control stuff';

        /** @var $client \Services\Meroveus\Client */
        $client = $this->getClient();
//        $result = $client->sendRequest($request);
        $result = ['test' => 'value' . $id];
        // this will filter out all of the crap that's not needed
        return Json\Json::encode($result);
    }

    /**
     * @param \Services\Meroveus\Client $meroveusClient
     * @param $market
     * @param array $meroveusParams
     * @return array
     */
    public function fetchByMarket(\Services\Meroveus\Client $meroveusClient, $market = '', array $meroveusParams = [])
    {
        // @todo this will be set via APPLICATION_ENV
        if (!empty($meroveusParams)) {
            $meroveusPath = $meroveusParams['path'];
        } else {
            $meroveusPath = 'http://acbj-stg.meroveus.com:8080/api';
        }

        $meroveusClient->setOption('path', $meroveusPath);

//        $test = $meroveusClient->send('SEARCH', 'default', [
//            'ENV'  => '*',
//            'LIST' => [
//                'LISTID' => '3064',
//            ],
//        ]);
        $query           = [];
        $result          = $meroveusClient->send('SEARCH', $market, $query);
        $formattedResult = $this->formatResult($result);
        return $formattedResult;

    }


    /**
     * @param $result
     * @return array
     */
    private function formatResult($result)
    {
        $return = ['formatted' => 'list'];
        return $result;
    }


}