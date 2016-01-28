<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in LogEntries
  */
namespace DBCore\BizjmerchantTest;

use phpr\Database\Model;

class LogEntries extends Model {

    const SCHEMA = 'bizjmerchant_test';
    const TABLE = 'log_entries';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'host',
          2 => 'context',
          3 => 'entry',
          4 => 'created_at',
        );

    public $id = NULL;
    public $host = NULL;
    public $context = NULL;
    public $level = NULL;
    public $code = NULL;
    public $entry = NULL;
    public $created_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'host' => 
          array (
          ),
          'context' => 
          array (
          ),
          'level' => 
          array (
          ),
          'code' => 
          array (
          ),
          'entry' => 
          array (
          ),
          'created_at' => 
          array (
          ),
        );




}

?>