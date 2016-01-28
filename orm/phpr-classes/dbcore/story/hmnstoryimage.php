<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in HmnStoryImage
  */
namespace DBCore\Story;

use phpr\Database\Model;

class HmnStoryImage extends Model {

    const SCHEMA = 'story';
    const TABLE = 'hmn_story_image';
    const AUTO_INCREMENT_COLUMN = 'image_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'image_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'image_id',
          1 => 'c_time',
          2 => 'story_id',
          3 => 'major_rev',
          4 => 'rev_time',
          5 => 'width',
          6 => 'height',
        );

    public $image_id = NULL;
    public $c_time = NULL;
    public $story_id = NULL;
    public $major_rev = NULL;
    public $rev_time = NULL;
    public $caption = NULL;
    public $media_producer = NULL;
    public $image_data = NULL;
    public $width = NULL;
    public $height = NULL;
    public $size_hint = NULL;
    public $display_order = NULL;
    public $DBColumnsArray = 
        array (
          'image_id' => 
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
          'major_rev' => 
          array (
          ),
          'rev_time' => 
          array (
          ),
          'caption' => 
          array (
          ),
          'media_producer' => 
          array (
          ),
          'image_data' => 
          array (
          ),
          'width' => 
          array (
          ),
          'height' => 
          array (
          ),
          'size_hint' => 
          array (
          ),
          'display_order' => 
          array (
          ),
        );




}

?>