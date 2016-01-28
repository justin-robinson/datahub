<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SyndapiFeed
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SyndapiFeed extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'syndapi_feed';
    const AUTO_INCREMENT_COLUMN = 'feed_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'feed_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'feed_id',
          1 => 'partner_id',
          2 => 'feed_name',
          3 => 'active',
          4 => 'feed_type_id',
          5 => 'allow_dupes',
          6 => 'allow_images',
          7 => 'quota_interval_limit',
          8 => 'feed_format',
          9 => 'created_at',
          10 => 'updated_at',
        );

    public $feed_id = NULL;
    public $partner_id = NULL;
    public $feed_name = NULL;
    public $feed_title = NULL;
    public $feed_image = NULL;
    public $active = NULL;
    public $feed_type_id = NULL;
    public $allow_dupes = NULL;
    public $allow_images = NULL;
    public $content_footer = NULL;
    public $quota_interval_limit = NULL;
    public $feed_format = NULL;
    public $analytics_tag = NULL;
    public $solr_limit = NULL;
    public $url_suffix = NULL;
    public $last_accessed_at = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'feed_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'partner_id' => 
          array (
          ),
          'feed_name' => 
          array (
          ),
          'feed_title' => 
          array (
          ),
          'feed_image' => 
          array (
          ),
          'active' => 
          array (
          ),
          'feed_type_id' => 
          array (
          ),
          'allow_dupes' => 
          array (
          ),
          'allow_images' => 
          array (
          ),
          'content_footer' => 
          array (
          ),
          'quota_interval_limit' => 
          array (
          ),
          'feed_format' => 
          array (
          ),
          'analytics_tag' => 
          array (
          ),
          'solr_limit' => 
          array (
          ),
          'url_suffix' => 
          array (
          ),
          'last_accessed_at' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>