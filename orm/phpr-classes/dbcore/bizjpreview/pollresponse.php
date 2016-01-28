<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PollResponse
  */
namespace DBCore\BizjPreview;

use phpr\Database\Model;

class PollResponse extends Model {

    const SCHEMA = 'bizj_preview';
    const TABLE = 'poll_response';
    const AUTO_INCREMENT_COLUMN = 'response_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'response_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'response_id',
          1 => 'c_time',
        );

    public $response_id = NULL;
    public $poll_id = NULL;
    public $ip_address = NULL;
    public $c_time = NULL;
    public $display = NULL;
    public $viewed = NULL;
    public $comment = NULL;
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
          'c_time' => 
          array (
          ),
          'display' => 
          array (
          ),
          'viewed' => 
          array (
          ),
          'comment' => 
          array (
          ),
        );




}

?>