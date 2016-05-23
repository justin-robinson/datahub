<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstancePropertyCopy
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/20
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
 * Put your code in DB\Datahub\CompanyInstancePropertyCopy
 */
class CompanyInstancePropertyCopy extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstanceProperty_copy';
    const AUTO_INCREMENT_COLUMN = 'companyInstancePropertyId';
    const PRIMARY_KEYS = 
        array (
          0 => 'companyInstancePropertyId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyInstancePropertyId',
          1 => 'name',
          2 => 'sourceTypeId',
          3 => 'sourceId',
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

    protected $dBValuesArray = 
        array (
          'companyInstancePropertyId' => NULL,
          'companyInstanceId' => NULL,
          'name' => NULL,
          'value' => NULL,
          'valueMd5' => NULL,
          'sourceTypeId' => NULL,
          'sourceId' => NULL,
          'createdAt' => NULL,
          'updatedAt' => NULL,
          'deletedAt' => NULL,
        );

}

?>