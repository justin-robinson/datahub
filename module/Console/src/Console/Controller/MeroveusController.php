<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Console\CsvIterator;
use Console\Record\Formatter\Factory;
use Elastica\Client as ElasticaClient;
use Elastica\Query as ElasticaQuery;
use Elastica\QueryBuilder as QueryBuilder;
use Elastica\Search as ElasticaSearch;
use Services\Meroveus\Client as MeroveusClient;
use Services\Meroveus\CompanyService;
use Zend\Mvc\MvcEvent;

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
 *
 * @package Console\Controller
 *          pdo statement prep happens in __construct for DI reasons
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

    /** @var  $contactService \Services\Meroveus\ContactService */
    private $contactService;

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

    /**
     * @var string
     */
    private $updateJobTitleSql = 'INSERT INTO
            job_position_dictionary(
              job_position_id, job_title
            )
            VALUES(
              :job_position_id, :job_title
            ) ';

    /** @var string */
    private $contactSql = 'INSERT INTO
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
    private $createCompanySql = '
            INSERT INTO
                 company(
                    refinery_id, meroveus_id, generate_code, record_source, company_name, public_ticker, ticker_exchange,
                    source_modified_at, address1, address2, city, state, postal_code, country, latitude, longitude,
                    phone, website, is_active, sic_code, employee_count, created_at, updated_at, deleted_at,
                    universal_revenue_volume_static, universal_employee_count_static, universal_employee_local_static,
                    universal_established_year_static, universal_profile_blob_static
                    )
                VALUES (
                    :refinery_id, :meroveus_id, :generate_code, :record_source, :company_name, :public_ticker, :ticker_exchange,
                    :source_modified_at, :address1, :address2, :city, :state, :postal_code, :country, :latitude, :longitude,
                    :phone, :website, :is_active, :sic_code, :employee_count, :created_at, :updated_at, :deleted_at,
                    :universal_revenue_volume_static, :universal_employee_count_static, :universal_employee_local_static,
                    :universal_established_year_static, :universal_profile_blob_static
                )
            ';

    /** @var string */
    private $getJobDictionarySql = 'SELECT job_title, job_position_id FROM job_position_dictionary ORDER BY job_position_id ASC';

    /** @var string */
    private $updateCompanySql = '
      UPDATE
       company
      SET
        meroveus_id                       = :meroveus_id,
        universal_revenue_volume_static   = :universal_revenue_volume_static,
        universal_employee_count_static   = :universal_employee_count_static,
        universal_employee_local_static   = :universal_employee_local_static,
        universal_established_year_static = :universal_established_year_static,
        universal_profile_blob_static     = :universal_profile_blob_static
    WHERE
      refinery_id = :refinery_id';

    /** @var \PDOStatement */
    private $addContactPdo = null;

    /** @var \PDOStatement */
    private $addCompanyPdo = null;

    /** @var \PDOStatement */
    private $updateCompanyPdo = null;

    /** @var \PDOStatement */
    private $getJobDictionaryPdo = null;

    /** @var \PDOStatement */
    private $updateJobDictionaryPdo = null;

    /**
     * @var array
     */
    private $jobIdDictionary = [];

    /**
     * @var $sqlStringsArray string[]
     */
    protected $sqlStringsArray = [
        'selectOneCompanyByMeroveusId'     => '
            SELECT
              *
            FROM
              `datahub`.`company`
            WHERE
              meroveus_id = ?',
        'selectCompaniesWithoutMeroveusId' => '
            SELECT
              *
            FROM
              `datahub`.`company`
            WHERE
              meroveus_id IS NULL
            LIMIT :offset, :limit',
        'insertMeroveusIndustry' => '
            INSERT INTO
              `datahub`.`meroveus_industry` (external_id, industry)
            VALUES (:external_id, :industry)',
        'insertCompanyMeroveusIndustry' => '
            INSERT INTO
              `datahub`.`company_meroveus_industry_map`
            (hub_id, meroveus_industry_id)
            VALUES
            (:hub_id, :meroveus_industry_id)',
    ];


    /**
     * set up services and data
     *
     * @param MvcEvent $e
     */
    public function init(MvcEvent $e)
    {
        parent::init($e);

        $this->companyService = new CompanyService($this->meroveusClient);
        //@todo make this environment aware
        // set up elastic
        $this->elasticaClient      = new ElasticaClient($this->getServiceLocator()->get('Config')['elastica-datahub']);
        $this->elasticSearch       = new ElasticaSearch($this->elasticaClient);
        $this->elasticQuery        = new ElasticaQuery();
        $this->elasticQueryBuilder = new QueryBuilder();
        $this->contactService      = $this->getServiceLocator()->get('Services\Meroveus\ContactService');
        // prepare pdo outside the loop for memory purposes
        $this->addContactPdo    = $this->db->prepare($this->contactSql);
        $this->addCompanyPdo    = $this->db->prepare($this->createCompanySql);
        $this->updateCompanyPdo = $this->db->prepare($this->updateCompanySql);
        // job title pdo and data
        $this->getJobDictionaryPdo    = $this->db->prepare($this->getJobDictionarySql);
        $this->updateJobDictionaryPdo = $this->db->prepare($this->updateJobTitleSql);
        $query                        = $this->db->query($this->getJobDictionarySql);
        $results                      = $query->fetchAll(\PDO::FETCH_OBJ);
        foreach ($results as $result) {
            $this->jobIdDictionary[$result->job_title] = $result->job_position_id;
        }
    }


    /**
     * utility randomness
     *
     * @return string
     */
    public function indexAction()
    {
        echo $this->contactService->getJobPositionId("Managing Partner, Strategy", $this->jobIdDictionary) . PHP_EOL;
    }


    /**
     * php run.php  meroveus match -e development
     *
     * @var $sanity bool will write files for you to peruse for debugging
     * @var $debug  bool turns off any db inserts/updates
     */
    public function matchAction($sanity = false, $debug = false)
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

        echo 'while you wait: https://www.youtube.com/watch?v=siwpn14IE7E' . PHP_EOL;

        $maxRows      = 500;
        $totalMatched = $totalInserted = $marketMatched = $marketInserted = 0;
        /** @var  $contactService \Services\Meroveus\ContactService */
        $this->contactService = $this->getServiceLocator()->get('Services\Meroveus\ContactService');

        $lastMemUsageMessageLength = 0;

        $selectCompany = $this->sqlStatementsArray['selectOneCompanyByMeroveusId'];

        $formatter = Factory::factory('Meroveus');

        // setup our meroveus params
        $meroveusParams = [
            'STARTROW' => 1,
            'MAXROWS'  => $maxRows,
            'SET'      => [
                'RECTYP' => 'Business',
            ],
            'KEYWORDS' => 'published:true',
            'ENV'      => '',
            'META'     => [
                'RECTYP' => 'Business',
                'FIELDS' => [
                    [
                        "KEY"  => "keyexec-set_static",
                        "TYP"  => "Person",
                        'META' => [
                            'FIELDS' => [
                                [
                                    "KEY" => "department-title_static",
                                    "TYP" => "Text",
                                ],

                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($this->markets as $market => $env) {

            $meroveusParams['ENV']      = $env;
            $meroveusParams['STARTROW'] = 1; // reset our pagination offset
            $marketMatched              = $marketInserted = 0; // reset counts for this market
            $insertCompanyMeroveusIndustry = $this->sqlStatementsArray['insertCompanyMeroveusIndustry'];

            // paginate over companies
            while ($marketCompanyList = $this->companyService->fetchByMarket($meroveusParams)) {

                if (!$marketCompanyList) {
                    echo '                  No results returned for ' . $market . PHP_EOL;
                }

                foreach ($marketCompanyList as $index => $target) {

                    $match = $this->elasticMatch($target);
                    $hubId = null;

                    if ($match) {

                        if (!$debug) {
                            // updates the existing record
                            $refineryId = $match->getSource()['InternalId'];
                            $this->processMatch($refineryId, $target, $this->updateCompanyPdo);

                            try {
                                $selectCompany->execute([$target['meroveusId']]);
                                $hubId = ($selectCompany->rowCount() > 0) ? $selectCompany->fetch(\PDO::FETCH_ASSOC)['hub_id'] : false;

                                $selectCompany->closeCursor();
                                if ($sanity) {
                                    $this->writeSanityFiles($market, $target, $match);
                                }
                                $marketMatched++;
                                $totalMatched++;
                            } catch (\PDOException $e) {
                                die('PDO ERROR on Select Company ' . $e->getMessage());
                            }
                        }

                    } else { // create a new record
                        $queryParams = $formatter->format($target);
                        if (!$debug) {
                            try {
                                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                                $this->addCompanyPdo->execute($queryParams);
                                // good ole pdo has the hubId for us
                                $hubId = $this->db->lastInsertId();
                                // write some debug files if you want
                                if ($sanity) {
                                    $this->writeSanityFiles($market, $target, false);
                                }

                                $marketInserted++;
                                $totalInserted++;

                            } catch (\PDOException $e) {
                                echo 'PDO ERROR on company insert: ' . $e->getMessage() . PHP_EOL;
                            }
                        }
                    }

                    // does this company have an industry?
                    if ( isset($target['firm-industry_static']) ) {

                        // get all meroveus industries for this company by ID
                        $selectMeroveusIndustry = $this->db->prepare("
                                                SELECT
                                                    *
                                                FROM
                                                  `datahub`.`meroveus_industry`
                                                WHERE `external_id` IN ({$target['firm-industry_static']})");

                        if ( $selectMeroveusIndustry->execute() ) {

                            // link each industry to the company
                            while ( $industry = $selectMeroveusIndustry->fetch(\PDO::FETCH_ASSOC) ) {
                                try {
                                    $insertCompanyMeroveusIndustry->execute (
                                        [
                                            ':hub_id'               => $hubId,
                                            ':meroveus_industry_id' => $industry['meroveus_industry_id'],
                                        ]);
                                } catch (\Exception $e) {
                                    // probably a dupe, no biggie
                                }
                            }

                        }

                        $selectMeroveusIndustry->closeCursor();
                    }

                    // process contacts
                    if ($hubId || $debug) {
                        $this->processContacts($hubId, $target['execs'], $debug);
                    } else {
                        echo "line 375" . ' in ' . "MeroveusController.php" . PHP_EOL;
                        die(var_dump($target));
                    }
                    // track memory and total count
                    echo "\033[{$lastMemUsageMessageLength}D";
                    $total                     = $totalInserted + $totalMatched;
                    $currentLoopInsertionCount = $index + 1;
                    $memory                    = $total . ':' . $currentLoopInsertionCount . ':' . $this->convert_memory_usage(memory_get_usage(true));
                    $lastMemUsageMessageLength = strlen($memory);
                    echo $memory;
                }

                // get next chunk of rows
                $meroveusParams['STARTROW'] += $maxRows;
            }

            echo PHP_EOL . $market . ':' . PHP_EOL;
            echo " {$marketMatched} records matched, " . PHP_EOL;
            echo " {$marketInserted} records created" . PHP_EOL;

            echo "              post market out of loop memory usage is " . $this->convert_memory_usage(memory_get_usage(true)) . PHP_EOL;
        }

        echo $totalMatched . ' total  records matched ' . PHP_EOL;
        echo $totalInserted . ' total records inserted ' . PHP_EOL;
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
        echo 'Enjoy your day' . PHP_EOL;
    }


    /**
     * @param $companyHubId
     * @param $contacts
     * @param $debug
     */
    private function processContacts($companyHubId, $contacts, $debug)
    {

        foreach ($contacts as $contact) {
            // attach the company hub id to the contact, format it and add it
            $contact['hub_id'] = $companyHubId;
            $formattedContact  = $this->contactService->formatMeroveusContact($contact, $this->jobIdDictionary);

            if (!$debug) {
                if ($formattedContact) {
                    try {
                        $this->addContactPdo->execute($formattedContact);
                    } catch (\PDOException $e) {
                        echo "PDO ERROR: " . $e->getMessage() . PHP_EOL;
                    }
                    if ($formattedContact['job_position_id'] === 1001 && $formattedContact['job_title']) {
                        $unrankedJobs[$formattedContact['job_title']] = 1001;
                    }
                }
            }

        }
    }

    /**
     * Exports companies that do not have a meroveus id for relevate to match
     */
    public function exportRelevateAction()
    {

        // get user provided file path or default to ours
        @$outFilePath = $this->getRequest()->getParam('out') ?: 'relevate-' . time() . '.csv';

        // open file, then erase or attempt to create
        $file = fopen($outFilePath, 'w');

        if (file_exists($outFilePath)) {

            $headerRow = [
                'record_uid',
                'pub_uid',
                'record_name',
                'address1',
                'address2',
                'address3',
                'city',
                'state',
                'zip',
                'zip4',
                'phone',
                'fax',
                'public_email',
                'website',
            ];

            // write header row
            fputcsv($file, $headerRow);

            /** @var  $companyStatement \mysqli_stmt */
            $companyStatement = $this->sqlStatementsArray['selectCompaniesWithoutMeroveusId'];

            // sql pagination setup
            $queryParams = [
                ':offset' => 0,
                ':limit'  => 1000,
            ];

            $count = 0;

            // while we are getting rows back
            while ($companyStatement->execute($queryParams) && $companyStatement->rowCount() > 0) {

                // save each row to the csv file
                while ($row = $companyStatement->fetch()) {

                    // postal_code is zipPlus4 so split on the dash
                    $zipParts = preg_split('/\-/', $row['postal_code'], -1, PREG_SPLIT_NO_EMPTY);

                    // write this row to file
                    fputcsv($file, [
                        $row['hub_id'],
                        0,                   // pub_id doesn't matter
                        $row['company_name'],
                        $row['address1'],
                        $row['address2'],
                        '',                  // no address 3 field on our side
                        $row['city'],
                        $row['state'],
                        @$zipParts[0],       // zip
                        @$zipParts[1] ?: '', // zip4
                        $row['phone'],
                        '',                  // no fax field
                        '',                  // no email
                        $row['website'],
                    ]);

                    $count++;
                }

                // lil bit o status
                echo '.';

                // setup for next round of sql results
                $queryParams[':offset'] += $queryParams[':limit'];
            }

            fclose($file);

            echo PHP_EOL . "exported {$count} companies to " . realpath($outFilePath);
        }


    }

    /**
     * Updates meroveus_industry table with payload from meroveus
     */
    public function updateIndustriesAction() {

        $meroveusParams = [
            "KEYWORDS" => "",
            "MODE" => "LABELSEARCH",
            "LABELS" => [
                [
                    "NAME" => "",
                    "DATACLASS" => [
                        "KEY" => "industry"
                    ]
                ]
            ]
        ];

        // @todo handle deletions
        $industries = $this->companyService->queryMeroveusRoot($meroveusParams);

        foreach ( $industries as $industry ) {
            $this->sqlStatementsArray['insertMeroveusIndustry']->execute(
                [
                    ':external_id' => $industry['LABELID'],
                    ':industry' => trim($industry['NAME'], 'Â ')
                ]
            );

        }
    }

    public function sicToMerovuesAction () {

        // https://docs.google.com/spreadsheets/d/1FbPmppl5ehF0Kbwu6UXcJAOhmYSmIMIiXiD2AXtYklY/edit#gid=939757750
        // just save link as csv

        $filePath = $this->getRequest()->getParam('file');

        // hardcoding filepath to work around cli arg bug
        $filePath = "/Users/justinrobinson/Documents/datahub/sicToMeroveus.csv";

        if ( !$filePath ) {
            die ( 'run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if ( !$filePath ) {
            die ( "--file does not exist: " . $this->getRequest()->getParam('file') );
        }

        $file = new CsvIterator($filePath);
        $file->setHasHeaderRow(true);

        foreach ( $file as $line ) {
            $line = $file->mergeWithHeaderRow($line);

            $sql = $this->db->prepare(
                "INSERT INTO
	              `datahub`.`sic_code_meroveus_industry_map` (`sic`, `meroveus_industry_id`)
                select
                    s.sic,
                    m.meroveus_industry_id
                from
                    `datahub`.`sic_code` s
                    left join `datahub`.`meroveus_industry` m ON m.industry = ?
                where
                    s.sic LIKE ?
                    AND m.meroveus_industry_id IS NOT NULL

                UNION

                select
                    c.sic_code,
                    m.meroveus_industry_id
                from
                    `datahub`.`company` c
                    left join `datahub`.`meroveus_industry` m ON m.industry = ?
                WHERE
                    c.sic_code LIKE ? ");


            $sql->execute(
                [
                    $line['DataHub Industry'],
                    $line['SIC'] . '%',
                    $line['DataHub Industry'],
                    $line['SIC'] . '%',
                ]);
        }

    }

    /**
     * attempt to match the record with whats in elastic and
     * return pertinent data for further processing
     *
     * @param array $target   ( what we're trying to match in elastic)
     * @param float $minScore ( our score thresh hold )
     *
     * @return mixed array/bool
     * query elastic for match
     *
     */
    private function elasticMatch(array $target, $minScore = 9.9)
    {

        if (empty($target)) {
            echo 'empty target passed to elasticMatch' . PHP_EOL;

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
        $this->elasticQuery->setQuery($this->elasticQueryBuilder->query()->bool()->addShould($this->elasticQueryBuilder->query()->match('Name',
            $queryFields['Name']))->addShould($this->elasticQueryBuilder->query()->match('Addr1',
            $queryFields['Addr1']))->addMust($this->elasticQueryBuilder->query()->match('City',
            $queryFields['City']))->addMust($this->elasticQueryBuilder->query()->match('State',
            $queryFields['State']))->addMust($this->elasticQueryBuilder->query()->match('PostalCode',
            $queryFields['PostalCode'])));

        // set the minimum score that we consider a match
        // https://www.elastic.co/guide/en/elasticsearch/reference/current/search-request-min-score.html
        $this->elasticQuery->setMinScore($minScore);
        $resultSet    = $this->elasticSearch->search($this->elasticQuery);
        $topScore     = $resultSet->getMaxScore();
        $resultsArray = $resultSet->getResults();
        $result       = false;
        if (!empty($resultsArray)) {
            $result = ($resultsArray[0]->getScore() === $topScore) ? $resultsArray[0] : $result;
        }

        return $result;
    }

    /**
     * updates the existing refinery record
     *
     * @param  $refineryId
     * @param  $target                array
     * @param  $pdo                   \PDOStatement specifically the update company one
     *                                //@todo rethink this in light of testing
     *
     * @return bool
     */
    private function processMatch($refineryId, array $target, \PDOStatement $pdo)
    {

        $params = [
            ':meroveus_id'                       => $target['meroveusId'],
            ':universal_revenue_volume_static'   => empty($target['universal-revenue-volume_static']) ? null : $target['universal-revenue-volume_static'],
            ':universal_employee_count_static'   => empty($target['universal-employee-count_static']) ? null : $target['universal-employee-count_static'],
            ':universal_employee_local_static'   => empty($target['universal-employee-local_static']) ? null : $target['universal-employee-local_static'],
            ':universal_established_year_static' => empty($target['universal-established-year_static']) ? null : $target['universal-established-year_static'],
            ':universal_profile_blob_static'     => empty($target['universal-profile-blob_static']) ? null : $target['universal-profile-blob_static'],
            ':refinery_id'                       => $refineryId,
        ];
        try {
            return $pdo->execute($params);
        } catch (\PDOException $e) {
            echo 'ERROR' . $e->getMessage() . PHP_EOL;
            echo 'processMatch called for no good reason. did you run the import?' . PHP_EOL;

            return false;
        }
    }


    /**
     * mostly useful for debugging and query tuning
     *
     * @param $market
     * @param $target
     * @param $elasticResult
     *
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

    /**
     * @param $size
     *
     * @return string
     */
    private function convert_memory_usage($size)
    {

        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

        return @round($size / pow(1024, ($i = (int)floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }



}
