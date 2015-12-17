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
        private $markets = [
        'albany'       => '1',
        'albuquerque'  => '73',
        'atlanta'      => '2',
        'austin'       => '3',
        'baltimore'    => '4',
        'boston'       => '5',
        'birmingham'   => '40',
        'buffalo'      => '6',
        'charlotte'    => '7',
        'cincinnati'   => '8',
        'columbus'     => '9',
        'dallas'       => '10',
        'dayton'       => '11',
        'denver'       => '12',
        'houston'      => '13',
        'jacksonville' => '14',
        'kansascity'   => '15',
        'louisville'   => '16',
        'memphis'      => '17',
        'nashville'    => '20',
        'orlando'      => '21',
        'philadelphia' => '23',
        'phoenix'      => '24',
        'pittsburgh'   => '25',
        'portland'     => '26',
        'sacramento'   => '27',
        'sanantonio'   => '28',
        'southflorida' => '32',
        'stlouis'      => '33',
        'tampabay'     => '34',
        'twincities'   => '19',
        'triad'        => '38',
        'triangle'     => '35',
        'washington'   => '36',
        'wichita'      => '37',
        'milwaukee'    => '18',
        'pacific'      => '22',
        'sanfrancisco' => '29',
        'sanjose'      => '30',
        'seattle'      => '31',
    ];

    /**
     * @var MeroveusClient
     */
    private $meroveusClient;

    /**
     * @var ElasticaClient
     */
    private $elasticaClient;

    /**
     * @var CompanyService
     */
    private $companyService;

    /**
     * @var ElasticaSearch
     */
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
     *
     */
    public function matchAction()
    {
        $bigOleList = [];

        foreach ($this->markets as $name => $id) {

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
                    'ENV'      => $id,
                    'META'     => [
                        'RECTYP' => 'Business',
                    ],
                ]
            );
            if($result)
                array_push($bigOleList, $result);
        }
        echo 'Something has been done.' . PHP_EOL;
        var_dump($bigOleList);
    }

}