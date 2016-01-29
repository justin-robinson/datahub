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

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 * @package Console\Controller
 * pdo statement prep happens in __construct for DI reasons
 */
class MeroveusController extends AbstractActionController
{
    /**
     * @var array $markets
     * map of our market names to their respective meroveus environments
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
     * @var ElasticaQuery
     */
    private $elasticQuery;

    /**
     * @var QueryBuilder
     */
    private $elasticQueryBuilder;

    /**
     * @var \PDO
     */
    private $dataHubDb;

    /** @var string */
    private $contactSql =
        'INSERT INTO
            contact (
              hub_id, meroveus_id, relevate_id, is_duplicate, is_current_employee, first_name, middle_initial, last_name,
              suffix, honorific, job_title, job_position_id, email, phone, address1, address2, city, state, postal_code,
              created_at, updated_at, deleted_at
            )
            VALUES (
              :hub_id, :meroveus_id, :relevate_id, :is_duplicate, :is_current_employee, :first_name, :middle_initial,
              :last_name, :suffix, :honorific, :job_title, :job_position_id, :email, :phone, :address1, :address2, :city,
              :state, :postal_code, :created_at, :updated_at, :deleted_at
            )';

    /** @var string */
    private $createCompanySql =
        'INSERT INTO
            company(
                refinery_id, meroveus_id, generate_code, record_source, company_name, public_ticker, ticker_exchange,
                source_modified_at, address1, address2, city, state, postal_code, country, latitude, longitude,
                phone, website, is_active, sic_code, employee_count, created_at, updated_at, deleted_at
            )
            VALUES (
                :refinery_id, :meroveus_id, :generate_code, :record_source, :company_name, :public_ticker, :ticker_exchange,
                :source_modified_at, :address1, :address2, :city, :state, :postal_code, :country, :latitude, :longitude,
                :phone, :website, :is_active, :sic_code, :employee_count, :created_at, :updated_at, :deleted_at
            )';

    /** @var string */
    private $updateCompanySql = 'UPDATE company SET meroveus_id = :meroveus_id WHERE refinery_id = :refinery_id';

    /** @var \PDOStatement */
    private $addContactPdo = null;

    /** @var \PDOStatement */
    private $addCompanyPdo = null;

    /** @var \PDOStatement */
    private $updateCompanyPdo = null;

    /**
     * @var $sqlStringsArray string[]
     */
    protected $sqlStringsArray = [
        'selectOneCompanyByMeroveusId' => '
            SELECT
              *
            FROM
              `datahub`.`company`
            WHERE
              meroveus_id = ?',
    ];

    /**
     * Constructor
     */
    public function __construct()
    {

        parent::__construct();

//        $this->meroveusClient = new MeroveusClient(['path' => 'http://acbj-stg.meroveus.com:8080/api']);

        $this->companyService = new CompanyService($this->meroveusClient);
        //@todo make this environment aware
        // set up elastic
        $this->elasticaClient = new ElasticaClient([
            'host' => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
            'path' => 'rerefinery/',
            'port' => '9200',
            'url'  => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery/',
        ]);
        $this->elasticSearch  = new ElasticaSearch($this->elasticaClient);
        $this->elasticQuery = new ElasticaQuery();
        $this->elasticQueryBuilder = new QueryBuilder();

        // prepare pdo outside the loop for memory purposes
        $this->dataHubDb        = new \PDO('mysql:host=devdb.bizjournals.int;dbname=datahub', 'web', '');
        $this->addContactPdo    = $this->dataHubDb->prepare($this->contactSql);
        $this->addCompanyPdo    = $this->dataHubDb->prepare($this->createCompanySql);
        $this->updateCompanyPdo = $this->dataHubDb->prepare($this->updateCompanySql);
    }

