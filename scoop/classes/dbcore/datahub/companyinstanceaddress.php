<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstanceAddress
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/11
 * @property mixed $companyInstanceId
 * @property mixed $addressId
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyInstanceAddress
 */
class CompanyInstanceAddress extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstance_address';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'companyInstanceId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyInstanceId',
          1 => 'addressId',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'companyInstanceId' => 
          array (
            0 => 1,
          ),
          'addressId' => 
          array (
          ),
        );


    protected $dBValuesArray = 
        array (
          'companyInstanceId' => NULL,
          'addressId' => NULL,
        );



}

?>