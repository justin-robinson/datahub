<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PurchaseItem
  */
namespace DBCore\Nascarillustrated;

use phpr\Database\Model;

class PurchaseItem extends Model {

    const SCHEMA = 'nascarillustrated';
    const TABLE = 'purchase_item';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'purchase_id',
          1 => 'product_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'purchase_id',
          1 => 'product_id',
          2 => 'product_name',
          3 => 'is_subscription',
          4 => 'quantity',
          5 => 'unit_price',
          6 => 'unit_shipping',
        );

    public $purchase_id = NULL;
    public $product_id = NULL;
    public $product_name = NULL;
    public $is_subscription = NULL;
    public $key_code = NULL;
    public $quantity = NULL;
    public $unit_price = NULL;
    public $unit_shipping = NULL;
    public $item_metadata = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'purchase_id' => 
          array (
            0 => 1,
          ),
          'product_id' => 
          array (
            0 => 1,
          ),
          'product_name' => 
          array (
          ),
          'is_subscription' => 
          array (
          ),
          'key_code' => 
          array (
          ),
          'quantity' => 
          array (
          ),
          'unit_price' => 
          array (
          ),
          'unit_shipping' => 
          array (
          ),
          'item_metadata' => 
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