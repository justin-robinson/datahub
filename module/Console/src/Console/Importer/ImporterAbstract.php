<?php

namespace Console\Importer;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use LRUCache\LRUCache;

/**
 * Class ImporterAbstract
 * @package Console\Importer
 */
abstract class ImporterAbstract {

    public static $companyCache;
    public static $companyInstanceCache;

    public $companiesSaved = 0;
    public $instancesSaved = 0;

    public function __construct () {
        if ( is_null(self::$companyCache) ) {
            self::$companyCache = new LRUCache( 1000 );
        }
        if ( is_null(self::$companyInstanceCache) ) {
            self::$companyInstanceCache = new LRUCache ( 1000 );
        }
    }

    /**
     * @param $filePath
     * @param $db \PDO
     *
     * @return mixed
     */
    abstract public function import ( $filePath, $db );

    public function save ( Company $company ) {
        $companyKey = $company->normalizedName;

        // does this company exist in the cache?
        $existingCompany = self::$companyCache->get( $companyKey );

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
                $existingInstance = self::$companyInstanceCache->get( $instanceKey );

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

                    self::$companyInstanceCache->put( $instanceKey, $instance );

                    ++$this->instancesSaved;
                }

            }
        } else {

            // false means don't autoset the timestamps since we are using the ones from the imported data
            $company->save( false );

            // put company in cache for later
            self::$companyCache->put( $companyKey, $company );

            ++$this->companiesSaved;
            ++$this->instancesSaved;
        }
    }
}
