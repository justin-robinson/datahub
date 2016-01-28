<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PollResults
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PollResults extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'poll_results';
    const AUTO_INCREMENT_COLUMN = 'result_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'result_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'result_id',
          1 => 'c_time',
        );

    public $result_id = NULL;
    public $poll_id = NULL;
    public $poll_question_id = NULL;
    public $result_data = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $DBColumnsArray = 
        array (
          'result_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'poll_id' => 
          array (
          ),
          'poll_question_id' => 
          array (
          ),
          'result_data' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
        );




}

?>