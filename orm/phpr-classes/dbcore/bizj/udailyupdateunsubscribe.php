<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UDailyUpdateUnsubscribe
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UDailyUpdateUnsubscribe extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_daily_update_unsubscribe';
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
    public $market = NULL;
    public $opt_out_time = NULL;
    public $opt_in_time = NULL;
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
          'market' => 
          array (
          ),
          'opt_out_time' => 
          array (
          ),
          'opt_in_time' => 
          array (
          ),
        );




}

?>