<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ListProducts
  */
namespace DBCore\Bolapi;

use phpr\Database\Model;

class ListProducts extends Model {

    const SCHEMA = 'bolapi';
    const TABLE = 'list_products';
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
    public $pub_uid = NULL;
    public $year_id = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'pub_uid' => 
          array (
          ),
          'year_id' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
        );




}

?>