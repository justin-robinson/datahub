<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UPasswordReset
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UPasswordReset extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_password_reset';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'user_id',
        );

    public $user_id = NULL;
    public $r_timestamp = NULL;
    public $remote_ip = NULL;
    public $c_time = NULL;
    public $DBColumnsArray = 
        array (
          'user_id' => 
          array (
          ),
          'r_timestamp' => 
          array (
          ),
          'remote_ip' => 
          array (
          ),
          'c_time' => 
          array (
          ),
        );




}

?>