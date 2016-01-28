<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in MerchantInvoiceContents
  */
namespace DBCore\Bizjmerchant;

use phpr\Database\Model;

class MerchantInvoiceContents extends Model {

    const SCHEMA = 'bizjmerchant';
    const TABLE = 'merchant_invoice_contents';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'merchant_invoice_id',
          2 => 'content',
          3 => 'attributes',
        );

    public $id = NULL;
    public $merchant_invoice_id = NULL;
    public $content = NULL;
    public $attributes = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'merchant_invoice_id' => 
          array (
          ),
          'content' => 
          array (
          ),
          'attributes' => 
          array (
          ),
        );




}

?>