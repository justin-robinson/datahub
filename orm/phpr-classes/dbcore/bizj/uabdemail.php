<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UAbdEmail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UAbdEmail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_abd_email';
    const AUTO_INCREMENT_COLUMN = 'entry_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'entry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'entry_id',
        );

    public $entry_id = NULL;
    public $user_id = NULL;
    public $c_time = NULL;
    public $source_id = NULL;
    public $cobrand = NULL;
    public $DBColumnsArray = 
        array (
          'entry_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'source_id' => 
          array (
          ),
          'cobrand' => 
          array (
          ),
        );




}

?>