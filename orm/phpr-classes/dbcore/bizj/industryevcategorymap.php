<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in IndustryEvCategoryMap
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class IndustryEvCategoryMap extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'industry_ev_category_map';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'industry_id',
          1 => 'category_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'industry_id',
          1 => 'category_id',
        );

    public $industry_id = NULL;
    public $category_id = NULL;
    public $DBColumnsArray = 
        array (
          'industry_id' => 
          array (
            0 => 1,
          ),
          'category_id' => 
          array (
            0 => 1,
          ),
        );




}

?>