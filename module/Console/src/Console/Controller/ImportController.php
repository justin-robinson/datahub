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

        $csvFile = realpath($this->getRequest()->getParam('file'));
        if (file_exists($csvFile)) {
            if (pathinfo($csvFile, PATHINFO_EXTENSION) === 'csv') {
                echo "Processing File: " . $csvFile . PHP_EOL;

                // open file as csv
                $file = new \Console\CsvIterator($csvFile);

                // refinery columns
                $rc = array_flip($file->getHeaderRow());

                $queryParams = [];

                // start out with row -1
                $rowNumber = -1;

                // process the rows
                foreach ( $file as $rowNumber => $record ) {

                    // so we don't parse an empty line
                    if ( !empty($record) ) {
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

                        $db->prepare($sql)->execute($queryParams);
                    }
                }

                $rowNumber++;
                echo "ended at " . date('h:i:s A') . PHP_EOL . 'imported ' . $rowNumber . ' records' . PHP_EOL;
            } else {
                die('Parameter must be a CSV file.');
            }
        } else {
            die('File not found: ' . $csvFile);
        }
    }

}
