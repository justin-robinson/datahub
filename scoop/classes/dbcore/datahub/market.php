<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Market
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/16
 * @property mixed $market_id
 * @property mixed $market_code
 * @property mixed $market_name
 * @property mixed $market_abbrev
 * @property mixed $city
 * @property mixed $state
 * @property mixed $region
 * @property mixed $region_objective
 * @property mixed $analytics_code
 * @property mixed $local_sales_tax
 * @property mixed $primary_zip_code
 * @property mixed $center_latitude
 * @property mixed $center_longitude
 * @property mixed $timezone
 * @property mixed $utc_std_offset
 * @property mixed $utc_dst_offset
 * @property mixed $payment_contact_id
 * @property mixed $nomination_faq
 * @property mixed $msa_or_pmsa
 * @property mixed $created_at
 * @property mixed $updated_at
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Market
 */
class Market extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'market';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'market_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'market_id',
          1 => 'market_code',
          2 => 'market_name',
          3 => 'market_abbrev',
          4 => 'city',
          5 => 'state',
          6 => 'region',
          7 => 'region_objective',
          8 => 'analytics_code',
          9 => 'timezone',
          10 => 'utc_std_offset',
          11 => 'utc_dst_offset',
          12 => 'created_at',
          13 => 'updated_at',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'market_id' => 
          array (
            0 => 1,
          ),
          'market_code' => 
          array (
          ),
          'market_name' => 
          array (
          ),
          'market_abbrev' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'region' => 
          array (
          ),
          'region_objective' => 
          array (
          ),
          'analytics_code' => 
          array (
          ),
          'local_sales_tax' => 
          array (
          ),
          'primary_zip_code' => 
          array (
          ),
          'center_latitude' => 
          array (
          ),
          'center_longitude' => 
          array (
          ),
          'timezone' => 
          array (
          ),
          'utc_std_offset' => 
          array (
          ),
          'utc_dst_offset' => 
          array (
          ),
          'payment_contact_id' => 
          array (
          ),
          'nomination_faq' => 
          array (
          ),
          'msa_or_pmsa' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'market_id' => NULL,
          'market_code' => NULL,
          'market_name' => NULL,
          'market_abbrev' => NULL,
          'city' => NULL,
          'state' => NULL,
          'region' => NULL,
          'region_objective' => NULL,
          'analytics_code' => NULL,
          'local_sales_tax' => NULL,
          'primary_zip_code' => NULL,
          'center_latitude' => NULL,
          'center_longitude' => NULL,
          'timezone' => NULL,
          'utc_std_offset' => NULL,
          'utc_dst_offset' => NULL,
          'payment_contact_id' => NULL,
          'nomination_faq' => NULL,
          'msa_or_pmsa' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
        );

}

?>