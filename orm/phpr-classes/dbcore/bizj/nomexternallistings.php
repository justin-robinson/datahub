<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NomExternalListings
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NomExternalListings extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'nom_external_listings';
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
    public $url = NULL;
    public $description = NULL;
    public $market = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $c_time = NULL;
    public $title = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'url' => 
          array (
          ),
          'description' => 
          array (
          ),
          'market' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'title' => 
          array (
          ),
        );




}

?>