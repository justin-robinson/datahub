<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in KrangSpecialCategory
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class KrangSpecialCategory extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'krang_special_category';
    const AUTO_INCREMENT_COLUMN = 'special_cat_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'special_cat_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'special_cat_id',
          1 => 'category_name',
          2 => 'content_label',
          3 => 'market_code',
          4 => 'is_active',
        );

    public $special_cat_id = NULL;
    public $category_name = NULL;
    public $section_name = NULL;
    public $section_url = NULL;
    public $sponsor_name = NULL;
    public $content_label = NULL;
    public $market_code = NULL;
    public $krang_page_type = NULL;
    public $krang_category = NULL;
    public $is_active = NULL;
    public $skin = NULL;
    public $extraheader = NULL;
    public $adtag_spf = NULL;
    public $blog_extraheader = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $modified_by = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $DBColumnsArray = 
        array (
          'special_cat_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'category_name' => 
          array (
          ),
          'section_name' => 
          array (
          ),
          'section_url' => 
          array (
          ),
          'sponsor_name' => 
          array (
          ),
          'content_label' => 
          array (
          ),
          'market_code' => 
          array (
          ),
          'krang_page_type' => 
          array (
          ),
          'krang_category' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'skin' => 
          array (
          ),
          'extraheader' => 
          array (
          ),
          'adtag_spf' => 
          array (
          ),
          'blog_extraheader' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
          'modified_by' => 
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