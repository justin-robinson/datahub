<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstanceProperty
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/18
 * @property mixed $companyInstancePropertyId
 * @property mixed $companyInstanceId
 * @property mixed $name
 * @property mixed $value
 * @property mixed $valueMd5
 * @property mixed $sourceTypeId
 * @property mixed $sourceId
 * @property mixed $createdAt
 * @property mixed $updatedAt
 * @property mixed $deletedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyInstanceProperty
 */
class CompanyInstanceProperty extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstanceProperty';
    const AUTO_INCREMENT_COLUMN = 'companyInstancePropertyId';
    const PRIMARY_KEYS = 
        array (
          0 => 'companyInstancePropertyId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyInstancePropertyId',
          1 => 'companyInstanceId',
          2 => 'name',
          3 => 'sourceTypeId',
          4 => 'sourceId',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'companyInstancePropertyId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'companyInstanceId' => 
          array (
          ),
          'name' => 
          array (
          ),
          'value' => 
          array (
          ),
          'valueMd5' => 
          array (
          ),
          'sourceTypeId' => 
          array (
          ),
          'sourceId' => 
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
          'companyInstancePropertyId' => NULL,
          'companyInstanceId' => NULL,
          'name' => NULL,
          'value' => NULL,
          'valueMd5' => NULL,
          'sourceTypeId' => '1',
          'sourceId' => NULL,
          'createdAt' => NULL,
          'updatedAt' => NULL,
          'deletedAt' => NULL,
        );

}

?>