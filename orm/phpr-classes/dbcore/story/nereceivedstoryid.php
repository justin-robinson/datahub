<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NeReceivedStoryId
  */
namespace DBCore\Story;

use phpr\Database\Model;

class NeReceivedStoryId extends Model {

    const SCHEMA = 'story';
    const TABLE = 'ne_received_story_id';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'ne_id',
        );

    public $story_id = NULL;
    public $ne_id = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
          ),
          'ne_id' => 
          array (
          ),
        );




}

?>