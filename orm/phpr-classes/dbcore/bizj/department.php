<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Department
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class Department extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'department';
    const AUTO_INCREMENT_COLUMN = 'dept_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'dept_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'dept_id',
          1 => 'dept_name',
        );

    public $dept_id = NULL;
    public $dept_name = NULL;
    public $DBColumnsArray = 
        array (
          'dept_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'dept_name' => 
          array (
          ),
        );




}

?>