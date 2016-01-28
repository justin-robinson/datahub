<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SfGuardUser
  */
namespace DBCore\BizjmerchantTest;

use phpr\Database\Model;

class SfGuardUser extends Model {

    const SCHEMA = 'bizjmerchant_test';
    const TABLE = 'sf_guard_user';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'username',
          2 => 'algorithm',
          3 => 'created_at',
          4 => 'updated_at',
        );

    public $id = NULL;
    public $username = NULL;
    public $algorithm = NULL;
    public $salt = NULL;
    public $password = NULL;
    public $is_active = NULL;
    public $is_super_admin = NULL;
    public $last_login = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'username' => 
          array (
          ),
          'algorithm' => 
          array (
          ),
          'salt' => 
          array (
          ),
          'password' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'is_super_admin' => 
          array (
          ),
          'last_login' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>