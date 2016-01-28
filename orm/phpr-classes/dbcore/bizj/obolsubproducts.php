<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OBolsubProducts
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OBolsubProducts extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'o_bolsub_products';
    const AUTO_INCREMENT_COLUMN = 'product_uid';
    const PRIMARY_KEYS = 
        array (
          0 => 'product_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'product_uid',
        );

    public $product_uid = NULL;
    public $active = NULL;
    public $market = NULL;
    public $year = NULL;
    public $description = NULL;
    public $price = NULL;
    public $sku = NULL;
    public $is_shippable = NULL;
    public $c_time = NULL;
    public $city = NULL;
    public $is_taxable = NULL;
    public $release_date = NULL;
    public $is_stocked = NULL;
    public $pub_month = NULL;
    public $pub_year = NULL;
    public $product_version = NULL;
    public $DBColumnsArray = 
        array (
          'product_uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'active' => 
          array (
          ),
          'market' => 
          array (
          ),
          'year' => 
          array (
          ),
          'description' => 
          array (
          ),
          'price' => 
          array (
          ),
          'sku' => 
          array (
          ),
          'is_shippable' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'city' => 
          array (
          ),
          'is_taxable' => 
          array (
          ),
          'release_date' => 
          array (
          ),
          'is_stocked' => 
          array (
          ),
          'pub_month' => 
          array (
          ),
          'pub_year' => 
          array (
          ),
          'product_version' => 
          array (
          ),
        );




}

?>