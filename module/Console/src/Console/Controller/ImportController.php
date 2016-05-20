<?php

namespace Console\Controller;

use Console\Importer\Refinery;
use Console\CsvIterator;
use Console\Record\Formatter\Formatters\Relevate;
use Scoop\Database\Literal;
use Zend\Db\Adapter as dbAdapter;

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
        'selectContacts'    => '
            SELECT
                *
            FROM
              `datahub`.`contact`
            WHERE meroveus_id = ?
            LIMIT 1000',
        'insertContact'     => '
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
        'updateContact'     => '
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

        list($companiesProcessed, $instancesProcessed) = $importer->import($csvFile, $this->db);

        printf("ended at %s%sImported: %s\t%s companies%s\t%s instances%s", date('h:i:s A'),
               PHP_EOL, PHP_EOL,$companiesProcessed,PHP_EOL,$instancesProcessed,PHP_EOL);
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

        if ( !$filePath ) {
            die ( 'run with arg --file /path/to/file ');
        }

        $filePath = realpath($filePath);
        if ( !$filePath ) {
            die ( "--file does not exist: " . $this->getRequest()->getParam('file') );
        }

        $file = new CsvIterator($filePath);

        // this isn't a proper csv so just ensure we are skipping the empty lines
        $noCsvFlag = $file->getFlags() ^ CsvIterator::READ_CSV;
        $file->setFlags($noCsvFlag);

        // meroveus ids are grouped together so we can use this to reduce sql queries down to 1 for each company
        $lastMeroveusId = -1;

        $updateContact     = null;//$this->sqlStatementsArray['updateContact'];

        // some stats
        $totalCount = $insertCount = $updateCount = 0;

        echo "started at " . date('h:i:s A') . PHP_EOL;

        $formatter = Relevate::get_instance();

        foreach ($file as $line) {

            $contact = new \DB\Datahub\Contact($formatter->format($line));

            // get the hub id
            $company = \DB\Datahub\CompanyOld::fetch_one_where(
                'meroveus_id = ?',
                [$contact->meroveus_id]);
            if ($company) {
                $contact->hub_id = $company->hub_id;
            }

            // if we have a new meroveus id, get all the contacts related to it
            if ($lastMeroveusId !== $contact->meroveus_id) {

                // update meroveus id
                $lastMeroveusId = $contact->meroveus_id;

                // get all contacts for this meroveus id
                $allContacts = [];

                // add each contact to our contacts array index by their name
                foreach (\DB\Datahub\Contact::fetch_where('meroveus_id = ?', [$contact->meroveus_id]) as &$contact) {
                    $key               = strtolower($contact->first_name . $contact->last_name);
                    $allContacts[$key] = $contact;
                }

            }

            // key used to find this contact on our contacts array
            $key = strtolower($contact->first_name . $contact->last_name);

            // does this contact exist?
            if (empty($allContacts[$key])) {

                $contact->set_literal( 'created_at', 'NOW()' );
                $contact->set_literal( 'updated_at', 'NOW()' );

                // insert new contact
                $contact->save();

            } else {

                // the contact in the db
                $existingContact = $allContacts[$key];

                // flag that we updated a contact
                $contactNeedsUpdate = false;

                foreach ($existingContact as $columnName => $valueInDB) {

                    // pdo sql statements use this column prefix naming convention
                    $pdoColumnName = ':' . $columnName;

                    // the value loaded from the csv
                    $newValue = isset($contactDataArray[$pdoColumnName]) ? $contactDataArray[$pdoColumnName] : null;

                    // is the new value different from what we have?
                    $newValueisDifferent = $existingContact[$columnName] != $newValue;

                    // current value is null or empty string
                    $existingValueIsUseless = is_null($existingContact[$columnName]) || $existingContact[$columnName] === '';

                    // update db value with new value
                    if ($newValueisDifferent && $existingValueIsUseless) {
                        $valueInDB          = $newValue;
                        $contactNeedsUpdate = true;
                    }

                    // set value to be sent as update
                    $contactDataArray[$pdoColumnName] = $valueInDB;

                }

                // update the contact record
                if ($contactNeedsUpdate) {
                    $updateCount += $updateContact->execute($contactDataArray);
                }
            }

            $totalCount++;

        }

        echo "ended at " . date('h:i:s A') . PHP_EOL;
        echo "imported {$totalCount} records" . PHP_EOL;
        echo "\t created {$insertCount}";
        echo "\t updated {$updateCount}";
    }

}
