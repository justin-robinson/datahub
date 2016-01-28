<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AdContact
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AdContact extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ad_contact';
    const AUTO_INCREMENT_COLUMN = 'contact_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'contact_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'contact_id',
          1 => 'm_time',
        );

    public $contact_id = NULL;
    public $name = NULL;
    public $address = NULL;
    public $phone = NULL;
    public $email = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $contact_type = NULL;
    public $market = NULL;
    public $DBColumnsArray = 
        array (
          'contact_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'name' => 
          array (
          ),
          'address' => 
          array (
          ),
          'phone' => 
          array (
          ),
          'email' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'contact_type' => 
          array (
          ),
          'market' => 
          array (
          ),
        );




}

?>