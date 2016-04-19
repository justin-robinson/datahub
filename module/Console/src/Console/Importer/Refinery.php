<?php

namespace Console\Importer;

use Console\CsvIterator;
use Console\Record\Formatter\Factory;

/**
 * Class Refinery
 * @package Console\Importer
 */
class Refinery extends ImporterAbstract{

    /**
     * @param $csvFile
     * @param $db \PDO
     *
     * @return int
     * @throws \Console\Record\Formatter\Exception\NotFound
     */
    public function import ( $csvFile, $db ) {

        // open file as csv
        $file = new CsvIterator($csvFile);

        // we have a header row woohoo!
        $file->setHasHeaderRow(true);

        // how many rows we processed
        $count = 0;

        // prepare our insert
        $insertCompanyStmt = $db->prepare('
            INSERT INTO
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
                    NOW(),
                    NOW(),
                    0
                )');

        // data formatter
        $formatter = Factory::factory('importmeroveus');

        // process the rows
        foreach ($file as $record) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows
                $record = $file->mergeWithHeaderRow($record);

                $queryParams = $formatter->format($record);

                $insertCompanyStmt->execute($queryParams);

                $count++;
            } catch (\Exception $e) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        return $count;
    }
}
