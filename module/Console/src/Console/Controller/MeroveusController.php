<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Console\CsvIterator;
use Console\Record\Formatter\Factory;
use Console\Record\Formatter\Formatters\Meroveus;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\MeroveusIndustry;
use DB\Datahub\SourceType;
use Elastica\Client as ElasticaClient;
use Elastica\Query as ElasticaQuery;
use Elastica\QueryBuilder as QueryBuilder;
use Elastica\Search as ElasticaSearch;
use Scoop\Database\Literal;
use Scoop\Database\Model\Generic;
use Services\Meroveus\Client as MeroveusClient;
use Services\Meroveus\CompanyService;
use Zend\Mvc\MvcEvent;

//use Services\Meroveus\CompanyService;

/**
 * Class MeroveusController
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
        'insertCompanyMeroveusIndustry'    => '
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
        $this->elasticaClient = new ElasticaClient($this->getServiceLocator()->get('Config')['elastica-datahub']);
        $this->elasticSearch = new ElasticaSearch($this->elasticaClient);
        $this->elasticQuery = new ElasticaQuery();
        $this->elasticQueryBuilder = new QueryBuilder();
        $this->contactService = $this->getServiceLocator()->get('Services\Meroveus\ContactService');
        // prepare pdo outside the loop for memory purposes

    }

    /**
     * basic tiering thingy
     *
     * @param $id
     *
     * @return int
     */
    public function doTier($id)
    {

        $tier = 0;
        $company = Company::fetch_company_and_instances($id);

        if ($company && $company->get_company_instances()->first()) {
            if ($company->get_company_instances()->first()->save()) {
                $tier = $company->get_company_instances()->first()->get_tier();
            }
        }

        return $tier;
    }

    /**
     * mess with stuff here
     */
    public function scratchAction()
    {

    }

    /**
     * utility randomness
     * @return string
     */
    public function indexAction()
    {

        ini_set('memory_limit', '1024M');
        $randomIds = [
            227813,
            156800,
            31281,
            260888,
            58231,
            277129,
            234856,
            72402,
            251682,
            223682,
            144910,
            278539,
            67287,
            197643,
            9999,
            159631,
            137704,
            54663,
            289924,
            146243,
            274768,
            41519,
            52635,
            295961,
            290000,
            16400,
            200577,
            146277,
            166248,
            27711,
            147375,
            151556,
            299597,
            26373,
            168252,
            296258,
            159458,
            92321,
            259509,
            298516,
            242819,
            35801,
            288491,
            290149,
            202717,
            79819,
            98280,
            223861,
            298285,
            130102,
            131538,
            6791,
            273485,
            231883,
            16416,
            50415,
            172327,
            91397,
            103395,
            143284,
            84033,
            142530,
            119218,
            89676,
            262037,
            156898,
            242875,
            171875,
            1068,
            273012,
            261589,
            226376,
            186576,
            296501,
            161597,
            35401,
            231911,
            119641,
            41235,
            105299,
            187183,
            104793,
            25709,
            95735,
            695,
            189359,
            25253,
            172286,
            6023,
            242892,
            305692,
            181819,
            196560,
            110265,
            144656,
            88260,
            62032,
            213706,
            147804,
            235661,
        ];

        echo '
        __________________ _______  _______ _________ _        _______ 
        \__   __/\__   __/(  ____ \(  ____ )\__   __/( (    /|(  ____ \
           ) (      ) (   | (    \/| (    )|   ) (   |  \  ( || (    \/
           | |      | |   | (__    | (____)|   | |   |   \ | || |      
           | |      | |   |  __)   |     __)   | |   | (\ \) || | ____ 
           | |      | |   | (      | (\ (      | |   | | \   || | \_  )
           | |   ___) (___| (____/\| ) \ \_____) (___| )  \  || (___) |
           )_(   \_______/(_______/|/   \__/\_______/|/    )_)(_______)
        ';

        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;
        $count = 1;

        $counts = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
        ];

        $foundCount = 0;
        $count = 1;
//        while ($count < 310200) {
        while ($count < 1000) {
//        while ($count < 10000) {
            $tier = $this->doTier($count);
            if ($tier) {
                $foundCount++;
                $counts[$tier]++;

            }

            $count++;
        }

//        foreach ($randomIds as $id) {
//            $company = Company::fetch_company_and_instances($id);
//
//            if ($company) {
//
//                $instances = $company->get_company_instances();
//                $tier      = $instances->get_rows()[0]->instanceTierThyself(1);
//                $counts[$tier]++;
//                $foundCount++;
//            }
//
//            $count++;
//
//        }
        echo $count - 1 . ' records searched' . PHP_EOL;
        echo $foundCount . ' records found' . PHP_EOL;
        echo 'totals:' . PHP_EOL;
        print_r($counts);
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
    }


    /**
     * php run.php  meroveus match -e development
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

        $maxRows = 500;
        $totalMatched = $totalInserted = $marketMatched = $marketInserted = 0;
        /** @var  $contactService \Services\Meroveus\ContactService */
        $this->contactService = $this->getServiceLocator()->get('Services\Meroveus\ContactService');

        $lastMemUsageMessageLength = 0;

        Company::$useCache = CompanyInstance::$useCache = false;

        $formatter = Meroveus::get_instance();

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

            $meroveusParams['ENV'] = $env;
            $meroveusParams['STARTROW'] = 1; // reset our pagination offset
            $marketMatched = $marketInserted = 0; // reset counts for this market

            // paginate over companies
            while ($marketCompanyList = $this->companyService->fetchByMarket($meroveusParams)) {

                if (!$marketCompanyList) {
                    echo '                  No results returned for ' . $market . PHP_EOL;
                }

                foreach ($marketCompanyList as $index => $target) {

                    $company = $formatter->format($target);
                    $match = $this->elasticMatch($target);
                    $companyInstanceId = null;

                    if ($match) {

                        $companyInstanceId = $this->processMatch($match->getSource()['InternalId'], $target);

                        if ($sanity) {
                            $this->writeSanityFiles($market, $target, $match);
                        }

                        $marketMatched++;
                        $totalMatched++;

                    } else { // create a new record

                        $company->save();
                        $companyInstanceId = $company->get_company_instances()->first()->companyInstanceId;

                        $marketInserted++;
                        $totalInserted++;
                    }

                    // process contacts
                    if ($companyInstanceId || $debug) {
                        $this->processContacts($companyInstanceId, $target['execs'], $debug);
                    }

                    if ($debug) {
                        // track memory and total count
                        echo "\033[{$lastMemUsageMessageLength}D";
                        $total = $totalInserted + $totalMatched;
                        $currentLoopInsertionCount = $index + 1;
                        $memory = $total . ':' . $currentLoopInsertionCount . ':' . $this->convert_memory_usage(memory_get_usage(true));
                        $lastMemUsageMessageLength = strlen($memory);
                        echo $memory;
                    }
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
            if (!empty($contact)) {
                // attach the company hub id to the contact, format it and add it
                $contact['hub_id'] = $companyHubId;
                $formattedContact = $this->contactService->formatMeroveusContact($contact, $this->jobIdDictionary);
                /** @var \DB\Datahub\Contact $formattedContact */

                if (!$debug) {
                    if (!empty($formattedContact)) {
                        $formattedContact->companyInstanceId = $companyHubId;
                        $formattedContact->save();
//                    try {
//                        $this->addContactPdo->execute($formattedContact);
//                    } catch (\PDOException $e) {
//                        echo "PDO ERROR: " . $e->getMessage() . PHP_EOL;
//                    }
//                    if ($formattedContact['job_position_id'] === 1001 && $formattedContact['job_title']) {
//                        $unrankedJobs[$formattedContact['job_title']] = 1001;
//                    }
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
    public function updateIndustriesAction()
    {

        $meroveusParams = [
            "KEYWORDS" => "",
            "MODE"     => "LABELSEARCH",
            "LABELS"   => [
                [
                    "NAME"      => "",
                    "DATACLASS" => [
                        "KEY" => "industry",
                    ],
                ],
            ],
        ];

        // @todo handle deletions
        $industries = $this->companyService->queryMeroveusRoot($meroveusParams);

        $industriesAdded = 0;
        $numberOfMeroveusIndustries = 0;

        foreach ($industries as $industry) {
            $numberOfMeroveusIndustries++;
            try {
                $saved = (new MeroveusIndustry([
                    'externalId' => $industry['LABELID'],
                    'industry'   => trim($industry['NAME'], 'Â '),
                ]))->save();

                $industriesAdded += $saved ? 1 : 0;
            } catch (\Exception $e) {

            }
        }

        $savedIndustries = Generic::query("SELECT count(*) AS count FROM meroveusIndustry")->first()->count;

        echo "Added {$industriesAdded} new industries of {$numberOfMeroveusIndustries} from meroveus" . PHP_EOL;
        echo "There are {$savedIndustries} in the datahub";
    }

    /**
     * @throws \Console\CsvIteratorException
     */
    public function sicToMerovuesAction()
    {

        // https://docs.google.com/spreadsheets/d/1FbPmppl5ehF0Kbwu6UXcJAOhmYSmIMIiXiD2AXtYklY/edit#gid=939757750
        // just save link as csv

        $filePath = $this->getRequest()->getParam('file');

        if (!$filePath) {
            die ('run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if (!$filePath) {
            die ("--file does not exist: " . $this->getRequest()->getParam('file'));
        }

        $file = new CsvIterator($filePath);
        $file->setHasHeaderRow(true);

        foreach ($file as $line) {
            $line = $file->mergeWithHeaderRow($line);

            Generic::query(
                "INSERT INTO
                    sic_code_meroveus_industry_map (sic, meroveus_industry_id)
                SELECT
                    s.sic,
                    m.meroveusIndustryId
                FROM
                    sic_code s
                    LEFT JOIN meroveusIndustry m ON m.industry = ?
                WHERE
                    s.sic LIKE ?
                    AND m.meroveusIndustryId IS NOT NULL
    
                UNION
    
                SELECT
                    c.sicCode,
                    m.meroveusIndustryId
                FROM
                    companyInstance c
                    LEFT JOIN meroveusIndustry m ON m.industry = ?
                WHERE
                    c.sicCode LIKE ?
                    AND m.meroveusIndustryId IS NOT NULL",
                [
                    $line['DataHub Industry'],
                    $line['SIC'] . '%',
                    $line['DataHub Industry'],
                    $line['SIC'] . '%',
                ]);

        }

    }

    /**
     * Map third party sic codes to a meroveus_industry_id and link to a company via a provided
     * hub_id
     * @throws \Exception
     */
    public function mapThirdPartySicAction()
    {

        $filePath = $this->getRequest()->getParam('file');

        if (!$filePath) {
            die ('run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if (!$filePath) {
            die ("--file does not exist: " . $this->getRequest()->getParam('file'));
        }

        // load csv file
        $file = new CsvIterator($filePath);
        $file->setHasHeaderRow(true);

        // loop over each line
        foreach ($file as $line) {

            $line = $file->mergeWithHeaderRow($line);

            // no hub_id is no good
            if (empty($line['hub_id'])) {
                continue;
            }

            // build all sic codes into regex string '^\d\d.*'
            $sicCodes = [];
            if (!empty($line['PrimarySIC'])) {
                $sicCodes[] = '^' . substr($line['PrimarySIC'], 0, 2) . '.*';
            }
            if (!empty($line['SICSecondary1'])) {
                $sicCodes[] = '^' . substr($line['SICSecondary1'], 0, 2) . '.*';
            }
            if (!empty($line['SICSecondary2'])) {
                $sicCodes[] = '^' . substr($line['SICSecondary2'], 0, 2) . '.*';
            }
            if (!empty($line['SICSec3'])) {
                $sicCodes[] = '^' . substr($line['SICSec3'], 0, 2) . '.*';
            }
            if (!empty($line['SICSec4'])) {
                $sicCodes[] = '^' . substr($line['SICSec4'], 0, 2) . '.*';
            }

            // need at least one sic code
            if (empty($sicCodes)) {
                continue;
            }

            // get all sic_codes that match the given sic code regex and insert provided meroveus_id and mapped
            // meroveus_industry_ids into company_meroveus_industry_third_party_map
            Generic::query(
                'INSERT INTO
                    company_meroveus_industry_third_party_map (meroveus_industry_id, hub_id)
                SELECT
                    DISTINCT(m.meroveus_industry_id),
                    ?
                FROM
                    sic_code s
                    LEFT JOIN sic_code_meroveus_industry_map m USING (sic)
                WHERE
                    s.sic REGEXP ?
                    AND m.meroveus_industry_id IS NOT NULL',
                [
                    $line['hub_id'],
                    implode('|', $sicCodes),
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
            'Addr1'      => isset($target['street-address_static']) ? $target['street-address_static'] : false,
            'City'       => isset($target['street-city_static']) ? $target['street-city_static'] : false,
            'PostalCode' => isset($target['street-zip_static']) ? $target['street-zip_static'] : false,
        ];

        // make sure that we have everything that we need
        foreach ($queryFields as $field) {
            if (!$field) {
                return false;
            }
        }

        $this->elasticQuery->setQuery($this->elasticQueryBuilder->query()->bool()->addMust($this->elasticQueryBuilder->query()->match('Name',
            $queryFields['Name']))->addMust($this->elasticQueryBuilder->query()->match('City',
            $queryFields['City']))->addMust($this->elasticQueryBuilder->query()->match('State',
            $queryFields['State']))->addMust($this->elasticQueryBuilder->query()->match('PostalCode',
            $queryFields['PostalCode'])));

        // set the minimum score that we consider a match
        // https://www.elastic.co/guide/en/elasticsearch/reference/current/search-request-min-score.html
        $this->elasticQuery->setMinScore($minScore);
        $resultSet = $this->elasticSearch->search($this->elasticQuery);
        $topScore = $resultSet->getMaxScore();
        $resultsArray = $resultSet->getResults();

        $result = false;
        if (!empty($resultsArray)) {
            $result = ($resultsArray[0]->getScore() === $topScore) ? $resultsArray[0] : $result;
        }

        return $result;
    }

    /**
     * updates the existing refinery record
     *
     * @param  $refineryId            int
     * @param  $target                array
     *                                //@todo rethink this in light of testing
     *
     * @return bool
     */
// gross!!!
    /**
     * @param int   $refineryId
     * @param array $target
     *
     * @return bool|mixed
     */
    private function processMatch($refineryId, array $target)
    {

        $companyInstances = CompanyInstance::fetch_by_source_name_and_id('refinery%', $refineryId);

        if ($companyInstances === false) {
            return false;
        }

        $params = [
            'revenue'         => empty($target['universal-revenue-volume_static']) ? [] : [$target['universal-revenue-volume_static']],
            'employeeCount'   => empty($target['universal-employee-local_static']) ? [] : [$target['universal-employee-local_static']],
            'yearEstablished' => empty($target['universal-established-year_static']) ? [] : [$target['universal-established-year_static']],
            'description'     => empty($target['universal-profile-blob_static']) ? [] : [$target['universal-profile-blob_static']],
            'industry'        => empty($target['firm-industry_static']) ? [] : explode(',', $target['firm-industry_static']),
        ];

        foreach ($params as $name => $values) {
            foreach ($values as $value) {
                $value = trim($value, 'Â\'"  ');
                $companyInstances->first()->add_property(
                    new CompanyInstanceProperty(
                        [
                            'name'         => $name,
                            'value'        => $value,
                            'sourceTypeId' => SourceType::fetch_one_where("name = 'meroveus'")->sourceTypeId,
                            'sourceId'     => $target['meroveusId'],
                            'createdAt'    => empty($target['createdAt']) ? new Literal('NOW()') : $target['createdAt'],
                            'updatedAt'    => empty($target['updatedAt']) ? new Literal('NOW()') : $target['updatedAt'],
                        ]));

            }
        }

        $companyInstances->first()->save();

        return $companyInstances->first()->companyInstanceId;
    }


    /**
     * mostly useful for debugging and query tuning
     *
     * @param $market
     * @param $target
     * @param $elasticResult
     *
     * @return bool
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


    public function tierAction()
    {

        ini_set('memory_limit', '1024M');

        echo '
        __________________ _______  _______ _________ _        _______ 
        \__   __/\__   __/(  ____ \(  ____ )\__   __/( (    /|(  ____ \
           ) (      ) (   | (    \/| (    )|   ) (   |  \  ( || (    \/
           | |      | |   | (__    | (____)|   | |   |   \ | || |      
           | |      | |   |  __)   |     __)   | |   | (\ \) || | ____ 
           | |      | |   | (      | (\ (      | |   | | \   || | \_  )
           | |   ___) (___| (____/\| ) \ \_____) (___| )  \  || (___) |
           )_(   \_______/(_______/|/   \__/\_______/|/    )_)(_______)
        ';
        $start = date('h:i:s A');
        echo "started at " . $start . PHP_EOL;
        $count = 1;

        $counts = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
        ];
        $foundCount = 0;
        $count = 1;
        while ($count < 1000) {
            $tier = $this->doTier($count);
            if ($tier) {
                $foundCount++;
                $counts[$tier]++;

            }
            $count++;
        }
        echo $count - 1 . ' records searched' . PHP_EOL;
        echo $foundCount . ' records found' . PHP_EOL;
        echo 'totals:' . PHP_EOL;
        print_r($counts);
        $end = date('h:i:s A');
        echo "ended at " . $end . PHP_EOL;
    }

}
