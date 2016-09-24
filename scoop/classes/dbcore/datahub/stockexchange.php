<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class StockExchange
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/24
 * @property mixed $id
 * @property mixed $exchange_name
 * @property mixed $exchange_abbrev
 * @property mixed $yahoo_code
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\StockExchange
 */
class StockExchange extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'stock_exchange';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'exchange_name',
          2 => 'exchange_abbrev',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'exchange_name' => 
          array (
          ),
          'exchange_abbrev' => 
          array (
          ),
          'yahoo_code' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'id' => NULL,
          'exchange_name' => NULL,
          'exchange_abbrev' => NULL,
          'yahoo_code' => NULL,
        );

}

?>