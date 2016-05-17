<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyOld
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/16
 * @property mixed $hub_id
 * @property mixed $refinery_id
 * @property mixed $meroveus_id
 * @property mixed $generate_code
 * @property mixed $record_source
 * @property mixed $company_name
 * @property mixed $public_ticker
 * @property mixed $ticker_exchange
 * @property mixed $source_modified_at
 * @property mixed $address1
 * @property mixed $address2
 * @property mixed $city
 * @property mixed $state
 * @property mixed $postal_code
 * @property mixed $country
 * @property mixed $latitude
 * @property mixed $longitude
 * @property mixed $phone
 * @property mixed $website
 * @property mixed $is_active
 * @property mixed $sic_code
 * @property mixed $employee_count
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $deleted_at
 * @property mixed $universal_revenue_volume_static
 * @property mixed $universal_employee_count_static
 * @property mixed $universal_employee_local_static
 * @property mixed $universal_established_year_static
 * @property mixed $universal_profile_blob_static
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyOld
 */
class CompanyOld extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyOld';
    const AUTO_INCREMENT_COLUMN = 'hub_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'hub_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'hub_id',
          1 => 'company_name',
          2 => 'is_active',
          3 => 'created_at',
          4 => 'updated_at',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'hub_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'refinery_id' => 
          array (
          ),
          'meroveus_id' => 
          array (
          ),
          'generate_code' => 
          array (
          ),
          'record_source' => 
          array (
          ),
          'company_name' => 
          array (
          ),
          'public_ticker' => 
          array (
          ),
          'ticker_exchange' => 
          array (
          ),
          'source_modified_at' => 
          array (
          ),
          'address1' => 
          array (
          ),
          'address2' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'postal_code' => 
          array (
          ),
          'country' => 
          array (
          ),
          'latitude' => 
          array (
          ),
          'longitude' => 
          array (
          ),
          'phone' => 
          array (
          ),
          'website' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'sic_code' => 
          array (
          ),
          'employee_count' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
          'universal_revenue_volume_static' => 
          array (
          ),
          'universal_employee_count_static' => 
          array (
          ),
          'universal_employee_local_static' => 
          array (
          ),
          'universal_established_year_static' => 
          array (
          ),
          'universal_profile_blob_static' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'hub_id' => NULL,
          'refinery_id' => NULL,
          'meroveus_id' => NULL,
          'generate_code' => NULL,
          'record_source' => NULL,
          'company_name' => NULL,
          'public_ticker' => NULL,
          'ticker_exchange' => NULL,
          'source_modified_at' => NULL,
          'address1' => NULL,
          'address2' => NULL,
          'city' => NULL,
          'state' => NULL,
          'postal_code' => NULL,
          'country' => NULL,
          'latitude' => NULL,
          'longitude' => NULL,
          'phone' => NULL,
          'website' => NULL,
          'is_active' => NULL,
          'sic_code' => NULL,
          'employee_count' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
          'deleted_at' => NULL,
          'universal_revenue_volume_static' => NULL,
          'universal_employee_count_static' => NULL,
          'universal_employee_local_static' => NULL,
          'universal_established_year_static' => NULL,
          'universal_profile_blob_static' => NULL,
        );

}

?>