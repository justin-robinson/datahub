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
use Elastica\Result;
use Services\Meroveus\CompanyService;
use Services\Meroveus\Client as MeroveusClient;
use Zend\Mvc\Controller\AbstractActionController;
use Hub\Model\Company;

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 * @package Console\Controller
 */
class MeroveusController extends AbstractActionController
{
    /**
     * @var array $markets
     * map of our market names to their respective meroveus environments
     */
    private $markets = [
//        'albany'       => '12',
//        'albuquerque'  => '9',
//        'atlanta'      => '11',
//        'austin'       => '22',
//        'baltimore'    => '15',
        //'birmingham' => '30',
//        'boston'       => '34',
//        'buffalo'      => '3',
//        'charlotte'    => '26',
// last run
//        'cincinnati'   => '6',
//        'columbus'     => '31',
//        'dallas'       => '7',
//        'dayton'       => '19',
//        'denver'       => '2',
//        'houston'      => '8',
//        'jacksonville' => '23',
//        'kansascity'   => '13',
//        'louisville'   => '32',
//        'memphis'      => '10',
//        'milwaukee'    => '33',
//        'nashville'    => '20',
//        'orlando'      => '17',
//        'pacific'      => '38',
//        'philadelphia' => '16',
//        'phoenix'      => '14',
//        'pittsburgh'   => '18',
//        'portland'     => '24',
//        'sacramento'   => '4',
//        'sanantonio'   => '25',
//        'sanfrancisco' => '39',
//        'sanjose'      => '40',
//        'seattle'      => '41',
//        'southflorida' => '35',
//        'stlouis'      => '28',
//        'tampabay'     => '36',
//        'triad'        => '29',
//        'triangle'     => '27',
//        'twincities'   => '21',
//        'washington'   => '5',
//        'wichita'      => '37',
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
     * php run.php  meroveus match -e development
     */
    public function matchAction()
    {

        echo '
             ███▄ ▄███▓   ▓█████     ██▀███      ▒█████      ██▒   █▓   ▓█████     █    ██      ██████
            ▓██▒▀█▀ ██▒   ▓█   ▀    ▓██ ▒ ██▒   ▒██▒  ██▒   ▓██░   █▒   ▓█   ▀     ██  ▓██▒   ▒██    ▒
            ▓██    ▓██░   ▒███      ▓██ ░▄█ ▒   ▒██░  ██▒    ▓██  █▒░   ▒███      ▓██  ▒██░   ░ ▓██▄
            ▒██    ▒██    ▒▓█  ▄    ▒██▀▀█▄     ▒██   ██░     ▒██ █░░   ▒▓█  ▄    ▓▓█  ░██░     ▒   ██▒
            ▒██▒   ░██▒   ░▒████▒   ░██▓ ▒██▒   ░ ████▓▒░      ▒▀█░     ░▒████▒   ▒▒█████▓    ▒██████▒▒
            ░ ▒░   ░  ░   ░░ ▒░ ░   ░ ▒▓ ░▒▓░   ░ ▒░▒░▒░       ░ ▐░     ░░ ▒░ ░   ░▒▓▒ ▒ ▒    ▒ ▒▓▒ ▒ ░
            ░  ░      ░    ░ ░  ░     ░▒ ░ ▒░     ░ ▒ ▒░       ░ ░░      ░ ░  ░   ░░▒░ ░ ░    ░ ░▒  ░ ░
            ░      ░         ░        ░░   ░    ░ ░ ░ ▒          ░░        ░       ░░░ ░ ░    ░  ░  ░
                   ░         ░  ░      ░            ░ ░           ░        ░  ░      ░              ░
                                                     ░
';
        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;
        $maxRows       = 500;
        $compiled      = [];
        $totalMatched  = 0;
        $totalInserted = 0;

        foreach ($this->markets as $market => $env) {
            $marketCompanyList = $this->paginatedSearch($env, $market, $maxRows);
            $marketMatched     = 0;
            $marketInserted    = 0;
            foreach ($marketCompanyList as $target) {

                $match = $this->elasticMatch($target);

                if ($match) {
                    // update existing record here
                    $this->processMatch($match, $target);

                    $this->writeSanityFiles($market, $target, $match);
                    $marketMatched++;
                    $totalMatched++;
                } else {

                    // function to add new record

                    $queryParams                   = [];
                    $queryParams[':refinery_id']   = isset($target['refinery_id']) ? $target['refinery_id'] : 'noData';
                    $queryParams[':meroveus_id']   = isset($target['meroveusId']) ? $target['meroveusId'] : 'noData';
                    $queryParams[':generate_code'] = isset($target['generate_codeId']) ? $target['generate_codeId'] : 'noData';
                    $queryParams[':record_source'] = isset($target['sourceId']) ? $target['sourceId'] : 'noData';;
                    $queryParams[':company_name']       = isset($target['firm-name_static']) ? $target['firm-name_static'] : 'noData';
                    $queryParams[':public_ticker']      = isset($target['idk']) ? $target['idk'] : 'noData';
                    $queryParams[':ticker_exchange']    = isset($target['idk']) ? $target['idk'] : 'noData';
                    $queryParams[':source_modified_at'] = isset($target['idk']) ? $target['idk'] : 'noData';
                    $queryParams[':address1']           = isset($target['street-address_static']) ? $target['street-address_static'] : 'noData';
                    $queryParams[':address2']           = isset($target['street-line2-address_static']) ? $target['street-line2-address_static'] : 'noData';
                    $queryParams[':city']               = isset($target['street-city_static']) ? $target['street-city_static'] : 'noData';
                    $queryParams[':state']              = isset($target['street-state_static']) ? $target['street-state_static'] : null;
                    $queryParams[':postal_code']        = isset($target['street-zip_static']) ? $target['street-zip_static'] : null; // validate
                    $queryParams[':country']            = isset($target['street-country_static']) ? $target['street-country_static'] : null; // validate
                    $queryParams[':latitude']           = isset($target['coordinates']['lat']) ? $target['coordinates']['lat'] : null;
                    $queryParams[':longitude']          = isset($target['coordinates']['long']) ? $target['coordinates']['long'] : null;
                    $queryParams[':phone']              = isset($target['contact-phone_static']) ? $target['contact-phone_static'] : null;
                    $queryParams[':website']            = isset($target['contact-website_static']) ? $target['contact-website_static'] : null;
                    $queryParams[':is_active']          = true;
                    $queryParams[':sic_code']           = isset($target['sicCode']) ? $target['sicCode'] : null;
                    $queryParams[':employee_count']     = 0;
                    $queryParams[':created_at']         = 'NOW()';
                    $queryParams[':updated_at']         = 'NOW()';
                    $queryParams[':deleted_at']         = null;

                    $added = $this->addACompany($queryParams);
                    if (!$added) {
                        echo 'opps, add failed' . PHP_EOL;
                        // log it
                    };

//                    $this->writeSanityFiles($market, $target, false);
                    $marketInserted++;
                    $totalInserted++;
                }
            }
            echo $marketMatched . ' records matched, ' . PHP_EOL . $marketInserted . ' records not matched in ' . $market . PHP_EOL;
        }

        echo $totalMatched . ' total  records matched ' . PHP_EOL;
        echo $totalInserted . ' total records not matched ' . PHP_EOL;
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
        echo 'Enjoy your day' . PHP_EOL;
    }


    /**
     * chunks the queries for throttling
     * @param string $env (this represents the market in the query to meroveus)
     * @param string $market ()
     * @param int $maxRows (max returned results per call)
     * @return array ( filtered and compiled results )
     */
    private function paginatedSearch($env, $market, $maxRows = 25)
    {

        $bigOleList = [];
        $run        = true;
        $startRow   = 1;
        do {
            $result = $this->companyService->fetchByMarket(
                $this->meroveusClient,
                $market,
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
     * @param float $minScore
     * @return array
     * query elastic for match
     *  return pertinent data for further processing
     */
    private function elasticMatch(array $target, $minScore = 9.9)
    {
        if (empty($target)) {
            return false;
        }

        $search  = new ElasticaSearch($this->elasticaClient);
        $query   = new ElasticaQuery();
        $builder = new QueryBuilder();
        // pull out search terms
        $queryFields = [
            'Name'       => isset($target['firm-name_static']) ? $target['firm-name_static'] : false,
            'State'      => isset($target['street-state_static']) ? $target['street-state_static'] : false,
            'City'       => isset($target['street-city_static']) ? $target['street-city_static'] : false,
            'Addr1'      => isset($target['street-address_static']) ? $target['street-address_static'] : false,
            'PostalCode' => isset($target['street-zip_static']) ? $target['street-zip_static'] : false,
        ];

        // make sure that we have what we need
        foreach ($queryFields as $field) {
            if (!$field) {
                return false;
            }
        }

        $query->setQuery(
            $builder->query()->bool()
                ->addShould($builder->query()->match('Name', $queryFields['Name']))
                ->addShould($builder->query()->match('Addr1', $queryFields['Addr1']))
                ->addMust($builder->query()->match('City', $queryFields['City']))
                ->addMust($builder->query()->match('State', $queryFields['State']))
                ->addMust($builder->query()->match('PostalCode', $queryFields['PostalCode']))
        );

        $query->setMinScore($minScore);

        $resultSet = $search->search($query);
        $topScore  = $resultSet->getMaxScore();

        foreach ($resultSet->getResults() as $result) {
            if ($result->getScore() === $topScore) {
                return $result;

            } else {
                return false;

            }
        }

        // if we get here it's broke
        return false;
    }


    /**
     * @param $market
     * @param $target
     * @param $elasticResult
     *
     * mostly useful for debugging and query tuning
     */
    private function writeSanityFiles($market, $target, $elasticResult)
    {
        ksort($target);
        $keepArray = [
            'firm-name_static',
            'street-address_static',
            'street-city_static',
            'street-state_static',
            'street-zip_static',
        ];

        if ($elasticResult) {
            $filename = '/tmp/' . $market . 'hits.txt';
        } else {
            $filename = '/tmp/' . $market . 'misses.txt';
        }

        $fd = fopen($filename, 'a');

        $count = 0;
        foreach ($target as $key => $field) {

            if (in_array($key, $keepArray)) {
                $count++;
            }
        }
        fputs($fd, 'count: ' . $count . ', ');
        foreach ($target as $key => $field) {

            if (in_array($key, $keepArray)) {
                fputs($fd, $key . ': ' . $field . ', ');
            }
        }

        fputs($fd, PHP_EOL);
        fclose($fd);
    }


    /**
     * @param Result $match
     * @param array $target
     */
    private function processMatch(Result $match, array $target)
    {
        $refineryId     = $match->getSource()['InternalId'];
        $companyService = $this->getServiceLocator()->get('Services\Meroveus\CompanyService');

        /** @var  $company Company */
        $company = $companyService->findOneByRefineryId($refineryId);

        if ($company) {
            $company->setMeroveusId($target['meroveusId']);
            $company->save();

        } else {
            echo 'processMatch called for no good reason ' . PHP_EOL;
            // error out
        }
    }

    /**
     * @param array $queryParams
     * @return bool
     */
    private function addACompany(array $queryParams)
    {

        $db  = new \PDO('mysql:host=devdb.bizjournals.int;dbname=datahub', 'web', '');
        $sql = ' INSERT INTO
            company(
                refinery_id,
                meroveus_id,
                generate_code,
                record_source,
                company_name,
                public_ticker,
                ticker_exchange,
                source_modified_at,
                address1,
                address2,
                city,
                state,
                postal_code,
                country,
                latitude,
                longitude,
                phone,
                website,
                is_active,
                sic_code,
                employee_count,
                created_at,
                updated_at,
                deleted_at
                )
            VALUES (
                :refinery_id,
                :meroveus_id,
                :generate_code,
                :record_source,
                :company_name,
                :public_ticker,
                :ticker_exchange,
                :source_modified_at,
                :address1,
                :address2,
                :city,
                :state,
                :postal_code,
                :country,
                :latitude,
                :longitude,
                :phone,
                :website,
                :is_active,
                :sic_code,
                :employee_count,
                :created_at,
                :updated_at,
                :deleted_at
            )';

        $query = $db->prepare($sql)->execute($queryParams);
        return $query;
    }
}