    /**
     * utility randomness
     *
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
     * @var $sanity bool will write files for you to peruse for debugging
     */
    public function matchAction($sanity = false)
    {

        echo '
             ███▄ ▄███▓    ▄▄▄         ▄▄▄█████▓    ▄████▄      ██░ ██     ██▓    ███▄    █      ▄████
            ▓██▒▀█▀ ██▒   ▒████▄       ▓  ██▒ ▓▒   ▒██▀ ▀█     ▓██░ ██▒   ▓██▒    ██ ▀█   █     ██▒ ▀█▒
            ▓██    ▓██░   ▒██  ▀█▄     ▒ ▓██░ ▒░   ▒▓█    ▄    ▒██▀▀██░   ▒██▒   ▓██  ▀█ ██▒   ▒██░▄▄▄░
            ▒██    ▒██    ░██▄▄▄▄██    ░ ▓██▓ ░    ▒▓▓▄ ▄██▒   ░▓█ ░██    ░██░   ▓██▒  ▐▌██▒   ░▓█  ██▓
            ▒██▒   ░██▒    ▓█   ▓██▒     ▒██▒ ░    ▒ ▓███▀ ░   ░▓█▒░██▓   ░██░   ▒██░   ▓██░   ░▒▓███▀▒
            ░ ▒░   ░  ░    ▒▒   ▓▒█░     ▒ ░░      ░ ░▒ ▒  ░    ▒ ░░▒░▒   ░▓     ░ ▒░   ▒ ▒     ░▒   ▒
            ░  ░      ░     ▒   ▒▒ ░       ░         ░  ▒       ▒ ░▒░ ░    ▒ ░   ░ ░░   ░ ▒░     ░   ░
            ░      ░        ░   ▒        ░         ░            ░  ░░ ░    ▒ ░      ░   ░ ░    ░ ░   ░
                   ░            ░  ░               ░ ░          ░  ░  ░    ░              ░          ░
                                                   ░
                                                     ░
';
        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;
        $maxRows       = 500;
        $this->totalMatched  = 0;
        $this->totalInserted = 0;
        /** @var  $contactService \Services\Meroveus\ContactService */
        $this->contactService = $this->getServiceLocator()->get('Services\Meroveus\ContactService');

        $this->lastMemUsageMessageLength = 0;

        $selectCompany = $this->sqlStatementsArray['selectOneCompanyByMeroveusId'];

        foreach ($this->markets as $market => $env) {

            $this->paginatedSearch(
                function ( $marketCompanyList ) use(
                    $market,
                    $sanity,
                    $selectCompany) {


                    if (!$marketCompanyList) {
                        echo '                  No results returned for ' . $market . PHP_EOL;
                    }

                    $this->marketMatched  = $this->marketInserted = 0;

                    foreach ($marketCompanyList as $index => $target) {

                        $match = $this->elasticMatch($target);

                        if ($match) { // update the existing record
                            // update existing record here
                            // @todo refactor for DI
                            $this->processMatch($match, $target, $this->updateCompanyPdo);

                            if ($sanity) {
                                $this->writeSanityFiles($market, $target, $match);
                            }

                            $this->marketMatched++;
                            $this->totalMatched++;

                        } else { // create a new record

                            $queryParams = $this->formatCompany($target);
                            $added       = $this->addCompanyPdo->execute($queryParams);
                            if (!$added) {
                                echo 'opps, company add failed' . PHP_EOL;
                                // @todo log it
                            };

                            // write some debug files if you want
                            if ($sanity) {
                                $this->writeSanityFiles($market, $target, false);
                            }

                            $this->marketInserted++;
                            $this->totalInserted++;
                        }

                        // process company contacts

                        // temp lookup for meroveus id @todo get this from pdo last id?
                        $selectCompany->execute([$target['meroveusId']]);

                        $company = ( $selectCompany->rowCount() > 0 )
                            ? $company = $selectCompany->fetch(\PDO::FETCH_ASSOC)
                            : false;

                        if ($company) {
                            foreach ($target['contacts'] as $contact) {

                                // attach the companys hub id to the contact, format it and add it
                                $contact['hub_id'] = $company['hub_id'];

                                if ($this->contactService->formatMeroveusReturn($contact)) {
                                    $contactAdded = $this->addContactPdo->execute(
                                        $this->contactService->formatMeroveusReturn($contact)
                                    );
                                    if (!$contactAdded) {
                                        // @todo log it
                                    } else {
                                        // @todo and do what, exactly?
                                    };
                                }
                            }
                        }

                        // track memory and total count
                        echo "\033[{$this->lastMemUsageMessageLength}D";
                        $total = $this->totalInserted + $this->totalMatched;
                        $currentLoopInsertionCount = $index + 1;
                        $memory = $total . ':' . $currentLoopInsertionCount . ':' . $this->convert_memory_usage( memory_get_usage( true));
                        $this->lastMemUsageMessageLength = strlen($memory);
                        echo $memory;
                    }

                },$env, $market, $maxRows);


            echo PHP_EOL . $market . ':' . PHP_EOL;
            echo '  ' . $this->marketMatched . ' records matched, ' . PHP_EOL;
            echo '  ' . $this->marketInserted . ' records created' . PHP_EOL;

            echo "              post market out of loop memory usage is " . $this->convert_memory_usage( memory_get_usage( true)) . PHP_EOL;
        }

        echo $this->totalMatched . ' total  records matched ' . PHP_EOL;
        echo $this->totalInserted . ' total records inserted ' . PHP_EOL;
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
        echo 'Enjoy your day' . PHP_EOL;
    }

