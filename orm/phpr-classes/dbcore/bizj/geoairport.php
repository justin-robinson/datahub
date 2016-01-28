<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in GeoAirport
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class GeoAirport extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'geo_airport';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'ident_code',
          2 => 'airport_type',
          3 => 'continent',
          4 => 'country_code',
          5 => 'region_code',
          6 => 'created_at',
          7 => 'updated_at',
        );

    public $id = NULL;
    public $ident_code = NULL;
    public $airport_type = NULL;
    public $airport_name = NULL;
    public $latitude = NULL;
    public $longitude = NULL;
    public $elevation = NULL;
    public $continent = NULL;
    public $country_code = NULL;
    public $region_code = NULL;
    public $city_name = NULL;
    public $iata_code = NULL;
    public $local_code = NULL;
    public $airport_url = NULL;
    public $wikipedia_url = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'ident_code' => 
          array (
          ),
          'airport_type' => 
          array (
          ),
          'airport_name' => 
          array (
          ),
          'latitude' => 
          array (
          ),
          'longitude' => 
          array (
          ),
          'elevation' => 
          array (
          ),
          'continent' => 
          array (
          ),
          'country_code' => 
          array (
          ),
          'region_code' => 
          array (
          ),
          'city_name' => 
          array (
          ),
          'iata_code' => 
          array (
          ),
          'local_code' => 
          array (
          ),
          'airport_url' => 
          array (
          ),
          'wikipedia_url' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>