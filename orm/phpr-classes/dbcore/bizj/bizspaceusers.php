<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BizspaceUsers
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class BizspaceUsers extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'bizspace_users';
    const AUTO_INCREMENT_COLUMN = 'user_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'user_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'user_id',
          1 => 'c_time',
        );

    public $user_id = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $username = NULL;
    public $email = NULL;
    public $password = NULL;
    public $is_national = NULL;
    public $broker_name = NULL;
    public $broker_url = NULL;
    public $DBColumnsArray = 
        array (
          'user_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'username' => 
          array (
          ),
          'email' => 
          array (
          ),
          'password' => 
          array (
          ),
          'is_national' => 
          array (
          ),
          'broker_name' => 
          array (
          ),
          'broker_url' => 
          array (
          ),
        );




}

?>