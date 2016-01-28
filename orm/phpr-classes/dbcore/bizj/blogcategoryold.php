<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BlogCategoryOld
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class BlogCategoryOld extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'blog_category_old';
    const AUTO_INCREMENT_COLUMN = 'blog_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'blog_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'blog_id',
          1 => 'market',
          2 => 'krang_category',
          3 => 'active',
          4 => 'blog_name',
          5 => 'theport_id',
          6 => 'blog_author',
          7 => 'teasers_per_page',
          8 => 'locked',
          9 => 'hidden',
        );

    public $blog_id = NULL;
    public $market = NULL;
    public $krang_category = NULL;
    public $active = NULL;
    public $blog_name = NULL;
    public $header_image_url = NULL;
    public $promo_image_url = NULL;
    public $community_url = NULL;
    public $blog_description = NULL;
    public $default_tagline = NULL;
    public $theport_id = NULL;
    public $blog_industry = NULL;
    public $vertical_subtopic_id = NULL;
    public $blog_author = NULL;
    public $teasers_per_page = NULL;
    public $parent_blog_id = NULL;
    public $homepage_image_url = NULL;
    public $homepage_display_style = NULL;
    public $homepage_display_count = NULL;
    public $locked = NULL;
    public $newsletter = NULL;
    public $hidden = NULL;
    public $rss_url = NULL;
    public $DBColumnsArray = 
        array (
          'blog_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market' => 
          array (
          ),
          'krang_category' => 
          array (
          ),
          'active' => 
          array (
          ),
          'blog_name' => 
          array (
          ),
          'header_image_url' => 
          array (
          ),
          'promo_image_url' => 
          array (
          ),
          'community_url' => 
          array (
          ),
          'blog_description' => 
          array (
          ),
          'default_tagline' => 
          array (
          ),
          'theport_id' => 
          array (
          ),
          'blog_industry' => 
          array (
          ),
          'vertical_subtopic_id' => 
          array (
          ),
          'blog_author' => 
          array (
          ),
          'teasers_per_page' => 
          array (
          ),
          'parent_blog_id' => 
          array (
          ),
          'homepage_image_url' => 
          array (
          ),
          'homepage_display_style' => 
          array (
          ),
          'homepage_display_count' => 
          array (
          ),
          'locked' => 
          array (
          ),
          'newsletter' => 
          array (
          ),
          'hidden' => 
          array (
          ),
          'rss_url' => 
          array (
          ),
        );




}

?>