<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Products
  */
namespace DBCore\Bolapi;

use phpr\Database\Model;

class Products extends Model {

    const SCHEMA = 'bolapi';
    const TABLE = 'products';
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
    public $pub_uid = NULL;
    public $year = NULL;
    public $title = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $is_created = NULL;
    public $areacode = NULL;
    public $has_proofing_data = NULL;
    public $is_proofed = NULL;
    public $has_data_files = NULL;
    public $has_pdf_files = NULL;
    public $is_geocoded = NULL;
    public $is_pocketsquare = NULL;
    public $DBColumnsArray = 
        array (
          'product_uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'pub_uid' => 
          array (
          ),
          'year' => 
          array (
          ),
          'title' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
          'is_created' => 
          array (
          ),
          'areacode' => 
          array (
          ),
          'has_proofing_data' => 
          array (
          ),
          'is_proofed' => 
          array (
          ),
          'has_data_files' => 
          array (
          ),
          'has_pdf_files' => 
          array (
          ),
          'is_geocoded' => 
          array (
          ),
          'is_pocketsquare' => 
          array (
          ),
        );




}

?>