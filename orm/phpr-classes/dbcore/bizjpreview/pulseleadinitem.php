<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PulseLeadinItem
  */
namespace DBCore\BizjPreview;

use phpr\Database\Model;

class PulseLeadinItem extends Model {

    const SCHEMA = 'bizj_preview';
    const TABLE = 'pulse_leadin_item';
    const AUTO_INCREMENT_COLUMN = 'item_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'item_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'item_id',
          1 => 'group_id',
          2 => 'ord',
          3 => 'url',
          4 => 'headline',
          5 => 'created_at',
          6 => 'updated_at',
        );

    public $item_id = NULL;
    public $group_id = NULL;
    public $ord = NULL;
    public $item_page_id = NULL;
    public $url = NULL;
    public $headline = NULL;
    public $teaser = NULL;
    public $item_media_id = NULL;
    public $item_media_url = NULL;
    public $media_caption = NULL;
    public $media_alt_text = NULL;
    public $thumb_media_id = NULL;
    public $kicker = NULL;
    public $item_video_id = NULL;
    public $item_pulse_id = NULL;
    public $additional_data = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $DBColumnsArray = 
        array (
          'item_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'group_id' => 
          array (
          ),
          'ord' => 
          array (
          ),
          'item_page_id' => 
          array (
          ),
          'url' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'teaser' => 
          array (
          ),
          'item_media_id' => 
          array (
          ),
          'item_media_url' => 
          array (
          ),
          'media_caption' => 
          array (
          ),
          'media_alt_text' => 
          array (
          ),
          'thumb_media_id' => 
          array (
          ),
          'kicker' => 
          array (
          ),
          'item_video_id' => 
          array (
          ),
          'item_pulse_id' => 
          array (
          ),
          'additional_data' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
        );




}

?>