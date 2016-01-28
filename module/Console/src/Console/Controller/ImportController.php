<?php

namespace Console\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Db\Adapter as dbAdapter;

/**
 * Class ImportController
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

    protected $sqlInsertCompany = ' INSERT INTO
            datahub.company(
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

    protected $sqlInsertContact =
        'INSERT INTO
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
          )';

    /**
     * Just echo the environment
     *
     * @access pubic
     * @return void
     */
    public function indexAction()
    {
        $env = $this->getRequest()->getParam('env');
        echo "$env\n";
        return "$env\n";
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
        echo'
         ██▓    ███▄ ▄███▓    ██▓███      ▒█████      ██▀███     ▄▄▄█████▓    ██▓    ███▄    █      ▄████
        ▓██▒   ▓██▒▀█▀ ██▒   ▓██░  ██▒   ▒██▒  ██▒   ▓██ ▒ ██▒   ▓  ██▒ ▓▒   ▓██▒    ██ ▀█   █     ██▒ ▀█▒
        ▒██▒   ▓██    ▓██░   ▓██░ ██▓▒   ▒██░  ██▒   ▓██ ░▄█ ▒   ▒ ▓██░ ▒░   ▒██▒   ▓██  ▀█ ██▒   ▒██░▄▄▄░
        ░██░   ▒██    ▒██    ▒██▄█▓▒ ▒   ▒██   ██░   ▒██▀▀█▄     ░ ▓██▓ ░    ░██░   ▓██▒  ▐▌██▒   ░▓█  ██▓
        ░██░   ▒██▒   ░██▒   ▒██▒ ░  ░   ░ ████▓▒░   ░██▓ ▒██▒     ▒██▒ ░    ░██░   ▒██░   ▓██░   ░▒▓███▀▒
        ░▓     ░ ▒░   ░  ░   ▒▓▒░ ░  ░   ░ ▒░▒░▒░    ░ ▒▓ ░▒▓░     ▒ ░░      ░▓     ░ ▒░   ▒ ▒     ░▒   ▒
         ▒ ░   ░  ░      ░   ░▒ ░          ░ ▒ ▒░      ░▒ ░ ▒░       ░        ▒ ░   ░ ░░   ░ ▒░     ░   ░
         ▒ ░   ░      ░      ░░          ░ ░ ░ ▒       ░░   ░      ░          ▒ ░      ░   ░ ░    ░ ░   ░
         ░            ░                      ░ ░        ░                     ░              ░          ░
        '. PHP_EOL;
        echo "started at " . date('h:i:s A') . PHP_EOL;
        $db  = new \PDO('mysql:host=devdb.bizjournals.int;dbname=datahub', 'web', '');

        $csvFile = realpath($this->getRequest()->getParam('file'));
        if (file_exists($csvFile)) {
            if (pathinfo($csvFile, PATHINFO_EXTENSION) === 'csv') {
                echo "Processing File: " . $csvFile . PHP_EOL;

                // open file as csv
                $file = new \Console\CsvIterator($csvFile);

                // refinery columns
                $rc = array_flip($file->getHeaderRow());

                $queryParams = [];

                // how many rows we processed
                $count = 0;

                // prepare our insert
                $insertStatement = $db->prepare($this->sqlInsertCompany);

                // process the rows
                foreach ( $file as $record ) {

                    // so we don't parse an empty line
                    if ( $record ) {
                        // TODO create ticker exchange normalizer classes
                        $tickerExchange = strpos($record[$rc['TickerExchange']], 'NASDAQ') ? 'NASDAQ' : $record[$rc['TickerExchange']];
                        $tickerExchange = strpos($record[$rc['TickerExchange']], 'York Stock') ? 'NYSE' : $record[$rc['TickerExchange']];

                        //var_dump($record);
                        $queryParams[':refinery_id']        = $record[$rc['InternalId']];
                        $queryParams[':meroveus_id']        = null;
                        $queryParams[':generate_code']      = $record[$rc['GenId']];
                        $queryParams[':record_source']      = (empty($record[$rc['SourceID']]) ? 'Refinery' : 'Refinery:' . $record[$rc['SourceID']]);
                        $queryParams[':company_name']       = $record[$rc['Name']];
                        $queryParams[':public_ticker']      = $record[$rc['Ticker']];
                        $queryParams[':ticker_exchange']    = $tickerExchange;
                        $queryParams[':source_modified_at'] = $record[$rc['DateModified']];
                        $queryParams[':address1']           = $record[$rc['Addr1']];
                        $queryParams[':address2']           = $record[$rc['Addr2']];
                        $queryParams[':city']               = $record[$rc['City']];
                        $queryParams[':state']              = $record[$rc['State']];
                        $queryParams[':postal_code']        = $record[$rc['PostalCode']]; // validate
                        $queryParams[':country']            = $record[$rc['Country']]; // validate
                        $queryParams[':latitude']           = $record[$rc['Lat']];
                        $queryParams[':longitude']          = $record[$rc['Lon']];
                        $queryParams[':phone']              = $record[$rc['OfficePhone1']];
                        $queryParams[':website']            = $record[$rc['Url']];
                        $queryParams[':is_active']          = true;
                        $queryParams[':sic_code']           = $record[$rc['Sic']];
                        $queryParams[':employee_count']     = 0;
                        $queryParams[':created_at']         = 'NOW()';
                        $queryParams[':updated_at']         = 'NOW()';
                        $queryParams[':deleted_at']         = null;

                        $insertStatement->execute($queryParams);
                        $count++;
                    }
                }
                echo "ended at " . date('h:i:s A') . PHP_EOL . 'imported ' . $count . ' records' . PHP_EOL;
            } else {
                die('Parameter must be a CSV file.');
            }
        } else {
            die('File not found: ' . $csvFile);
        }
    }

    /**
     * Merges relevate csv data with our existing data
     *
     * @access public
     * @return void
     */
    public function relevateAction () {

        $csvFile = realpath($this->getRequest()->getParam('file'));

        $file = new \Console\CsvIterator($csvFile);

        // this isn't a proper csv so just ensure we are skipping the empty lines
        $file->setFlags(\SplFileObject::SKIP_EMPTY);

        // meroveus ids are grouped together so we can use this to reduce sql queries down to 1 for each company
        $lastMeroveusId = -1;

        foreach ( $file as $line ) {

            // char 0 to 10 is the id, strip off the first two digits and we have a meroveus id
            $currentMeroveusId = trim ( substr ( $line, 2, 8 ) );

            /**
             * Not even our lord and savior knows why relevate decided to go with fixed width
             * columns and then call it a csv.  If you are reading this please pay your respects,
             * for I am sending this message from beyond the grave
             *          - justin robinson
             */
            $contactDataArray = [
                'meroveus_id'         => $currentMeroveusId,
                'relevate_id'         => $currentMeroveusId,
                'is_duplicate'        => 0,
                'is_current_employee' => 1,
                'first_name'          => ucwords ( strtolower ( trim ( substr ( $line, 296, 11 ) ) ) ),
                'middle_initial'      => ucwords ( strtolower ( trim ( substr ( $line, 307, 1 ) ) ) ),
                'last_name'           => ucwords ( strtolower ( trim ( substr ( $line, 308, 14 ) ) ) ),
                'suffix'              => ucwords ( strtolower ( trim ( substr ( $line, 322, 3 ) ) ) ),
                'honorific'           => '',
                'job_title'           => ucwords ( strtolower ( trim ( substr ( $line, 325, 30 ) ) ) ),
                'job_position_id'     => '',
                'email'               => '',
                'phone'               => '',
                'address1'            => '',
                'address2'            => null,
                'city'                => null,
                'state'               => null,
                'postal_code'         => null,
                'created_at'          => new \phpr\Database\Literal('NOW()'),
                'updated_at'          => new \phpr\Database\Literal('NOW()'),
            ];

            // get the job position id
            $jobPosition = \DB\Datahub\JobPosition::fetch_one_where('position = ?', [$contactDataArray['job_title']]);
            if ( $jobPosition ) {
                $contactDataArray['job_position_id'] = $jobPosition->job_position_id;
            }

            // if we have a new meroveus id, get all the contacts related to it
            if ( $lastMeroveusId !== $currentMeroveusId ) {

                // update meroveus id
                $lastMeroveusId = $currentMeroveusId;

                // get all contacts for this meroveus id
                $allContacts = \DB\Datahub\Contact::fetch_where(
                    'meroveus_id = ?',
                    1000,
                    [$currentMeroveusId]);

                // translate int indexes into something useful
                foreach ( $allContacts as $key => $contact ) {

                    // new index will be the contact name
                    $newKey = strtolower($contact->first_name . $contact->last_name);

                    // replace index
                    $allContacts[$newKey] = $contact;
                    unset($allContacts[$key]);
                }
            }

            // the contact key
            $key = strtolower($contactDataArray['first_name'] . $contactDataArray['last_name']);

            // does this contact exist?
            if ( empty($allContacts[$key]) ) {

                // create a new contact
                $contact = new \DB\Datahub\Contact($contactDataArray);

            } else {

                // update contact with missing info
                $contact = $allContacts[$key];

                foreach ( $contactDataArray as $columnName => $value ) {

                    // do not replace this with empty() since 0 is a valid value
                    if ( is_null($contact->{$columnName}) || $contact->{$columnName} === '' ) {
                        $contact->{$columnName} = $value;
                    }

                }
            }

            $contact->save();

        }
    }

}
