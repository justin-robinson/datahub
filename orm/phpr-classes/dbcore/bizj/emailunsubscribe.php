<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EmailUnsubscribe
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EmailUnsubscribe extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'email_unsubscribe';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'email',
          1 => 'product_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'email',
          1 => 'product_id',
        );

    public $email = NULL;
    public $product_id = NULL;
    public $created_at = NULL;
    public $DBColumnsArray = 
        array (
          'email' => 
          array (
            0 => 1,
          ),
          'product_id' => 
          array (
            0 => 1,
          ),
          'created_at' => 
          array (
          ),
        );




}

?>