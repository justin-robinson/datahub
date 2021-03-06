<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Country
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/27
 * @property mixed $country_code
 * @property mixed $country
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Country
 */
class Country extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'country';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'country_code',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'country_code',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'country_code' => 
          array (
            0 => 1,
          ),
          'country' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'country_code' => '',
          'country' => NULL,
        );

}

?>
