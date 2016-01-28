<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BatchUpload
  */
namespace DBCore\Medialibrary;

use phpr\Database\Model;

class BatchUpload extends Model {

    const SCHEMA = 'medialibrary';
    const TABLE = 'batch_upload';
    const AUTO_INCREMENT_COLUMN = 'batch_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'batch_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'batch_id',
          1 => 'pub_id',
          2 => 'is_complete',
          3 => 'created_by',
          4 => 'created_at',
        );

    public $batch_id = NULL;
    public $pub_id = NULL;
    public $ip_address = NULL;
    public $user_agent = NULL;
    public $is_complete = NULL;
    public $created_by = NULL;
    public $created_at = NULL;
    public $DBColumnsArray = 
        array (
          'batch_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'pub_id' => 
          array (
          ),
          'ip_address' => 
          array (
          ),
          'user_agent' => 
          array (
          ),
          'is_complete' => 
          array (
          ),
          'created_by' => 
          array (
          ),
          'created_at' => 
          array (
          ),
        );




}

?>