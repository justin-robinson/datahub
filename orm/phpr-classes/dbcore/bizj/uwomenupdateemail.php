<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UWomenUpdateEmail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UWomenUpdateEmail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_women_update_email';
    const AUTO_INCREMENT_COLUMN = 'entry_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'entry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'entry_id',
        );

    public $entry_id = NULL;
    public $user_id = NULL;
    public $c_time = NULL;
    public $market = NULL;
    public $source_id = NULL;
    public $needs_initial_email = NULL;
    public $DBColumnsArray = 
        array (
          'entry_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'market' => 
          array (
          ),
          'source_id' => 
          array (
          ),
          'needs_initial_email' => 
          array (
          ),
        );




}

?>