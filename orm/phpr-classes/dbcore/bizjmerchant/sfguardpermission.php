<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SfGuardPermission
  */
namespace DBCore\Bizjmerchant;

use phpr\Database\Model;

class SfGuardPermission extends Model {

    const SCHEMA = 'bizjmerchant';
    const TABLE = 'sf_guard_permission';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'created_at',
          2 => 'updated_at',
        );

    public $id = NULL;
    public $name = NULL;
    public $description = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'name' => 
          array (
          ),
          'description' => 
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