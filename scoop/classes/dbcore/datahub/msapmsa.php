<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class MsaPmsa
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/16
 * @property mixed $sa_code
 * @property mixed $sa_name
 * @property mixed $sa_state
 * @property mixed $is_combined
 * @property mixed $parent_sa
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\MsaPmsa
 */
class MsaPmsa extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'msa_pmsa';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'sa_code',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'sa_code',
          1 => 'sa_name',
          2 => 'is_combined',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'sa_code' => 
          array (
            0 => 1,
          ),
          'sa_name' => 
          array (
          ),
          'sa_state' => 
          array (
          ),
          'is_combined' => 
          array (
          ),
          'parent_sa' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'sa_code' => '',
          'sa_name' => NULL,
          'sa_state' => NULL,
          'is_combined' => '0',
          'parent_sa' => NULL,
        );

}

?>