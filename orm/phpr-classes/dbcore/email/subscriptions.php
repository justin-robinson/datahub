<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Subscriptions
  */
namespace DBCore\Email;

use phpr\Database\Model;

class Subscriptions extends Model {

    const SCHEMA = 'email';
    const TABLE = 'subscriptions';
    const AUTO_INCREMENT_COLUMN = 'subscription_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'subscription_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'subscription_id',
          1 => 'product_id',
          2 => 'user_id',
          3 => 'is_active',
        );

    public $subscription_id = NULL;
    public $product_id = NULL;
    public $user_id = NULL;
    public $is_active = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'subscription_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'product_id' => 
          array (
          ),
          'user_id' => 
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