<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EvImage
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EvImage extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ev_image';
    const AUTO_INCREMENT_COLUMN = 'image_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'image_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'image_id',
          1 => 'c_time',
          2 => 'event_id',
          3 => 'major_rev',
          4 => 'rev_time',
          5 => 'width',
          6 => 'height',
          7 => 'type',
        );

    public $image_id = NULL;
    public $c_time = NULL;
    public $event_id = NULL;
    public $pos_label = NULL;
    public $major_rev = NULL;
    public $rev_time = NULL;
    public $caption = NULL;
    public $media_producer = NULL;
    public $image_data = NULL;
    public $width = NULL;
    public $height = NULL;
    public $destination_href = NULL;
    public $display_order = NULL;
    public $type = NULL;
    public $sponsor_level = NULL;
    public $deleted_at = NULL;
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
          'event_id' => 
          array (
          ),
          'pos_label' => 
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
          'destination_href' => 
          array (
          ),
          'display_order' => 
          array (
          ),
          'type' => 
          array (
          ),
          'sponsor_level' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
        );




}

?>