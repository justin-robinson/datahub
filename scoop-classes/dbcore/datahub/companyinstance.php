<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstance
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/05
 * @property mixed $company_instance_id
 * @property mixed $company_id
 * @property mixed $refinery_id
 * @property mixed $meroveus_id
 * @property mixed $alias
 * @property mixed $is_headquarters
 * @property mixed $market_code
 * @property mixed $meta
 * @property mixed $sic_code
 * @property mixed $ticker_exchange
 * @property mixed $tier_level
 * @property mixed $employee_count_instance
 * @property mixed $employee_count_company
 * @property mixed $established_year
 * @property mixed $revenue
 * @property mixed $universal_profile_blob_static
 * @property mixed $url
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $deleted_at
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyInstance
 */
class CompanyInstance extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstance';
    const AUTO_INCREMENT_COLUMN = 'company_instance_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'company_instance_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'company_instance_id',
          1 => 'company_id',
          2 => 'is_headquarters',
          3 => 'created_at',
          4 => 'updated_at',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'company_instance_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'company_id' => 
          array (
          ),
          'refinery_id' => 
          array (
          ),
          'meroveus_id' => 
          array (
          ),
          'alias' => 
          array (
          ),
          'is_headquarters' => 
          array (
          ),
          'market_code' => 
          array (
          ),
          'meta' => 
          array (
          ),
          'sic_code' => 
          array (
          ),
          'ticker_exchange' => 
          array (
          ),
          'tier_level' => 
          array (
          ),
          'employee_count_instance' => 
          array (
          ),
          'employee_count_company' => 
          array (
          ),
          'established_year' => 
          array (
          ),
          'revenue' => 
          array (
          ),
          'universal_profile_blob_static' => 
          array (
          ),
          'url' => 
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
        );


    protected $dBValuesArray = 
        array (
          'company_instance_id' => NULL,
          'company_id' => NULL,
          'refinery_id' => NULL,
          'meroveus_id' => NULL,
          'alias' => NULL,
          'is_headquarters' => NULL,
          'market_code' => NULL,
          'meta' => NULL,
          'sic_code' => NULL,
          'ticker_exchange' => NULL,
          'tier_level' => NULL,
          'employee_count_instance' => NULL,
          'employee_count_company' => NULL,
          'established_year' => NULL,
          'revenue' => NULL,
          'universal_profile_blob_static' => NULL,
          'url' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
          'deleted_at' => NULL,
        );



}

?>