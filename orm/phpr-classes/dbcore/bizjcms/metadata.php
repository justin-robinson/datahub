<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Metadata
  */
namespace DBCore\Bizjcms;

use phpr\Database\Model;

class Metadata extends Model {

    const SCHEMA = 'bizjcms';
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

    public $meta_id = NULL;
    public $object_type = NULL;
    public $object_id = NULL;
    public $meta_name = NULL;
    public $meta_value = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
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




}

?>