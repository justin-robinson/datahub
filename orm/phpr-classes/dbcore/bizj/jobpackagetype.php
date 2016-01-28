<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in JobPackageType
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class JobPackageType extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'job_package_type';
    const AUTO_INCREMENT_COLUMN = 'package_type_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'package_type_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'package_type_id',
          1 => 'package_name',
          2 => 'is_unpaid',
          3 => 'is_active',
          4 => 'created_at',
          5 => 'updated_at',
        );

    public $package_type_id = NULL;
    public $package_name = NULL;
    public $is_unpaid = NULL;
    public $is_active = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'package_type_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'package_name' => 
          array (
          ),
          'is_unpaid' => 
          array (
          ),
          'is_active' => 
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