<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NatpromoExclusions
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NatpromoExclusions extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'natpromo_exclusions';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'tab_id',
          2 => 'market',
        );

    public $id = NULL;
    public $tab_id = NULL;
    public $market = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'tab_id' => 
          array (
          ),
          'market' => 
          array (
          ),
        );




}

?>