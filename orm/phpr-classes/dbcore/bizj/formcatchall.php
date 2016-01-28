<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FormCatchall
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class FormCatchall extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'form_catchall';
    const AUTO_INCREMENT_COLUMN = 'form_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'form_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'form_id',
          1 => 'market',
          2 => 'c_time',
        );

    public $form_id = NULL;
    public $first_name = NULL;
    public $last_name = NULL;
    public $title = NULL;
    public $company = NULL;
    public $email = NULL;
    public $phone = NULL;
    public $subscriber = NULL;
    public $market = NULL;
    public $comment_type = NULL;
    public $c_time = NULL;
    public $comment = NULL;
    public $remote_ip = NULL;
    public $journal = NULL;
    public $user_agent = NULL;
    public $address_1 = NULL;
    public $address_2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip = NULL;
    public $DBColumnsArray = 
        array (
          'form_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'first_name' => 
          array (
          ),
          'last_name' => 
          array (
          ),
          'title' => 
          array (
          ),
          'company' => 
          array (
          ),
          'email' => 
          array (
          ),
          'phone' => 
          array (
          ),
          'subscriber' => 
          array (
          ),
          'market' => 
          array (
          ),
          'comment_type' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'comment' => 
          array (
          ),
          'remote_ip' => 
          array (
          ),
          'journal' => 
          array (
          ),
          'user_agent' => 
          array (
          ),
          'address_1' => 
          array (
          ),
          'address_2' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'zip' => 
          array (
          ),
        );




}

?>