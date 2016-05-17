<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Phone
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/17
 * @property mixed $companyInstanceId
 * @property mixed $number
 * @property mixed $countryCode
 * @property mixed $extension
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Phone
 */
class Phone extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'phone';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyInstanceId',
          1 => 'number',
          2 => 'countryCode',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'companyInstanceId' => 
          array (
          ),
          'number' => 
          array (
          ),
          'countryCode' => 
          array (
          ),
          'extension' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'companyInstanceId' => NULL,
          'number' => NULL,
          'countryCode' => NULL,
          'extension' => NULL,
        );

}

?>