<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in IpMatches
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class IpMatches extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ip_matches';
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
    public $company = NULL;
    public $network = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'company' => 
          array (
          ),
          'network' => 
          array (
          ),
        );




}

?>