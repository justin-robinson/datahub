<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in GeoMsaPmsa
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class GeoMsaPmsa extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'geo_msa_pmsa';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'sa_code',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'sa_code',
          1 => 'sa_name',
          2 => 'is_combined',
        );

    public $sa_code = NULL;
    public $sa_name = NULL;
    public $sa_state = NULL;
    public $is_combined = NULL;
    public $parent_sa = NULL;
    public $DBColumnsArray = 
        array (
          'sa_code' => 
          array (
            0 => 1,
          ),
          'sa_name' => 
          array (
          ),
          'sa_state' => 
          array (
          ),
          'is_combined' => 
          array (
          ),
          'parent_sa' => 
          array (
          ),
        );




}

?>