    /**
     * chunks the queries for throttling
     *
     * @param string $env (this represents the market in the query to meroveus)
     * @param string $market ()
     * @param int $maxRows (max returned results per call)
     * @return array ( filtered and compiled results )
     */
    private function paginatedSearch($callback, $env, $market, $maxRows = 25) {

        // setup our meroveus params
        $meroveusParams = [
            'STARTROW' => 1,
            'MAXROWS'  => $maxRows,
            'SET'      => [
                'RECTYP' => 'Business',
            ],
            'KEYWORDS' => 'published:true',
            'ENV'      => $env,
            'META'     => [
                'RECTYP' => 'Business',
                'FIELDS' => [
                    [
                        "KEY" => "keycontact-set_static",
                        "TYP" => "Person",
                    ],
                ],
            ],
        ];

        // call the callback every time we get results
        while ( $result = $this->companyService->fetchByMarket($meroveusParams) ) {
            $meroveusParams['STARTROW'] += $maxRows;
            call_user_func($callback, $result);
        }

    }

    /**
     * attempt to match the record with whats in elastic and
     * return pertinent data for further processing
     *
     * @param array $target ( what we're trying to match in elastic)
     * @param float $minScore ( our score thresh hold )
     * @return mixed array/bool
     * query elastic for match
     *
     */
    private function elasticMatch(array $target, $minScore = 9.9)
    {
        if (empty($target)) {
            return false;
        }

        // pull out search terms
        $queryFields = [
            'Name'       => isset($target['firm-name_static']) ? $target['firm-name_static'] : false,
            'State'      => isset($target['street-state_static']) ? $target['street-state_static'] : false,
            'City'       => isset($target['street-city_static']) ? $target['street-city_static'] : false,
            'Addr1'      => isset($target['street-address_static']) ? $target['street-address_static'] : false,
            'PostalCode' => isset($target['street-zip_static']) ? $target['street-zip_static'] : false,
        ];

        // make sure that we have everything that we need
        foreach ($queryFields as $field) {
            if (!$field) {
                return false;
            }
        }

        // set up the elastic query
        $this->elasticQuery->setQuery(
            $this->elasticQueryBuilder->query()->bool()
                ->addShould($this->elasticQueryBuilder->query()->match('Name', $queryFields['Name']))
                ->addShould($this->elasticQueryBuilder->query()->match('Addr1', $queryFields['Addr1']))
                ->addMust($this->elasticQueryBuilder->query()->match('City', $queryFields['City']))
                ->addMust($this->elasticQueryBuilder->query()->match('State', $queryFields['State']))
                ->addMust($this->elasticQueryBuilder->query()->match('PostalCode', $queryFields['PostalCode']))
        );

        // set the minimum score that we consider a match
        // https://www.elastic.co/guide/en/elasticsearch/reference/current/search-request-min-score.html
        $this->elasticQuery->setMinScore($minScore);

        $resultSet = $this->elasticSearch->search($this->elasticQuery);
        $topScore  = $resultSet->getMaxScore();

        $resultsArray = $resultSet->getResults();

        $result = false;
        if ( !empty($resultsArray) ) {
            $result = ($resultsArray[0]->getScore() === $topScore)
                ? $resultsArray[0]
                : $result;
        }

        return $result;
    }

