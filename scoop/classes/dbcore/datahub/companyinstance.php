<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstance
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/16
 * @property mixed $companyInstanceId
 * @property mixed $companyId
 * @property mixed $generateCode
 * @property mixed $isHeadquarters
 * @property mixed $marketCode
 * @property mixed $marketOfRecord
 * @property mixed $name
 * @property mixed $sicCode
 * @property mixed $stockSymbol
 * @property mixed $tickerExchange
 * @property mixed $tierLevel
 * @property mixed $url
 * @property mixed $createdAt
 * @property mixed $updatedAt
 * @property mixed $deletedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyInstance
 */
class CompanyInstance extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstance';
    const AUTO_INCREMENT_COLUMN = 'companyInstanceId';
    const PRIMARY_KEYS = 
        array (
          0 => 'companyInstanceId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyInstanceId',
          1 => 'companyId',
          2 => 'isHeadquarters',
          3 => 'createdAt',
          4 => 'updatedAt',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'companyInstanceId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'companyId' => 
          array (
          ),
          'generateCode' => 
          array (
          ),
          'isHeadquarters' => 
          array (
          ),
          'marketCode' => 
          array (
          ),
          'marketOfRecord' => 
          array (
          ),
          'name' => 
          array (
          ),
          'sicCode' => 
          array (
          ),
          'stockSymbol' => 
          array (
          ),
          'tickerExchange' => 
          array (
          ),
          'tierLevel' => 
          array (
          ),
          'url' => 
          array (
          ),
          'createdAt' => 
          array (
          ),
          'updatedAt' => 
          array (
          ),
          'deletedAt' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'companyInstanceId' => NULL,
          'companyId' => NULL,
          'generateCode' => NULL,
          'isHeadquarters' => NULL,
          'marketCode' => NULL,
          'marketOfRecord' => NULL,
          'name' => NULL,
          'sicCode' => NULL,
          'stockSymbol' => NULL,
          'tickerExchange' => NULL,
          'tierLevel' => NULL,
          'url' => NULL,
          'createdAt' => NULL,
          'updatedAt' => NULL,
          'deletedAt' => NULL,
        );

}

?>