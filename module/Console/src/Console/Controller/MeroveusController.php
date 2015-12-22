<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Elastica\Client as ElasticaClient;
use Elastica\Query as ElasticaQuery;
use Elastica\QueryBuilder as QueryBuilder;
use Elastica\Search as ElasticaSearch;
use Services\Meroveus\CompanyService;
use Services\Meroveus\Client as MeroveusClient;
use Zend\Mvc\Controller\AbstractActionController;

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 * @package Console\Controller
 */
class MeroveusController extends AbstractActionController
{
    /**
     * @var array $markets
     * map of our parket names to their respective meroveus environments
     */
    private $markets = [
        'albany'       => '12',
        'albuquerque'  => '9',
        'atlanta'      => '11',
        'austin'       => '22',
        'baltimore'    => '15',
        'birmingham'   => '30',
        'boston'       => '34',
        'buffalo'      => '3',
        'charlotte'    => '26',
        'cincinnati'   => '6',
        'columbus'     => '31',
        'dallas'       => '7',
        'dayton'       => '19',
        'denver'       => '2',
        'houston'      => '8',
        'jacksonville' => '23',
        'kansascity'   => '13',
        'louisville'   => '32',
        'memphis'      => '10',
        'milwaukee'    => '33',
        'nashville'    => '20',
        'orlando'      => '17',
        'pacific'      => '38',
        'philadelphia' => '16',
        'phoenix'      => '14',
        'pittsburgh'   => '18',
        'portland'     => '24',
        'sacramento'   => '4',
        'sanantonio'   => '25',
        'sanfrancisco' => '39',
        'sanjose'      => '40',
        'seattle'      => '41',
        'southflorida' => '35',
        'stlouis'      => '28',
        'tampabay'     => '36',
        'triad'        => '29',
        'triangle'     => '27',
        'twincities'   => '21',
        'washington'   => '5',
        'wichita'      => '37',
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
            'host' => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
            'path' => 'rerefinery/',
            'port' => '9200',
            'url'  => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery/',
        ]);
        $this->elasticaClient->getLastRequest();
        $this->elasticSearch = new ElasticaSearch($this->elasticaClient);
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
     * php run.php  meroveus match -e development
     */
    public function matchAction()
    {
        echo "
     ▄▄       ▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄               ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄
    ▐░░▌     ▐░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌             ▐░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░▌
    ▐░▌░▌   ▐░▐░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌ ▐░▌           ▐░▌ ▐░█▀▀▀▀▀▀▀▀▀ ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░▌
    ▐░▌▐░▌ ▐░▌▐░▌▐░▌          ▐░▌       ▐░▌▐░▌       ▐░▌  ▐░▌         ▐░▌  ▐░▌          ▐░▌       ▐░▌▐░▌          ▐░▌
    ▐░▌ ▐░▐░▌ ▐░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄█░▌▐░▌       ▐░▌   ▐░▌       ▐░▌   ▐░█▄▄▄▄▄▄▄▄▄ ▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░▌
    ▐░▌  ▐░▌  ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌    ▐░▌     ▐░▌    ▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░▌
    ▐░▌   ▀   ▐░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀█░█▀▀ ▐░▌       ▐░▌     ▐░▌   ▐░▌     ▐░█▀▀▀▀▀▀▀▀▀ ▐░▌       ▐░▌ ▀▀▀▀▀▀▀▀▀█░▌▐░▌
    ▐░▌       ▐░▌▐░▌          ▐░▌     ▐░▌  ▐░▌       ▐░▌      ▐░▌ ▐░▌      ▐░▌          ▐░▌       ▐░▌          ▐░▌ ▀
    ▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░▌      ▐░▌ ▐░█▄▄▄▄▄▄▄█░▌       ▐░▐░▌       ▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄█░▌ ▄▄▄▄▄▄▄▄▄█░▌ ▄
    ▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌        ▐░▌        ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌
     ▀         ▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀         ▀  ▀▀▀▀▀▀▀▀▀▀▀          ▀          ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀
" . PHP_EOL;
        $maxRows  = 500;
        $compiled = [];
        // test markets
        $markets = [
//            'albany' => '26',
            'albuquerque' => '9',
        ];
        foreach ($markets as $env) {
            array_push($compiled, $this->paginatedSearch($env, $maxRows));
        }
        $matched  = 0;
        $inserted = 0;
        foreach ($compiled as $marketResults) {
            foreach ($marketResults as $result) {
                if ($this->elasticMatch($result)) {
                    $matched++;
                } else {
                    $inserted++;
                }
            }
        }
        echo $matched . ' records matched ' . PHP_EOL;
        echo $inserted . ' records not matched ' . PHP_EOL;
//        var_dump($compiled[0]);
//
//        var_dump($compiled[0][1]);
//        var_dump($this->elasticMatch($compiled[0][1]));

        echo 'Something has been done.' . PHP_EOL;
    }


    /**
     * chunks the queries for throttling
     * @param string $env (this represents the market in the query to meroveus)
     * @param int $maxRows (max returned results per call)
     * @return array ( filtered and compiled results )
     */
    private function paginatedSearch($env, $maxRows = 25)
    {

        $bigOleList = [];

        /**
         * get $maxRows results,
         * do we have any results
         * add them to the list
         * add $maxRows to the offset
         */

        $run      = true;
        $startRow = 1;
        do {
            $result = $this->companyService->fetchByMarket(
                $this->meroveusClient,
                'charlotte',
                [
                    'STARTROW' => $startRow,
                    'MAXROWS'  => $maxRows,
                    'SET'      => [
                        'RECTYP' => 'Business',
                    ],
                    'KEYWORDS' => 'published:true',
                    'ENV'      => $env,
                    'META'     => [
                        'RECTYP' => 'Business',
                    ],
                ]
            );
            if (is_array($result)) {
                foreach ($result as $company) {

                    array_push($bigOleList, $company);
                }
                $startRow = $startRow + $maxRows;
            } else {
                $run = false;
            }

        } while ($run);

        return $bigOleList;

    }


    /**
     * @param array $target
     * @return array
     * query elastic for match
     *  return pertinent data for further processing
     */
    private function elasticMatch(array $target)
    {
        if (empty($target)) {
            return false;
        }

        $search = new ElasticaSearch($this->elasticaClient);
        $query  = new ElasticaQuery();
        $q      = new QueryBuilder();
        // @todo I do not like this, but it works
        if (
            !isset($target['firm-name_static'])
            || !isset($target['street-state_static'])
            || !isset($target['street-city_static'])
            || !isset($target['street-address_static'])
            || !isset($target['street-zip_static'])
        ) {
            return false;
        }

        $query->setQuery($q->query()->bool()
            ->addMust($q->query()->match('Name', $target['firm-name_static']))
            ->addMust($q->query()->match('State', $target['street-state_static']))
            ->addMust($q->query()->match('City', $target['street-city_static']))
            ->addMust($q->query()->match('Addr1', $target['street-address_static']))
            ->addMust($q->query()->match('PostalCode', $target['street-zip_static']))
        );

        $resultSet = $search->search($query);
        $topScore  = $resultSet->getMaxScore();

        foreach ($resultSet->getResults() as $result) {
            if ($result->getScore() >= 13 && $result->getScore() === $topScore) {
                return true;

            } else {
                return false;

            }
        }
    }

}