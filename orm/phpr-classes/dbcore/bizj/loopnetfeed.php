<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in LoopnetFeed
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class LoopnetFeed extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'loopnet_feed';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'story_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'c_time',
        );

    public $story_id = NULL;
    public $digest = NULL;
    public $headline = NULL;
    public $display_date = NULL;
    public $release_status = NULL;
    public $major_rev = NULL;
    public $minor_rev = NULL;
    public $c_time = NULL;
    public $approved = NULL;
    public $sent = NULL;
    public $rejected = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
            0 => 1,
          ),
          'digest' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'display_date' => 
          array (
          ),
          'release_status' => 
          array (
          ),
          'major_rev' => 
          array (
          ),
          'minor_rev' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'approved' => 
          array (
          ),
          'sent' => 
          array (
          ),
          'rejected' => 
          array (
          ),
        );




}

?>