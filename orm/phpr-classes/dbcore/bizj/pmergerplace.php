<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PMergerplace
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PMergerplace extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'p_mergerplace';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'company_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'company_id',
        );

    public $company_id = NULL;
    public $company_name = NULL;
    public $city = NULL;
    public $state = NULL;
    public $country = NULL;
    public $location = NULL;
    public $market = NULL;
    public $price = NULL;
    public $url = NULL;
    public $DBColumnsArray = 
        array (
          'company_id' => 
          array (
            0 => 1,
          ),
          'company_name' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'country' => 
          array (
          ),
          'location' => 
          array (
          ),
          'market' => 
          array (
          ),
          'price' => 
          array (
          ),
          'url' => 
          array (
          ),
        );




}

?>