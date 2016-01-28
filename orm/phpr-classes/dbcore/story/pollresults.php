<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PollResults
  */
namespace DBCore\Story;

use phpr\Database\Model;

class PollResults extends Model {

    const SCHEMA = 'story';
    const TABLE = 'poll_results';
    const AUTO_INCREMENT_COLUMN = 'response_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'response_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'response_id',
          1 => 'm_time',
        );

    public $response_id = NULL;
    public $poll_id = NULL;
    public $ip_address = NULL;
    public $results = NULL;
    public $market = NULL;
    public $m_time = NULL;
    public $c_time = NULL;
    public $display = NULL;
    public $viewed = NULL;
    public $DBColumnsArray = 
        array (
          'response_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'poll_id' => 
          array (
          ),
          'ip_address' => 
          array (
          ),
          'results' => 
          array (
          ),
          'market' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'display' => 
          array (
          ),
          'viewed' => 
          array (
          ),
        );




}

?>