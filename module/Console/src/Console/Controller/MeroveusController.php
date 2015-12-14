<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Elastica\Connection;
use Services\Meroveus\CompanyService;
use Zend\Mvc\Controller\AbstractActionController;
use Hub\Model\Journal;
//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 * @package Console\Controller
 */
class MeroveusController extends AbstractActionController
{
    /** @todo replace this with a method call */
    private $markets = [
        'bizjournals',
        'albany',
        'albuquerque',
        'allentown',
        'anchorage',
        'atlanta',
        'austin',
        'baltimore',
        'birmingham',
        'boston',
        'buffalo',
        'charleston',
        'charlotte',
        'chicago',
        'cincinnati',
        'cleveland',
        'coloradosprings',
        'columbia',
        'columbus',
        'dallas',
        'dayton',
        'denver',
        'desmoines',
        'detroit',
        'eastbay',
        'elpaso',
        'fairfield',
        'fresno',
        'ftworth',
        'grandrapids',
        'triad',
        'greenville',
        'pacific',
        'houston',
        'indianapolis',
        'jackson',
        'jacksonville',
        'kansascity',
        'lasvegas',
        'longisland',
        'losangeles',
        'louisville',
        'masshightech',
        'memphis',
        'milwaukee',
        'twincities',
        'nashville',
        'newbrunswick',
        'newjersey',
        'neworleans',
        'newyork',
        'oklahomacity',
        'ontario',
        'orange',
        'orlando',
        'philadelphia',
        'phoenix',
        'pittsburgh',
        'portland',
        'providence',
        'pueblo',
        'triangle',
        'rochester',
        'sacramento',
        'sanantonio',
        'sandiego',
        'sanfernando',
        'sanfrancisco',
        'santabarbara',
        'santarosa',
        'seattle',
        'sanjose',
        'sonoma',
        'southflorida',
        'springfield',
        'stlouis',
        'syracuse',
        'tampabay',
        'tuscon',
        'upstart',
        'washington',
        'wenatchee',
        'westchester',
        'western',
        'whiteplains',
        'wichita',
    ];

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
        $company = $this->getServiceLocator()->get('Services\Meroveus\CompanyService');
//        $contact = $this->getServiceLocator()->get('Hub\Model\Contact');
        echo "line 135". ' in '."MeroveusController.php".PHP_EOL;
        die(var_dump( $company ));
//        $MeroveusClient = $this->getServiceLocator()->get('Services\Meroveus\Company');
//        echo "line 138". ' in '."MeroveusController.php".PHP_EOL;
//        die(var_dump( $MeroveusClient ));
//        $companyService = new CompanyService($MeroveusClient);
//        $elasticaClient = new ElasticaClient();
//
//        $connection    = new Connection(['http://datahub.listsandleads.elasticsearch.bizj-dev.com', '9200',]);
//        $elasticSearch = new Search($elasticaClient);
//        foreach ($this->markets as $marketCode) {
//            $companies = $companyService->fetchByMarket($marketCode);
//            foreach ($companies as $company) {
//                // do something here
//                $body = $company;
//
//                $body   = '{}';
//                $insert = $this->processForInsert($elasticSearch->search());
//                if (!$insert) {
//                    break;
//                } else {
//                    $this->doInsert();
//                }
//            }
//        }
//
//        echo 'Something has been done.'.PHP_EOL;
    }

    /**
     * return a company by it's id
     */
    public function fetchbyidAction()
    {
        $id             = $this->getRequest()->getParam('id');
        $MeroveusClient = new ClientService();;
        $companyService = new CompanyService($MeroveusClient);
        $company        = $companyService->findById($id);
        echo 'fetchCompanyById' . ' in ' . 'MeroveusController.php' . PHP_EOL;
        var_dump($company);
        echo PHP_EOL;
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