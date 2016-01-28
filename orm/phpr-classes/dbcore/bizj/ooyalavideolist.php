<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OoyalaVideoList
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OoyalaVideoList extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ooyala_video_list';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'market_code',
          1 => 'embed_code',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'market_code',
          1 => 'embed_code',
          2 => 'title',
          3 => 'description',
          4 => 'status',
          5 => 'created_at',
          6 => 'updated_at',
        );

    public $market_code = NULL;
    public $embed_code = NULL;
    public $title = NULL;
    public $description = NULL;
    public $preview_image_url = NULL;
    public $status = NULL;
    public $metadata = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $db_created_at = NULL;
    public $db_updated_at = NULL;
    public $db_deleted_at = NULL;
    public $DBColumnsArray = 
        array (
          'market_code' => 
          array (
            0 => 1,
          ),
          'embed_code' => 
          array (
            0 => 1,
          ),
          'title' => 
          array (
          ),
          'description' => 
          array (
          ),
          'preview_image_url' => 
          array (
          ),
          'status' => 
          array (
          ),
          'metadata' => 
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
          'db_created_at' => 
          array (
          ),
          'db_updated_at' => 
          array (
          ),
          'db_deleted_at' => 
          array (
          ),
        );




}

?>