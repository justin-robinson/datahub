<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Metadata
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/11
 * @property mixed $meta_id
 * @property mixed $object_type
 * @property mixed $object_id
 * @property mixed $meta_name
 * @property mixed $meta_value
 * @property mixed $created_at
 * @property mixed $updated_at
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Metadata
 */
class Metadata extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'metadata';
    const AUTO_INCREMENT_COLUMN = 'meta_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'meta_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'meta_id',
          1 => 'object_type',
          2 => 'object_id',
          3 => 'meta_name',
          4 => 'meta_value',
          5 => 'created_at',
          6 => 'updated_at',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'meta_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'object_type' => 
          array (
          ),
          'object_id' => 
          array (
          ),
          'meta_name' => 
          array (
          ),
          'meta_value' => 
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
          'meta_id' => NULL,
          'object_type' => NULL,
          'object_id' => NULL,
          'meta_name' => NULL,
          'meta_value' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
        );



}

?>