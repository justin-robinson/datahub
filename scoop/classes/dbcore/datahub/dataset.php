<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Dataset
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/07/05
 * @property mixed $id
 * @property mixed $name
 * @property mixed $market_code
 * @property mixed $ranked_by
 * @property mixed $publishedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Dataset
 */
class Dataset extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'dataset';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'name' => 
          array (
          ),
          'market_code' => 
          array (
          ),
          'ranked_by' => 
          array (
          ),
          'publishedAt' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'id' => NULL,
          'name' => NULL,
          'market_code' => NULL,
          'ranked_by' => NULL,
          'publishedAt' => NULL,
        );

}

?>