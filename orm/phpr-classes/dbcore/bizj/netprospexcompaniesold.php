<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NetprospexCompaniesOld
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NetprospexCompaniesOld extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'netprospex_companies_old';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
          1 => 'brand',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'brand',
          2 => 'count',
        );

    public $id = NULL;
    public $brand = NULL;
    public $market = NULL;
    public $count = NULL;
    public $name = NULL;
    public $label = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'brand' => 
          array (
            0 => 1,
          ),
          'market' => 
          array (
          ),
          'count' => 
          array (
          ),
          'name' => 
          array (
          ),
          'label' => 
          array (
          ),
        );




}

?>