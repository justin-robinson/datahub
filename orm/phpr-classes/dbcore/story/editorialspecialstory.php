<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EditorialSpecialStory
  */
namespace DBCore\Story;

use phpr\Database\Model;

class EditorialSpecialStory extends Model {

    const SCHEMA = 'story';
    const TABLE = 'editorial_special_story';
    const AUTO_INCREMENT_COLUMN = 'story_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'story_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'story_html',
          2 => 'm_time',
        );

    public $story_id = NULL;
    public $story_html = NULL;
    public $story_email = NULL;
    public $headline = NULL;
    public $byline = NULL;
    public $bylineinfo = NULL;
    public $subhead = NULL;
    public $story_date = NULL;
    public $column_name = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $html_header = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'story_html' => 
          array (
          ),
          'story_email' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'byline' => 
          array (
          ),
          'bylineinfo' => 
          array (
          ),
          'subhead' => 
          array (
          ),
          'story_date' => 
          array (
          ),
          'column_name' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'html_header' => 
          array (
          ),
        );




}

?>