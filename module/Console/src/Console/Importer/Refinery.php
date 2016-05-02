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

        // how many inserts we will do at once
        $bufferLimit = 1000;

        // the table we are inserting into
        $bufferTable = 'datahub.company';

        // names of columns to insert
        $insertColumns = [
            'refinery_id'        => '?',
            'meroveus_id'        => '?',
            'generate_code'      => '?',
            'record_source'      => '?',
            'company_name'       => '?',
            'public_ticker'      => '?',
            'ticker_exchange'    => '?',
            'source_modified_at' => '?',
            'address1'           => '?',
            'address2'           => '?',
            'city'               => '?',
            'state'              => '?',
            'postal_code'        => '?',
            'country'            => '?',
            'latitude'           => '?',
            'longitude'          => '?',
            'phone'              => '?',
            'website'            => '?',
            'is_active'          => '?',
            'sic_code'           => '?',
            'employee_count'     => '?',
            'created_at'         => 'NOW()',
            'updated_at'         => 'NOW()',
            'deleted_at'         => 0,
        ];

        // columns to update upon duplicate key detection
        // removed refinery_id, created_at, and deleted_at
        $updateColumns = [
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
            'updated_at',
        ];

        // make dat buffer
        $queryBuffer = new Buffer( $bufferLimit, $db, $bufferTable, $insertColumns, $updateColumns);

        // data formatter
        $formatter = Factory::factory( 'importmeroveus' );

        // process the rows
        foreach ( $file as $record ) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows

                // format the record and "insert" it into the db
                $queryBuffer->insert(
                    $formatter->format(
                        $file->mergeWithHeaderRow( $record )
                    )
                );

                $count++;
            } catch ( CsvIteratorException $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        // flush remaining inserts left in buffer
        $queryBuffer->flush();

        return $count;
    }
}
