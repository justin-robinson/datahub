<?php

namespace Console\Importer;

use Console\CsvIterator;
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

        // There is limit 65,535 (2^16-1) place holders in prepared sql statements in mariadb
        // we have 21 per insert which gives us 3,120 max buffered inserts
        $bufferTable = 'datahub.company';
        $columnNames = [
            'refinery_id',
            'meroveus_id',
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
            'website',
            'is_active',
            'sic_code',
            'employee_count',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
        $bufferLimit = 1000;
        $sqlValuesTemplate = '(' . implode( ',', array_fill( 0, count( $columnNames ) - 3, '?' ) ) . ', NOW(), NOW(), 0)';

        $queryBuffer = new Buffer( $bufferLimit, $db, $bufferTable, $columnNames, $sqlValuesTemplate );

        // data formatter
        $formatter = Factory::factory( 'importmeroveus' );

        // process the rows
        foreach ( $file as $record ) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows
                $queryBuffer->insert(
                    $formatter->format(
                        $file->mergeWithHeaderRow( $record )
                    )
                );

                $count++;
            } catch ( \Exception $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        $queryBuffer->flush();

        return $count;
    }
}
