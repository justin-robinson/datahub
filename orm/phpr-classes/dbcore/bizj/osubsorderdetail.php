<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OSubsOrderDetail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OSubsOrderDetail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'o_subs_order_detail';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'subs_order_id',
        );

    public $subs_order_id = NULL;
    public $product_id = NULL;
    public $product_desc = NULL;
    public $subs_length = NULL;
    public $purchase_price = NULL;
    public $market = NULL;
    public $DBColumnsArray = 
        array (
          'subs_order_id' => 
          array (
          ),
          'product_id' => 
          array (
          ),
          'product_desc' => 
          array (
          ),
          'subs_length' => 
          array (
          ),
          'purchase_price' => 
          array (
          ),
          'market' => 
          array (
          ),
        );




}

?>