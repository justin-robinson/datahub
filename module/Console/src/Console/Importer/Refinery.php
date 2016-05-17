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
        $count = 0;

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

                // does this company exist in the cache?
                $existingCompany = $companyCache->get( $record['Name'] );

                // look up to db on cache miss
                if( !$existingCompany ) {
                    $existingCompany = Company::fetch_one_where( 'name = ? AND stateId = ?', [ $company->name, $company->stateId ] );
                }

                // just save the company instance if the company already exists
                if( $existingCompany ) {
                    $instance = $company->get_company_instances()->first();

                    if( $instance ) {

                        // link this instance to the company
                        $instance->companyId = $existingCompany->companyId;

                        // our cache key
                        $instanceKey = "{$instance->companyId}-{$instance->namne}";

                        // flag to determine if this instance is in the db
                        // check our cache first to determine if the instance has been created in this run
                        $instanceExists = $companyInstanceCache->exists( $instanceKey );

                        // not in cache? try to save
                        if ( !$instanceExists ) {
                            try{

                                // false means don't autoset the timestamps since we are using the ones from the imported data
                                $instance->save( false );

                                // put this instance in the cache
                                $companyInstanceCache->put( $instanceKey, $instance );
                            } catch ( \Exception $e ) {
                                // insertion failed, probably a dupe
                                $instanceExists = true;
                            }
                        }

                        // add properties to an existing instance
                        if ( $instanceExists ) {

                            // new properties to add
                            $properties = $instance->get_properties();

                            // find the existing instance
                            $instance = CompanyInstance::fetch_one_where( 'companyId = ? AND name = ?', [$instance->companyId, $instance->name] );

                            // add properties to this instance
                            $instance->set_properties( $properties );

                            // save that mess
                            $instance->save();

                            // put this instance in the cache
                            $companyInstanceCache->put( $instanceKey, $instance );
                        }

                    }
                } else {

                    // false means don't autoset the timestamps since we are using the ones from the imported data
                    $company->save( false );

                    // put company in cache for later
                    $companyCache->put( $record['Name'], $company );
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
