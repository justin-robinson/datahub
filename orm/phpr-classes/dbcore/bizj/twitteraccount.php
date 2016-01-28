<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in TwitterAccount
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class TwitterAccount extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'twitter_account';
    const AUTO_INCREMENT_COLUMN = 'account_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'account_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'account_id',
          1 => 'is_active',
          2 => 'created_at',
          3 => 'updated_at',
        );

    public $account_id = NULL;
    public $twitter_uid = NULL;
    public $twitter_url = NULL;
    public $is_active = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'account_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'twitter_uid' => 
          array (
          ),
          'twitter_url' => 
          array (
          ),
          'is_active' => 
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