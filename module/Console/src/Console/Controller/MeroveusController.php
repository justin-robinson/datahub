<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Elastica\Connection;
use Services\Meroveus\Client;

use Services\Meroveus\CompanyService;

use Services\RabbitMQ\ElasticSearchService;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class MeroveusController
 * @package Console\Controller
 */
class MeroveusController extends AbstractActionController
{
    /**
     * @return string
     */
    public function indexAction()
    {
        $env = $this->getRequest()->getParam('env');
        echo "$env\n";
        return "$env\n";
    }

    /**
     * mostly psuedo code
     * query meroveus for companies by market
     * query elastic for match
     * if match
     *  do stuff
     * else
     *  do other stuff
     */
    public function matchAction()
    {
        $client         = new Client();
        $companyService = new CompanyService($client);
        $markets        = $this->getMarketCodes();
//        $connection     = "http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200";
        $connection = new Connection(["http://datahub.listsandleads.elasticsearch.bizj-dev.com", "9200",]);
        $elastic    = new ElasticSearchService($connection);
        foreach ($markets as $marketCode) {
            $companies = $companyService->fetchByMarket($marketCode);

            foreach ($companies as $company) {

                $body   = '{}';
                $insert = $this->processForInsert($elastic->sendMessage($body));
                if (!$insert) {
                    break;
                } else {
                    $this->doInsert();
                }
            }
        }
    }

    /**
     * return a company by it's id
     */
    public function fetchbyidAction()
    {
        $id             = $this->getRequest()->getParam('id');
        $client         = new Client();
        $companyService = new CompanyService($client);
        $company        = $companyService->findCompanyById($id);
        echo 'fetchCompanyById' . ' in ' . 'MeroveusController.php' . PHP_EOL;
        return var_dump($company);
    }

    /**
     * does whatever needs to be done
     * @param $company
     */
    private function processForInsert($company)
    {
        return boolval(true);
    }

    /**
     * placeholder
     */
    private function getMarketCodes()
    {
        return [];
    }

    /**
     * placeholder
     */
    private function doInsert()
    {

    }

}