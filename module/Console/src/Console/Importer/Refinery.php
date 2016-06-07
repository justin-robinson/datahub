<?php

namespace Console\Importer;

use Console\CsvIterator;
use Console\CsvIteratorException;
use Console\Record\Formatter\Formatters\ImportRefinery;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;

/**
 * Class Refinery
 * @package Console\Importer
 */
class Refinery extends ImporterAbstract {

    /**
     * @param      $csvFile
     *
     * @return array
     */
    public function import ( $csvFile ) {

        // open file as csv
        $file = new CsvIterator( $csvFile );

        // we have a header row woohoo!
        $file->setHasHeaderRow( true );

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

                $company->save();

            } catch ( CsvIteratorException $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        return [Company::$companiesSaved, CompanyInstance::$instancesSaved];
    }
}
