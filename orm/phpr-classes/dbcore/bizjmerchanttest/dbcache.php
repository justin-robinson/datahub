<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in DbCache
  */
namespace DBCore\BizjmerchantTest;

use phpr\Database\Model;

class DbCache extends Model {

    const SCHEMA = 'bizjmerchant_test';
    const TABLE = 'db_cache';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'content',
          2 => 'expires_at',
        );

    public $id = NULL;
    public $content = NULL;
    public $expires_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'content' => 
          array (
          ),
          'expires_at' => 
          array (
          ),
        );




}

?>