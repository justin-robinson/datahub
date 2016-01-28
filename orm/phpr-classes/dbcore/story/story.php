<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Story
  */
namespace DBCore\Story;

use phpr\Database\Model;

class Story extends Model {

    const SCHEMA = 'story';
    const TABLE = 'story';
    const AUTO_INCREMENT_COLUMN = 'story_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'story_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'story_date',
          2 => 'market',
          3 => 'filename',
          4 => 'edition',
          5 => 'c_time',
          6 => 'm_time',
          7 => 'pub_date',
          8 => 'story_time',
          9 => 'is_premium',
        );

    public $story_id = NULL;
    public $story_date = NULL;
    public $datecreated = NULL;
    public $market = NULL;
    public $filename = NULL;
    public $edition = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $pub_date = NULL;
    public $story_time = NULL;
    public $publish = NULL;
    public $is_premium = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'story_date' => 
          array (
          ),
          'datecreated' => 
          array (
          ),
          'market' => 
          array (
          ),
          'filename' => 
          array (
          ),
          'edition' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'pub_date' => 
          array (
          ),
          'story_time' => 
          array (
          ),
          'publish' => 
          array (
          ),
          'is_premium' => 
          array (
          ),
        );




}

?>