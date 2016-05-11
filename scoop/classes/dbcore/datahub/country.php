<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Country
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/11
 * @property mixed $countryId
 * @property mixed $code
 * @property mixed $country
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Country
 */
class Country extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'country';
    const AUTO_INCREMENT_COLUMN = 'countryId';
    const PRIMARY_KEYS = 
        array (
          0 => 'countryId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'countryId',
          1 => 'code',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'countryId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'code' => 
          array (
          ),
          'country' => 
          array (
          ),
        );


    protected $dBValuesArray = 
        array (
          'countryId' => NULL,
          'code' => NULL,
          'country' => NULL,
        );



}

?>