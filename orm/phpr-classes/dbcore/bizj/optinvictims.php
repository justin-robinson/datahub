<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OptinVictims
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OptinVictims extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'optin_victims';
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
    public $email = NULL;
    public $opt1 = NULL;
    public $opt2 = NULL;
    public $partner = NULL;
    public $c_time = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'email' => 
          array (
          ),
          'opt1' => 
          array (
          ),
          'opt2' => 
          array (
          ),
          'partner' => 
          array (
          ),
          'c_time' => 
          array (
          ),
        );




}

?>