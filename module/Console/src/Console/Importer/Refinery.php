<?php

namespace Console\Importer;

use Console\CsvIterator;
use Console\CsvIteratorException;
use Console\DB\Query\Buffer;
use Console\Record\Formatter\Factory;

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
        $count = 0;

        /**
         * @var $formatter \Console\Record\Formatter\Formatters\ImportRefinery
         */
        $formatter = Factory::factory( 'importrefinery' );

        $lastCompany = new \DB\Datahub\Company();

        // process the rows
        foreach ( $file as $record ) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows
                $company = $formatter->format( $file->mergeWithHeaderRow( $record ) );

                if ( $lastCompany->name === $company->name ) {
                    $instance = $company->get_company_instances()->first();

                    if ( $instance ) {
                        $instance->companyId = $lastCompany->companyId;
                        $instance->save();
                    }
                } else {
                    $company->save();
                    $lastCompany = $company;
                }

                $count++;
            } catch ( CsvIteratorException $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        return $count;
    }
}
