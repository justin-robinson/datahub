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

        $companyCache = new LRUCache( 1000 );
        $companyInstanceCache = new LRUCache ( 1000 );

        // process the rows
        foreach ( $file as $record ) {

            try {
                // why don't we merge automatically?
                // because then we would have to try catch around the foreach loop and that would
                // cause the loop to break.  This way we can continue processing the remaining rows
                $record = $file->mergeWithHeaderRow( $record );

                // format record into some db models
                $company = $formatter->format( $record );

                $companyKey = $company->normalizedName;

                // does this company exist in the cache?
                $existingCompany = $companyCache->get( $companyKey );

                // look up to db on cache miss
                if( !$existingCompany ) {
                    $existingCompany = Company::fetch_one_where( 'normalizedName = ?', [ $company->normalizedName ] );
                }

                // just save the company instance if the company already exists
                if( $existingCompany ) {
                    $instance = $company->get_company_instances()->first();

                    if( $instance ) {

                        // link this instance to the company
                        $instance->companyId = $existingCompany->companyId;

                        // our cache key
                        $zip = $instance->get_property('zipCode');
                        $addr1 = $instance->get_property('address1');
                        $keyValues = [$instance->companyId,$instance->name,$zip->value,$addr1->value];
                        $instanceKey = strtolower(implode( '-', $keyValues ));

                        // check cache and db for this instance
                        $existingInstance = $companyInstanceCache->get( $instanceKey );

                        if ( !$existingInstance ) {
                            $existingInstance = CompanyInstance::query(
                                "SELECT
                                  i.*
                                 FROM
                                  `datahub`.`companyInstance` i
                                  LEFT JOIN `datahub`.`companyInstanceProperty` p USING ( companyInstanceId )
                                 WHERE
                                  i.companyId = ?
                                  AND i.name = ?
                                  AND (
                                    ( p.name = 'zipCode' AND p.value = ? )
                                    OR
                                    ( p.name = 'address1' AND p.value = ? )
                                    )",
                                $keyValues);

                            if ( $existingInstance ) {
                                $existingInstance = $existingInstance->first();
                            }
                        }

                        // add properties to an existing instance
                        if ( $existingInstance ) {

                            // add properties to this instance
                            $existingInstance->set_properties( $instance->get_properties() );

                            $existingInstance->save_properties();

                        } else {
                            // save instance and properties
                            $instance->save();

                            $companyInstanceCache->put( $instanceKey, $instance );

                            ++$instancesProcessed;
                        }

                    }
                } else {

                    // false means don't autoset the timestamps since we are using the ones from the imported data
                    $company->save( false );

                    // put company in cache for later
                    $companyCache->put( $companyKey, $company );

                    ++$companiesProcessed;
                    ++$instancesProcessed;
                }

            } catch ( CsvIteratorException $e ) {
                // CsvIterator throws an exception when number of columns in the header row
                // and the current line do not match
                echo $e->getMessage() . PHP_EOL;
            }

        }

        return [$companiesProcessed, $instancesProcessed];
    }
}
