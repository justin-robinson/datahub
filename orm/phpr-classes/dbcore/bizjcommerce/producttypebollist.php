<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ProductTypeBollist
  */
namespace DBCore\Bizjcommerce;

use phpr\Database\Model;

class ProductTypeBollist extends Model {

    const SCHEMA = 'bizjcommerce';
    const TABLE = 'product_type_bollist';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'product_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'product_id',
          1 => 'year',
          2 => 'publication_date',
          3 => 'classification_id',
        );

    public $product_id = NULL;
    public $old_list_id = NULL;
    public $year = NULL;
    public $publication_date = NULL;
    public $classification_id = NULL;
    public $list_count = NULL;
    public $list_rank_criteria_pri = NULL;
    public $list_rank_criteria_sec = NULL;
    public $DBColumnsArray = 
        array (
          'product_id' => 
          array (
            0 => 1,
          ),
          'old_list_id' => 
          array (
          ),
          'year' => 
          array (
          ),
          'publication_date' => 
          array (
          ),
          'classification_id' => 
          array (
          ),
          'list_count' => 
          array (
          ),
          'list_rank_criteria_pri' => 
          array (
          ),
          'list_rank_criteria_sec' => 
          array (
          ),
        );




}

?>