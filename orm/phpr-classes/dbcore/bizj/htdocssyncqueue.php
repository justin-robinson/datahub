<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in HtdocsSyncQueue
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class HtdocsSyncQueue extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'htdocs_sync_queue';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'path',
          1 => 'c_time',
          2 => 'id',
        );

    public $path = NULL;
    public $c_time = NULL;
    public $synced = NULL;
    public $last_synced = NULL;
    public $id = NULL;
    public $requested_from = NULL;
    public $DBColumnsArray = 
        array (
          'path' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'synced' => 
          array (
          ),
          'last_synced' => 
          array (
          ),
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'requested_from' => 
          array (
          ),
        );




}

?>