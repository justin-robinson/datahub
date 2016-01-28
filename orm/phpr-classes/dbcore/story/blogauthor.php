<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BlogAuthor
  */
namespace DBCore\Story;

use phpr\Database\Model;

class BlogAuthor extends Model {

    const SCHEMA = 'story';
    const TABLE = 'blog_author';
    const AUTO_INCREMENT_COLUMN = 'author_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'author_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'author_id',
          1 => 'active',
        );

    public $author_id = NULL;
    public $author_email = NULL;
    public $market = NULL;
    public $byline = NULL;
    public $bylineinfo = NULL;
    public $image_url = NULL;
    public $community_url = NULL;
    public $active = NULL;
    public $default_tagline = NULL;
    public $DBColumnsArray = 
        array (
          'author_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'author_email' => 
          array (
          ),
          'market' => 
          array (
          ),
          'byline' => 
          array (
          ),
          'bylineinfo' => 
          array (
          ),
          'image_url' => 
          array (
          ),
          'community_url' => 
          array (
          ),
          'active' => 
          array (
          ),
          'default_tagline' => 
          array (
          ),
        );




}

?>