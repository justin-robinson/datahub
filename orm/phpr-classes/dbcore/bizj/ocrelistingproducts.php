<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OCrelistingProducts
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OCrelistingProducts extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'o_crelisting_products';
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
    public $description = NULL;
    public $price = NULL;
    public $sku = NULL;
    public $is_shippable = NULL;
    public $is_taxable = NULL;
    public $c_time = NULL;
    public $is_stocked = NULL;
    public $market = NULL;
    public $site = NULL;
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
          'is_taxable' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'is_stocked' => 
          array (
          ),
          'market' => 
          array (
          ),
          'site' => 
          array (
          ),
        );




}

?>