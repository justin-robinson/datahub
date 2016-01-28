<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PulseMedia
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PulseMedia extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'pulse_media';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'pulse_id',
          1 => 'question_id',
          2 => 'media_type',
          3 => 'option_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'pulse_id',
          1 => 'question_id',
          2 => 'media_type',
          3 => 'option_id',
          4 => 'media_host',
          5 => 'media_uri',
          6 => 'media_source',
          7 => 'orig_height',
          8 => 'orig_width',
          9 => 'created_at',
          10 => 'updated_at',
        );

    public $pulse_id = NULL;
    public $question_id = NULL;
    public $media_type = NULL;
    public $option_id = NULL;
    public $media_host = NULL;
    public $media_uri = NULL;
    public $crop_data = NULL;
    public $media_source = NULL;
    public $external_id = NULL;
    public $alt_text = NULL;
    public $art_credit = NULL;
    public $orig_height = NULL;
    public $orig_width = NULL;
    public $additional_data = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $DBColumnsArray = 
        array (
          'pulse_id' => 
          array (
            0 => 1,
          ),
          'question_id' => 
          array (
            0 => 1,
          ),
          'media_type' => 
          array (
            0 => 1,
          ),
          'option_id' => 
          array (
            0 => 1,
          ),
          'media_host' => 
          array (
          ),
          'media_uri' => 
          array (
          ),
          'crop_data' => 
          array (
          ),
          'media_source' => 
          array (
          ),
          'external_id' => 
          array (
          ),
          'alt_text' => 
          array (
          ),
          'art_credit' => 
          array (
          ),
          'orig_height' => 
          array (
          ),
          'orig_width' => 
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