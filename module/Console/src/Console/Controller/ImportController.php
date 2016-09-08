<?php

namespace Console\Controller;

use Console\CsvIterator;
use Console\Importer\Refinery;
use Console\Importer\Top25ListImporter;
use Console\Record\Formatter\Formatters\Relevate;
use Console\Record\Formatter\Formatters\Top25ListFormatter;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceTop25lists;
use DB\Datahub\Top25List;
use DB\Datahub\Contact;
use LRUCache\LRUCache;
use Scoop\Database\Query\Buffer;
use Zend\Db\Adapter as dbAdapter;
use Console\Importer\Dataset;
use Console\Importer\Bbm;

/**
 * Class ImportController
 *
 * @package Console\Controller
 */
class ImportController extends AbstractActionController
{
    
    /**
     * @var array
     */
    protected $RefineryColumns = [
        "InternalId"     => 0,
        "GenId"          => 1,
        "SourceID"       => 2,
        "Name"           => 3,
        "Ticker"         => 4,
        "TickerExchange" => 5,
        "DateModified"   => 6,
        "Addr1"          => 7,
        "Addr2"          => 8,
        "City"           => 9,
        "State"          => 10,
        "PostalCode"     => 11,
        "Country"        => 12,
        "Lat"            => 13,
        "Lon"            => 14,
        "OfficePhone1"   => 15,
        "Url"            => 16,
        "Sic"            => 17,
    ];
    