    /**
     * updates the existing refinery record
     * @param Result $match
     * @param array $target
     * @todo refactor for DI of the following:
     *      param \Services\Meroveus\CompanyService $companyService
     * @return bool
     */
    private function processMatch(Result $match, array $target, \PDOStatement $pdo)
    {

        if (!$match) {
            //@todo log it catch it
            return false;
        }

        $refineryId = $match->getSource()['InternalId'];

        $update = $pdo->execute([':meroveus_id' => $target['meroveusId'], 'refinery_id' => $refineryId]);
        if ($update) {
            unset($match, $pdo);
            gc_collect_cycles();

        } else {
            unset($match, $pdo);
            gc_collect_cycles();
            echo 'processMatch called for no good reason. did you run the import? Hmm? ' . PHP_EOL;
            return false;
        }

        return false;
    }

    /**
     * format the meroveus return for 'sanity'
     * it's defined here for readability
     *
     * @param array $company
     * @return array
     */
    private function formatCompany(array $company)
    {
        $queryParams = [];

        $queryParams[':refinery_id']   = isset($company['refinery_id']) ? $company['refinery_id'] : 'noData';
        $queryParams[':meroveus_id']   = isset($company['meroveusId']) ? $company['meroveusId'] : 'noData';
        $queryParams[':generate_code'] = isset($company['generate_codeId']) ? $company['generate_codeId'] : 'noData';
        $queryParams[':record_source'] = isset($company['sourceId']) ? $company['sourceId'] : 'noData';;
        $queryParams[':company_name']       = isset($company['firm-name_static']) ? $company['firm-name_static'] : 'noData';
        $queryParams[':public_ticker']      = isset($company['idk']) ? $company['idk'] : 'noData';
        $queryParams[':ticker_exchange']    = isset($company['idk']) ? $company['idk'] : 'noData';
        $queryParams[':source_modified_at'] = isset($company['idk']) ? $company['idk'] : 'noData';
        $queryParams[':address1']           = isset($company['street-address_static']) ? $company['street-address_static'] : 'noData';
        $queryParams[':address2']           = isset($company['street-line2-address_static']) ? $company['street-line2-address_static'] : 'noData';
        $queryParams[':city']               = isset($company['street-city_static']) ? $company['street-city_static'] : 'noData';
        $queryParams[':state']              = isset($company['street-state_static']) ? $company['street-state_static'] : null;
        $queryParams[':postal_code']        = isset($company['street-zip_static']) ? $company['street-zip_static'] : null; // validate
        $queryParams[':country']            = isset($company['street-country_static']) ? $company['street-country_static'] : null; // validate
        $queryParams[':latitude']           = isset($company['coordinates']['lat']) ? $company['coordinates']['lat'] : null;
        $queryParams[':longitude']          = isset($company['coordinates']['long']) ? $company['coordinates']['long'] : null;
        $queryParams[':phone']              = isset($company['contact-phone_static']) ? $company['contact-phone_static'] : null;
        $queryParams[':website']            = isset($company['contact-website_static']) ? $company['contact-website_static'] : null;
        $queryParams[':is_active']          = true;
        $queryParams[':sic_code']           = isset($company['sicCode']) ? $company['sicCode'] : null;
        $queryParams[':employee_count']     = 0;
        $queryParams[':created_at']         = 'NOW()';
        $queryParams[':updated_at']         = 'NOW()';
        $queryParams[':deleted_at']         = null;

        return $queryParams;
    }

    /**
     * mostly useful for debugging and query tuning
     *
     * @param $market
     * @param $target
     * @param $elasticResult
     * @return bool
     *
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
        return true;
    }

    private function convert_memory_usage( $size) {

        $unit = [ 'b', 'kb', 'mb', 'gb', 'tb', 'pb' ];

        return @round($size / pow ( 1024, ( $i = (int)floor ( log ( $size, 1024 ) ) ) ),2) . ' ' . $unit[$i];
    }


}