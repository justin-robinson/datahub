<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UVerticalSubtopicEmailOld
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UVerticalSubtopicEmailOld extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_vertical_subtopic_email_old';
    const AUTO_INCREMENT_COLUMN = 'entry_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'entry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'entry_id',
          1 => 'user_id',
          2 => 'vertical_subtopic_id',
          3 => 'c_time',
        );

    public $entry_id = NULL;
    public $user_id = NULL;
    public $vertical_subtopic_id = NULL;
    public $c_time = NULL;
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
          'vertical_subtopic_id' => 
          array (
          ),
          'c_time' => 
          array (
          ),
        );




}

?>