    /**
     * @var array
     */
    protected $states = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];
    
    
    /**
     * @var $sqlStringsArray string[]
     */
    protected $sqlStringsArray = [
        'selectContacts' => '
            SELECT
                *
            FROM
              `datahub`.`contact`
            WHERE meroveus_id = ?
            LIMIT 1000',
        'insertContact'  => '
            INSERT INTO
              datahub.contact (
                hub_id,
                meroveus_id,
                relevate_id,
                is_duplicate,
                is_current_employee,
                first_name,
                middle_initial,
                last_name,
                suffix,
                honorific,
                job_title,
                job_position_id,
                email,
                phone,
                address1,
                address2,
                city,
                state,
                postal_code,
                created_at,
                updated_at,
                deleted_at
              )
              VALUES (
                :hub_id,
                :meroveus_id,
                :relevate_id,
                :is_duplicate,
                :is_current_employee,
                :first_name,
                :middle_initial,
                :last_name,
                :suffix,
                :honorific,
                :job_title,
                :job_position_id,
                :email,
                :phone,
                :address1,
                :address2,
                :city,
                :state,
                :postal_code,
                NOW(),
                NOW(),
                NULL
              )',
        'updateContact'  => '
            UPDATE
              `datahub`.`contact`
            SET
                hub_id = :hub_id,
                meroveus_id = :meroveus_id,
                relevate_id = :relevate_id,
                is_duplicate = :is_duplicate,
                is_current_employee = :is_current_employee,
                first_name = :first_name,
                middle_initial = :middle_initial,
                last_name = :last_name,
                suffix = :suffix,
                honorific = :honorific,
                job_title = :job_title,
                job_position_id = :job_position_id,
                email = :email,
                phone = :phone,
                address1 = :address1,
                address2 = :address2,
                city = :city,
                state = :state,
                postal_code = :postal_code,
                created_at = :created_at,
                updated_at = NOW(),
                deleted_at = :deleted_at
            WHERE
              contact_id = :contact_id',
    ];
    
    /**
     * @access pubic
     * @return string
     */
    public function indexAction()
    {
        
        $this->index($this->getRequest()->getParam('e'));
    }
    
    /**
     * Just echo the environment
     *
     * @param $env
     *
     * @return string
     */
    private function index($env)
    {
        
        echo $env . PHP_EOL;
        
        return $env . PHP_EOL;
    }
    
    /**
     * Testing 1.2.3.... Testing...
     *
     * @access pubic
     * @return void
     */
    public function testAction()
    {
        
        $this->getServiceLocator()->get('Console\Logger')->info('test');
        echo "Hello World\n";
        
    }
    
    /**
     * Import the refinery data from a CSV file
     *  does a bit of normalising
     *
     * @access pubic
     * @return void
     */
    public function refineryAction()
    {
        
        //@todo set up environment sniffing
        echo '
         ██▓    ███▄ ▄███▓    ██▓███      ▒█████      ██▀███     ▄▄▄█████▓    ██▓    ███▄    █      ▄████
        ▓██▒   ▓██▒▀█▀ ██▒   ▓██░  ██▒   ▒██▒  ██▒   ▓██ ▒ ██▒   ▓  ██▒ ▓▒   ▓██▒    ██ ▀█   █     ██▒ ▀█▒
        ▒██▒   ▓██    ▓██░   ▓██░ ██▓▒   ▒██░  ██▒   ▓██ ░▄█ ▒   ▒ ▓██░ ▒░   ▒██▒   ▓██  ▀█ ██▒   ▒██░▄▄▄░
        ░██░   ▒██    ▒██    ▒██▄█▓▒ ▒   ▒██   ██░   ▒██▀▀█▄     ░ ▓██▓ ░    ░██░   ▓██▒  ▐▌██▒   ░▓█  ██▓
        ░██░   ▒██▒   ░██▒   ▒██▒ ░  ░   ░ ████▓▒░   ░██▓ ▒██▒     ▒██▒ ░    ░██░   ▒██░   ▓██░   ░▒▓███▀▒
        ░▓     ░ ▒░   ░  ░   ▒▓▒░ ░  ░   ░ ▒░▒░▒░    ░ ▒▓ ░▒▓░     ▒ ░░      ░▓     ░ ▒░   ▒ ▒     ░▒   ▒
         ▒ ░   ░  ░      ░   ░▒ ░          ░ ▒ ▒░      ░▒ ░ ▒░       ░        ▒ ░   ░ ░░   ░ ▒░     ░   ░
         ▒ ░   ░      ░      ░░          ░ ░ ░ ▒       ░░   ░      ░          ▒ ░      ░   ░ ░    ░ ░   ░
         ░            ░                      ░ ░        ░                     ░              ░          ░
        ' . PHP_EOL;
        echo "started at " . date('h:i:s A') . PHP_EOL;
        
        $csvFile = realpath($this->getRequest()->getParam('file'));
        
        // simple checks
        if (!file_exists($csvFile)) {
            die('File not found: ' . $this->getRequest()->getParam('file'));
        }
        if (pathinfo($csvFile, PATHINFO_EXTENSION) !== 'csv') {
            die('Parameter must be a CSV file.');
        }
        
        echo "Processing File: " . $csvFile . PHP_EOL;
        
        $importer = new Refinery();
        
        list($companiesProcessed, $instancesProcessed) = $importer->import($csvFile);
        
        printf("ended at %s%sImported: %s\t%s companies%s\t%s instances%s", date('h:i:s A'), PHP_EOL, PHP_EOL,
            $companiesProcessed, PHP_EOL, $instancesProcessed, PHP_EOL);
    }
    
    /**
     * Merges relevate csv data with our existing data
     *
     * @access public
     * @return void
     */
    public function relevateAction()
    {
        
        $filePath = $this->getRequest()->getParam('file');
        
        if (!$filePath) {
            echo "line 295". ' in '."/Console/Controller/ImportController.php".PHP_EOL;
            die(var_dump( 'run with arg --file /path/to/file ' ));
        }
        
        $filePath = realpath($filePath);
        if (!$filePath) {
            echo "line 302". ' in '."/Console/Controller/ImportController.php".PHP_EOL;
            die(var_dump( "--file does not exist: " . $this->getRequest()->getParam('file') ));
        }
        
        $file = new CsvIterator($filePath);
        
        // this isn't a proper csv so just ensure we are skipping the empty lines
        $noCsvFlag = $file->getFlags() ^ CsvIterator::READ_CSV;
        $file->setFlags($noCsvFlag);
        
        // meroveus ids are grouped together so we can use this to reduce sql queries down to 1 for each company
        $lastMeroveusId = -1;
        
        $updateContact = null;//$this->sqlStatementsArray['updateContact'];
        
        // some stats
        $totalCount = $insertCount = $updateCount = 0;
        
        echo "started at " . date('h:i:s A') . PHP_EOL;
        
        $formatter = Relevate::get_instance();
        
        // cache company instance lookups
        $companyInstanceCache = new LRUCache(1000);
        
        // buffer contact insertions
        $contactInsertionBuffer = new Buffer(1000, Contact::class);
        
        // so we can update existing contacts
        $contactInsertionBuffer->set_insert_ignore(true);
        
        foreach ($file as $line) {
            
            $currentContact = $formatter->format($line);
            
            $companyInstances = $companyInstanceCache->exists($currentContact->meroveusId) ? $companyInstanceCache->get($currentContact->meroveusId) : CompanyInstance::fetch_by_source_name_and_id('meroveus',
                $currentContact->meroveusId);
            
            if ($companyInstances) {
                $currentContact->companyInstanceId = $companyInstances->first()->companyInstanceId;
                $companyInstanceCache->put($currentContact->meroveusId, $companyInstances);
            }
            
            // if we have a new meroveus id, get all the contacts related to it
            if ($lastMeroveusId !== $currentContact->meroveusId) {
                
                // update meroveus id
                $lastMeroveusId = $currentContact->meroveusId;
                
                // get all contacts for this meroveus id
                $allContacts = [];
                
                // add each contact to our contacts array index by their name
                $contacts = Contact::fetch_where('meroveusId = ?', [$currentContact->meroveusId]);
                if ($contacts) {
                    foreach ($contacts as $contact) {
                        $key               = strtolower($contact->firstName . $contact->lastName);
                        $allContacts[$key] = $contact;
                    }
                    
                }
                
            }
            
            // key used to find this contact on our contacts array
            $key = strtolower($currentContact->firstName . $currentContact->lastName);
            
            // does this contact exist?
            if (empty($allContacts[$key])) {
                
                $currentContact->set_literal('created_at', 'NOW()');
                $currentContact->set_literal('updated_at', 'NOW()');
                
                $contactInsertionBuffer->insert($currentContact);
                
            } else {
                
                // the contact in the db
                $existingContact = $allContacts[$key];
                
                // overwrite empty values in the db with non empty values from the csv
                foreach ($existingContact->get_db_values_array() as $columnName => $valueInDB) {
                    
                    // the value loaded from the csv
                    $newValue = isset($currentContact->$columnName) ? $currentContact->$columnName : null;
                    
                    // is the new value different from what we have?
                    $newValueIsDifferent = $valueInDB != $newValue;
                    
                    // current value is null or empty string
                    $existingValueIsUseless = is_null($valueInDB) || $valueInDB === '';
                    
                    // update db value with new value
                    if ($newValueIsDifferent && $existingValueIsUseless) {
                        $existingContact->$columnName = $currentContact->$columnName;
                    }
                }
                
                $existingContact->save();
            }
            
            $totalCount++;
            
        }
        
        $contactInsertionBuffer->flush();
        
        echo "ended at " . date('h:i:s A') . PHP_EOL;
        echo "imported {$totalCount} records" . PHP_EOL;
        echo "\t created {$insertCount}";
        echo "\t updated {$updateCount}";
    }
    
    
    /**
     * php run.php import datasetFromCsv -e development --file=/home/vagrant/files/<file>.csv
     * takes a specifically formatted csv and makes/saves a dataset of it
     */
    public function datasetFromCsvAction()
    {
        $csvFile  = realpath($this->getRequest()->getParam('file'));
        $importer = new Dataset();
        $importer->importFromCsv($csvFile);
    }
    
    /**
     * @return string
     */
    public function top25ListAction()
    {
        $error = [
            'noInstance' => 0,
            'mapSave' => 0,
            'listSave' => 0,
            'noLists' => 0,
        ];
        // get all the lists
        $config = $this->getServiceLocator()->get('Config');
        $bizjDB = new \PDO('mysql:host=' . $config['mysql']['bizjournals']['host'] . ';
            dbname:=' . $config['mysql']['bizjournals']['dbname'], $config['mysql']['bizjournals']['user'],
            $config['mysql']['bizjournals']['password']);
        $sql    = "
            SELECT
              tlr.company_name,
              tlr.list_id,
              tlr.object_id                   AS meroveusId,
              tl.issue_date,
              tl.page_headline,
              concat(p.path, p.slug, '.html') AS path
            FROM bizj.top25_list_row tlr
              INNER JOIN bizj.top25_list tl ON tlr.list_id = tl.list_id
              INNER JOIN bizj.page p ON tl.page_id = p.page_id
            WHERE p.release_time <= NOW()
                  AND object_id <> 0
                  AND tlr.company_name IS NOT NULL
                  AND tlr.company_name <> ''
                  AND tlr.object_type = 'company'
            ORDER BY tlr.list_id ASC
            ";
        $stmnt  = $bizjDB->prepare($sql);
        $stmnt->execute();
        // process and save them
        $lists = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
        if ($lists) {
            foreach ($lists as $k => $list) {
                $instance = CompanyInstance::fetch_by_source_name_and_id('meroveus', $list['meroveusId']);
                if ($instance) {
                    // build the mapping
                    $map                    = new CompanyInstanceTop25lists();
                    $map->companyInstanceId = $instance->first()->companyInstanceId;
                    $map->listId            = $list['list_id'];
                    // save the mapping
                    $mapSave = $map->save();
                    if (!$mapSave) {
                        //log the error
                        $error['mapSave']++;
                    }
                    // of the next list_id is different, save the current one
                    if ($list['list_id'] !== $lists[$k + 1]['list_id']) {
                        $listToSave               = new Top25List();
                        $listToSave->listId       = empty($list['list_id']) ? null : $list['list_id'];
                        $listToSave->issueDate    = empty($list['issue_date']) ? null : $list['issue_date'];
                        $listToSave->pageHeadline = empty($list['page_headline']) ? null : $list['page_headline'];
                        $listToSave->listUrl      = empty($list['path']) ? null : $list['path'];
                        // save the list
                        if (!$listToSave->save()) {
                            // log the error
                            $error['listSave']++;
                        }
                    }
                } else {
                    // log the error
                    $error['noInstance']++;
                }
            }
        } else {
            // log the error
            $error['noLists']++;
        }
        
        return "done importing" . PHP_EOL. var_dump($error);

//        $importer = Top25ListImporter::importFromDb();
        // do the call
        // format the results
        // save
        
        
    }
    
    /**
     * reads their csv and saves it to dh
     */
    public function bbmAction(){
        
        echo PHP_EOL.'

888888b.  888888b.  888b     d8888888888          d8b                888   d8b
888  "88b 888  "88b 8888b   d8888  888            Y8P                888   Y8P
888  .88P 888  .88P 88888b.d88888  888                               888
8888888K. 8888888K. 888Y88888P888  888  88888b.  8888 .d88b.  .d8888b888888888 .d88b. 88888b.
888  "Y88b888  "Y88b888 Y888P 888  888  888 "88b "888d8P  Y8bd88P"   888   888d88""88b888 "88b
888    888888    888888  Y8P  888  888  888  888  88888888888888     888   888888  888888  888
888   d88P888   d88P888   "   888  888  888  888  888Y8b.    Y88b.   Y88b. 888Y88..88P888  888
8888888P" 8888888P" 888       8888888888888  888  888 "Y8888  "Y8888P "Y888888 "Y88P" 888  888
                                                                        888
                                                                       d88P
                                                                      888P"
'.PHP_EOL;

        $csvFile  = realpath($this->getRequest()->getParam('file'));
        $importer = new Bbm();
        $importer->importFromCsv($csvFile);
        /**
         * read their csv from wherever it lives
         * insert with pdo
         * profit
         */
        
//        $csvFile  = realpath($this->getRequest()->getParam('file'));
//        $dave = $csvFile;
//        echo PHP_EOL.'dave';
    }
}
