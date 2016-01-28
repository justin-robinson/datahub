<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ReconExchange
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class ReconExchange extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'recon_exchange';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'market_name',
          2 => 'market_abbrev',
        );

    public $id = NULL;
    public $market_name = NULL;
    public $market_abbrev = NULL;
    public $yahoo_code = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market_name' => 
          array (
          ),
          'market_abbrev' => 
          array (
          ),
          'yahoo_code' => 
          array (
          ),
        );




}

?>