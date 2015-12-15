<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Elastica\Client as ElasticaClient;
use Elastica\Query as ElasticaQuery;
use Elastica\Search as ElasticaSearch;
use Services\Meroveus\CompanyService;
use Services\Meroveus\Client as MeroveusClient;
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

    private $meroveusClient;

    private $elasticaClient;

    private $companyService;

    private $elasticSearch;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->meroveusClient = new MeroveusClient;
        $this->companyService = new CompanyService($this->meroveusClient);
        $this->elasticaClient = new ElasticaClient(['http://datahub.listsandleads.elasticsearch.bizj-dev.com', '9200',]);
        $this->elasticSearch  = new ElasticaSearch($this->elasticaClient);
    }
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
        /**
         * 1. step through the markets
         * 2. find array of company ids
         */
        echo $this->meroveusClient->send('SEARCH', 'charlotte');

        foreach ($this->markets as $marketCode) {

            $companies = $this->companyService->fetchByMarket($marketCode);

            /**
             * step through the companies and query elastic for their data
             */
            foreach ($companies as $company) {


//                write a meroveus query



                /**
                 * get company info from meroveus
                 * query elastic
                 */

//                $query = new ElasticaQuery();

                // define the query somehow
//                $query->setQuery(new ElasticaQuery\MatchAll());
                /**
                 * if match
                 *  insert the company['id']
                 * else
                 *  create a new company record
                 */
            }
        }

        echo 'Something has been done.'.PHP_EOL;
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

    public function getMarkets()
    {
        return $this->markets;
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