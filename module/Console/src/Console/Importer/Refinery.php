<?php

namespace Console\Importer;

use Console\CsvIterator;
use Console\CsvIteratorException;
use Console\Record\Formatter\Formatters\ImportRefinery;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use LRUCache\LRUCache;

/**
 * Class Refinery
 * @package Console\Importer
 */
class Refinery extends ImporterAbstract {

    /**
     * @param $csvFile
     * @param $db \PDO
     *
     * @return int
     * @throws \Console\Record\Formatter\Exception\NotFound
     */
    public function import ( $csvFile, $db ) {

        // open file as csv
        $file = new CsvIterator( $csvFile );

        // we have a header row woohoo!
        $file->setHasHeaderRow( true );

        // how many rows we processed
        $companiesProcessed = 0;
        $instancesProcessed = 0;

        $formatter = ImportRefinery::get_instance();

        

        // process the rows
        foreach ( $file as $record ) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows
                $record = $file->mergeWithHeaderRow( $record );

                // format record into some db models
                $company = $formatter->format( $record );

                $this->save( $company );

            } catch ( CsvIteratorException $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        return [$companiesProcessed, $instancesProcessed];
    }
}
