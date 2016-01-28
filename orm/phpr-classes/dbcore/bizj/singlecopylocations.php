<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SingleCopyLocations
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SingleCopyLocations extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'single_copy_locations';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'c_time',
        );

    public $id = NULL;
    public $market = NULL;
    public $location_name = NULL;
    public $address_1 = NULL;
    public $address_2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip = NULL;
    public $location_type = NULL;
    public $c_time = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market' => 
          array (
          ),
          'location_name' => 
          array (
          ),
          'address_1' => 
          array (
          ),
          'address_2' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'zip' => 
          array (
          ),
          'location_type' => 
          array (
          ),
          'c_time' => 
          array (
          ),
        );




}

?>