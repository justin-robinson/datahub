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
        $this->meroveusClient = new MeroveusClient(['path' => 'http://acbj-stg.meroveus.com:8080/api']);
        $this->companyService = new CompanyService($this->meroveusClient);
        $this->elasticaClient = new ElasticaClient([
            'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
            '9200',
        ]);
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
     * {AKEY:"", EKEY:"", MODE:"SEARCH", "SET":{RECTYP:"Business"}, "KEYWORDS":"published:true", "ENV":"4"}
     */
    public function matchAction()
    {
        $result = $this->companyService->fetchByMarket(
            $this->meroveusClient,
            'charlotte',
            [
                'HISTORY'  => '-1 day',
                'STARTROW' => '1',
                'MAXROWS'  => '1',
                'SET'      => [
                    'RECTYP' => 'Business',
                ],
                'KEYWORDS' => 'published:true',
                'ENV'      => '10',
                'META'     => [
                    'RECTYP' => 'Business',
                ],
            ]
        );
        /**
         * i need
         *  name
         *  state
         *  city
         *  zip
         *
         */
        echo "result: " . PHP_EOL;
        var_dump($result);

        echo 'Something has been done.' . PHP_EOL;
    }

    /**
     * return a company by it's id
     */
    public function fetchbyidAction()
    {
        $id             = $this->getRequest()->getParam('id');
        $MeroveusClient = new ClientService(['path' => 'http://acbj-stg.legendarydata.com/relay']);
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