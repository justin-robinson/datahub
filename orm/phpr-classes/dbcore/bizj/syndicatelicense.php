<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SyndicateLicense
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SyndicateLicense extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'syndicate_license';
    const AUTO_INCREMENT_COLUMN = 'license_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'license_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'license_id',
          1 => 'partner_id',
          2 => 'license_name',
          3 => 'modified_time',
        );

    public $license_id = NULL;
    public $partner_id = NULL;
    public $license_name = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $api_key = NULL;
    public $created_time = NULL;
    public $modified_time = NULL;
    public $DBColumnsArray = 
        array (
          'license_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'partner_id' => 
          array (
          ),
          'license_name' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
          'api_key' => 
          array (
          ),
          'created_time' => 
          array (
          ),
          'modified_time' => 
          array (
          ),
        );




}

?>