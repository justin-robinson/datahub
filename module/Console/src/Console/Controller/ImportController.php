<?php

namespace Console\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ImportController extends AbstractActionController
{
    protected $RefineryColumns = [
        "InternalId"        => 0,
        "GenId"             => 1,
        "SourceID"          => 2,
        "Name"              => 3,
        "Ticker"            => 4,
        "TickerExchange"    => 5,
        "DateModified"      => 6,
        "Addr1"             => 7,
        "Addr2"             => 8,
        "City"              => 9,
        "State"             => 10,
        "PostalCode"        => 11,
        "Country"           => 12,
        "Lat"               => 13,
        "Lon"               => 14,
        "OfficePhone1"      => 15,
        "Url"               => 16,
        "Sic"               => 17,
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
     *
     * @access pubic
     * @return void
     */
    public function refineryAction()
    {
        $csvFile = realpath($this->getRequest()->getParam('file'));
        if (file_exists($csvFile)) {
            $info = pathinfo($csvFile);
            if ($info['extension'] == 'csv') {
                echo "Processing File: " . $csvFile . PHP_EOL;

                /* @var $model Hub\Model\Company */
                $model = $this->getServiceLocator()->get('Hub\Model\Company');

                $fp         = fopen($csvFile, 'r');
                $header     = $record = fgetcsv($fp);
                //var_dump($header);
                $rc         = $this->RefineryColumns;
                while ($record = fgetcsv($fp)) {
                    //var_dump($record);
                    /* @var $obj Hub\Model\Company */
                    $obj = $model->newModel();
                    $obj->populate([
                        'refinery_id'           => $record[$rc['InternalId']],
                        'generate_code'         => $record[$rc['GenId']],
                        'record_source'         => 'Refinery' . (empty($record[$rc['SourceID']]) ? '' : ':' . $record[$rc['SourceID']]),
                        'company_name'          => $record[$rc['Name']],
                        'public_ticker'         => $record[$rc['Ticker']],
                        'ticker_exchange'       => $record[$rc['TickerExchange']],
                        'source_modified_at'    => $record[$rc['DateModified']],
                        'address1'              => $record[$rc['Addr1']],
                        'address2'              => $record[$rc['Addr2']],
                        'city'                  => $record[$rc['City']],
                        'state'                 => $record[$rc['State']],
                        'postal_code'           => $record[$rc['PostalCode']],
                        'country'               => $record[$rc['Country']],
                        'latitude'              => $record[$rc['Lat']],
                        'longitude'             => $record[$rc['Lon']],
                        'phone'                 => $record[$rc['OfficePhone1']],
                        'website'               => $record[$rc['Url']],
                        'sic_code'              => $record[$rc['Sic']],
                    ])->save();
                    unset($obj);
                }
            } else {
                die('Parameter must be a CSV file.');
            }
        } else {
            die('File not found: ' . $csvFile);
        }
    }

}
