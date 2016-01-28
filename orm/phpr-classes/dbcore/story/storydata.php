<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in StoryData
  */
namespace DBCore\Story;

use phpr\Database\Model;

class StoryData extends Model {

    const SCHEMA = 'story';
    const TABLE = 'story_data';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'story_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'm_time',
        );

    public $story_id = NULL;
    public $column_name = NULL;
    public $byline = NULL;
    public $bylineinfo = NULL;
    public $copyright = NULL;
    public $original_byline = NULL;
    public $headline = NULL;
    public $subhead = NULL;
    public $executive_summary = NULL;
    public $teaser = NULL;
    public $story = NULL;
    public $m_time = NULL;
    public $creditline = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
            0 => 1,
          ),
          'column_name' => 
          array (
          ),
          'byline' => 
          array (
          ),
          'bylineinfo' => 
          array (
          ),
          'copyright' => 
          array (
          ),
          'original_byline' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'subhead' => 
          array (
          ),
          'executive_summary' => 
          array (
          ),
          'teaser' => 
          array (
          ),
          'story' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'creditline' => 
          array (
          ),
        );




}

?>