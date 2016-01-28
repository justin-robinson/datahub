<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in MeroveusCompanies
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class MeroveusCompanies extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'meroveus_companies';
    const AUTO_INCREMENT_COLUMN = 'uid';
    const PRIMARY_KEYS = 
        array (
          0 => 'uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'uid',
        );

    public $uid = NULL;
    public $id = NULL;
    public $date_update = NULL;
    public $latitude = NULL;
    public $longitude = NULL;
    public $name = NULL;
    public $address = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip = NULL;
    public $phone = NULL;
    public $web = NULL;
    public $emps = NULL;
    public $revs = NULL;
    public $year_established = NULL;
    public $description = NULL;
    public $products = NULL;
    public $topexec = NULL;
    public $DBColumnsArray = 
        array (
          'uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'id' => 
          array (
          ),
          'date_update' => 
          array (
          ),
          'latitude' => 
          array (
          ),
          'longitude' => 
          array (
          ),
          'name' => 
          array (
          ),
          'address' => 
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
          'phone' => 
          array (
          ),
          'web' => 
          array (
          ),
          'emps' => 
          array (
          ),
          'revs' => 
          array (
          ),
          'year_established' => 
          array (
          ),
          'description' => 
          array (
          ),
          'products' => 
          array (
          ),
          'topexec' => 
          array (
          ),
        );




}

?>