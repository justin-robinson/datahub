<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Products
  */
namespace DBCore\SceneDaily;

use phpr\Database\Model;

class Products extends Model {

    const SCHEMA = 'scene_daily';
    const TABLE = 'products';
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
    public $department_id = NULL;
    public $category_id = NULL;
    public $vendor_id = NULL;
    public $name = NULL;
    public $sku = NULL;
    public $quick_description = NULL;
    public $description = NULL;
    public $info = NULL;
    public $price = NULL;
    public $featured = NULL;
    public $email_feature = NULL;
    public $domestic_keycode = NULL;
    public $domestic_ratecode = NULL;
    public $domestic_charge = NULL;
    public $international_keycode = NULL;
    public $international_ratecode = NULL;
    public $international_charge = NULL;
    public $active = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $pubid = NULL;
    public $domestic_rate = NULL;
    public $international_rate = NULL;
    public $hidden = NULL;
    public $image_file_name = NULL;
    public $image_content_type = NULL;
    public $image_file_size = NULL;
    public $image_updated_at = NULL;
    public $deleted = NULL;
    public $us_only = NULL;
    public $canadian_mexican_keycode = NULL;
    public $canadian_mexican_rate = NULL;
    public $canadian_mexican_ratecode = NULL;
    public $canadian_mexican_charge = NULL;
    public $default_image_number = NULL;
    public $slug = NULL;
    public $page_title = NULL;
    public $meta_description = NULL;
    public $inventory = NULL;
    public $has_limited_inventory = NULL;
    public $body_class = NULL;
    public $published_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'department_id' => 
          array (
          ),
          'category_id' => 
          array (
          ),
          'vendor_id' => 
          array (
          ),
          'name' => 
          array (
          ),
          'sku' => 
          array (
          ),
          'quick_description' => 
          array (
          ),
          'description' => 
          array (
          ),
          'info' => 
          array (
          ),
          'price' => 
          array (
          ),
          'featured' => 
          array (
          ),
          'email_feature' => 
          array (
          ),
          'domestic_keycode' => 
          array (
          ),
          'domestic_ratecode' => 
          array (
          ),
          'domestic_charge' => 
          array (
          ),
          'international_keycode' => 
          array (
          ),
          'international_ratecode' => 
          array (
          ),
          'international_charge' => 
          array (
          ),
          'active' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'pubid' => 
          array (
          ),
          'domestic_rate' => 
          array (
          ),
          'international_rate' => 
          array (
          ),
          'hidden' => 
          array (
          ),
          'image_file_name' => 
          array (
          ),
          'image_content_type' => 
          array (
          ),
          'image_file_size' => 
          array (
          ),
          'image_updated_at' => 
          array (
          ),
          'deleted' => 
          array (
          ),
          'us_only' => 
          array (
          ),
          'canadian_mexican_keycode' => 
          array (
          ),
          'canadian_mexican_rate' => 
          array (
          ),
          'canadian_mexican_ratecode' => 
          array (
          ),
          'canadian_mexican_charge' => 
          array (
          ),
          'default_image_number' => 
          array (
          ),
          'slug' => 
          array (
          ),
          'page_title' => 
          array (
          ),
          'meta_description' => 
          array (
          ),
          'inventory' => 
          array (
          ),
          'has_limited_inventory' => 
          array (
          ),
          'body_class' => 
          array (
          ),
          'published_at' => 
          array (
          ),
        );




}

?>