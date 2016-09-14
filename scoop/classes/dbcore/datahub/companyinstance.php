<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstance
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/14
 * @property mixed $companyInstanceId
 * @property mixed $companyId
 * @property mixed $generateCode
 * @property mixed $isHeadquarters
 * @property mixed $marketCode
 * @property mixed $marketOfRecord
 * @property mixed $name
 * @property mixed $sicCode
 * @property mixed $stateId
 * @property mixed $stockSymbol
 * @property mixed $tickerExchange
 * @property mixed $tierLevel
 * @property mixed $url
 * @property mixed $channel
 * @property mixed $basicFieldCount
 * @property mixed $enhancedFieldCount
 * @property mixed $groupingFieldCount
 * @property mixed $bestSource
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
          5 => 'deletedAt',
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
          'stateId' => 
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
          'channel' => 
          array (
          ),
          'basicFieldCount' => 
          array (
          ),
          'enhancedFieldCount' => 
          array (
          ),
          'groupingFieldCount' => 
          array (
          ),
          'bestSource' => 
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
    public static $dBColumnDefaultValuesArray = 
        array (
          'companyInstanceId' => NULL,
          'companyId' => NULL,
          'generateCode' => NULL,
          'isHeadquarters' => '0',
          'marketCode' => NULL,
          'marketOfRecord' => NULL,
          'name' => NULL,
          'sicCode' => NULL,
          'stateId' => NULL,
          'stockSymbol' => NULL,
          'tickerExchange' => NULL,
          'tierLevel' => NULL,
          'url' => NULL,
          'channel' => NULL,
          'basicFieldCount' => NULL,
          'enhancedFieldCount' => NULL,
          'groupingFieldCount' => NULL,
          'bestSource' => NULL,
          'createdAt' => '0000-00-00 00:00:00',
          'updatedAt' => '0000-00-00 00:00:00',
          'deletedAt' => '0000-00-00 00:00:00',
        );

}

?>