<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FeedEntries
  */
namespace DBCore\OldNascarSite;

use phpr\Database\Model;

class FeedEntries extends Model {

    const SCHEMA = 'old_nascar_site';
    const TABLE = 'feed_entries';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $title = NULL;
    public $url = NULL;
    public $published_at = NULL;
    public $guid = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'title' => 
          array (
          ),
          'url' => 
          array (
          ),
          'published_at' => 
          array (
          ),
          'guid' => 
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