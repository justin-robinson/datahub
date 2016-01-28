<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CircOptinFeed
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class CircOptinFeed extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'circ_optin_feed';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $user_id = NULL;
    public $subid = NULL;
    public $pubid = NULL;
    public $firstname = NULL;
    public $lastname = NULL;
    public $email = NULL;
    public $zip = NULL;
    public $daily_update = NULL;
    public $edition = NULL;
    public $sent_time = NULL;
    public $c_time = NULL;
    public $converted_time = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'subid' => 
          array (
          ),
          'pubid' => 
          array (
          ),
          'firstname' => 
          array (
          ),
          'lastname' => 
          array (
          ),
          'email' => 
          array (
          ),
          'zip' => 
          array (
          ),
          'daily_update' => 
          array (
          ),
          'edition' => 
          array (
          ),
          'sent_time' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'converted_time' => 
          array (
          ),
        );




}

?>