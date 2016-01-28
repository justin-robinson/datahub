<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in LexisNexisFeed
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class LexisNexisFeed extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'lexis_nexis_feed';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'rev_time',
        );

    public $id = NULL;
    public $c_time = NULL;
    public $story_id = NULL;
    public $digest = NULL;
    public $headline = NULL;
    public $display_date = NULL;
    public $market = NULL;
    public $is_dupe = NULL;
    public $release_status = NULL;
    public $major_rev = NULL;
    public $minor_rev = NULL;
    public $rev_time = NULL;
    public $story_type = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'c_time' => 
          array (
          ),
          'story_id' => 
          array (
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
          'market' => 
          array (
          ),
          'is_dupe' => 
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
          'rev_time' => 
          array (
          ),
          'story_type' => 
          array (
          ),
        );




}

?>