<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class UsState
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/11
 * @property mixed $state_long
 * @property mixed $state_postal
 * @property mixed $state_ap_style
 * @property mixed $is_active
 * @property mixed $ord
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\UsState
 */
class UsState extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'us_state';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'state_postal',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'state_postal',
          1 => 'is_active',
          2 => 'ord',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'state_long' => 
          array (
          ),
          'state_postal' => 
          array (
            0 => 1,
          ),
          'state_ap_style' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'ord' => 
          array (
          ),
        );


    protected $dBValuesArray = 
        array (
          'state_long' => NULL,
          'state_postal' => NULL,
          'state_ap_style' => NULL,
          'is_active' => NULL,
          'ord' => NULL,
        );



}

?>