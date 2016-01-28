<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ProductCategory
  */
namespace DBCore\Nascarillustrated;

use phpr\Database\Model;

class ProductCategory extends Model {

    const SCHEMA = 'nascarillustrated';
    const TABLE = 'product_category';
    const AUTO_INCREMENT_COLUMN = 'category_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'category_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'category_id',
          1 => 'ord',
          2 => 'is_active',
          3 => 'is_hidden',
          4 => 'can_group_by_year',
        );

    public $category_id = NULL;
    public $category_name = NULL;
    public $slug = NULL;
    public $ord = NULL;
    public $is_active = NULL;
    public $is_hidden = NULL;
    public $can_group_by_year = NULL;
    public $group_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'category_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'category_name' => 
          array (
          ),
          'slug' => 
          array (
          ),
          'ord' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'is_hidden' => 
          array (
          ),
          'can_group_by_year' => 
          array (
          ),
          'group_id' => 
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