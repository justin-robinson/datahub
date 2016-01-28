<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CreSearchWatch
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class CreSearchWatch extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'cre_search_watch';
    const AUTO_INCREMENT_COLUMN = 'search_watch_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'search_watch_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'search_watch_id',
        );

    public $search_watch_id = NULL;
    public $user_id = NULL;
    public $c_time = NULL;
    public $last_search_date = NULL;
    public $type = NULL;
    public $query = NULL;
    public $acbj_market = NULL;
    public $description = NULL;
    public $opt_out_time = NULL;
    public $active = NULL;
    public $DBColumnsArray = 
        array (
          'search_watch_id' => 
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
          'last_search_date' => 
          array (
          ),
          'type' => 
          array (
          ),
          'query' => 
          array (
          ),
          'acbj_market' => 
          array (
          ),
          'description' => 
          array (
          ),
          'opt_out_time' => 
          array (
          ),
          'active' => 
          array (
          ),
        );




}

?>