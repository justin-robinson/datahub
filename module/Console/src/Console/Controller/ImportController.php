<?php

namespace Console\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ImportController extends AbstractActionController
{
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
    /* 
     * Columns:
      [0] => "InternalId"
      [1] => "GenId"
      [2] => "SourceID"
      [3] => "Name"
      [4] => "Ticker"
      [5] => "TickerExchange"
      [6] => "DateModified"
      [7] => "Addr1"
      [8] => "Addr2"
      [9] => "City"
      [10] => "State"
      [11] => "PostalCode"
      [12] => "Country"
      [13] => "Lat"
      [14] => "Lon"
      [15] => "OfficePhone1"
      [16] => "Url"
      [17] => "Sic"
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

                $fp = fopen($csvFile, 'r');
                $header = $record = fgetcsv($fp);
                while ($record = fgetcsv($fp)) {
                    var_dump($record); die;
                    $obj = $model->newModel();
                    $obj->populate([
                        'refinery_id' => $record[0],
                        'generate_code',
                        'record_source',
                        'company_name',
                        'public_ticker',
                        'ticker_exchange',
                        'source_modified_at',
                        'address1',
                        'address2',
                        'city',
                        'state',
                        'postal_code',
                        'country',
                        'latitude',
                        'longitude',
                        'phone',
                    ])->save();
                    $obj->free();
                    die;
                }
            } else {
                die('Parameter must be a CSV file.');
            }
        } else {
            die('File not found: ' . $csvFile);
        }
    }

}
