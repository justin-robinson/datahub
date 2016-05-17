<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class SourceType
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/17
 * @property mixed $sourceTypeId
 * @property mixed $name
 * @property mixed $order
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\SourceType
 */
class SourceType extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'sourceType';
    const AUTO_INCREMENT_COLUMN = 'sourceTypeId';
    const PRIMARY_KEYS = 
        array (
          0 => 'sourceTypeId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'sourceTypeId',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'sourceTypeId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'name' => 
          array (
          ),
          'order' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'sourceTypeId' => NULL,
          'name' => NULL,
          'order' => NULL,
        );

}

?>