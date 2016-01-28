<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ApiErrorLog
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class ApiErrorLog extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'api_error_log';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'created_at',
        );

    public $id = NULL;
    public $api_name = NULL;
    public $ip_address = NULL;
    public $url = NULL;
    public $object_id = NULL;
    public $error_code = NULL;
    public $error_message = NULL;
    public $error_data = NULL;
    public $request = NULL;
    public $created_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'api_name' => 
          array (
          ),
          'ip_address' => 
          array (
          ),
          'url' => 
          array (
          ),
          'object_id' => 
          array (
          ),
          'error_code' => 
          array (
          ),
          'error_message' => 
          array (
          ),
          'error_data' => 
          array (
          ),
          'request' => 
          array (
          ),
          'created_at' => 
          array (
          ),
        );




}

?>