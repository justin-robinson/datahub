<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BounceLog
  */
namespace DBCore\Email;

use phpr\Database\Model;

class BounceLog extends Model {

    const SCHEMA = 'email';
    const TABLE = 'bounce_log';
    const AUTO_INCREMENT_COLUMN = 'log_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'log_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'log_id',
          1 => 'c_time',
        );

    public $log_id = NULL;
    public $job_id = NULL;
    public $user_id = NULL;
    public $email = NULL;
    public $site = NULL;
    public $domain = NULL;
    public $product_id = NULL;
    public $smtp_code = NULL;
    public $smtp_reason = NULL;
    public $bounce_type = NULL;
    public $date = NULL;
    public $c_time = NULL;
    public $user_updated = NULL;
    public $DBColumnsArray = 
        array (
          'log_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'job_id' => 
          array (
          ),
          'user_id' => 
          array (
          ),
          'email' => 
          array (
          ),
          'site' => 
          array (
          ),
          'domain' => 
          array (
          ),
          'product_id' => 
          array (
          ),
          'smtp_code' => 
          array (
          ),
          'smtp_reason' => 
          array (
          ),
          'bounce_type' => 
          array (
          ),
          'date' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'user_updated' => 
          array (
          ),
        );




}

?>