<?php

namespace DBCore\DatahubProd;

use Scoop\Database\Model;

/**
 * Class Company
 * @package DBCore\DatahubProd
 * @author jrobinson (robotically)
 * @date 2016/09/13
 * @property mixed $companyId
 * @property mixed $parentId
 * @property mixed $employeeCount
 * @property mixed $isActive
 * @property mixed $name
 * @property mixed $normalizedName
 * @property mixed $ownership
 * @property mixed $createdAt
 * @property mixed $updatedAt
 * @property mixed $deletedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\DatahubProd\Company
 */
class Company extends Model {

    const SCHEMA = 'datahub_prod';
    const TABLE = 'company';
    const AUTO_INCREMENT_COLUMN = 'companyId';
    const PRIMARY_KEYS = 
        array (
          0 => 'companyId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'companyId',
          1 => 'isActive',
          2 => 'name',
          3 => 'createdAt',
          4 => 'updatedAt',
          5 => 'deletedAt',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'companyId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'parentId' => 
          array (
          ),
          'employeeCount' => 
          array (
          ),
          'isActive' => 
          array (
          ),
          'name' => 
          array (
          ),
          'normalizedName' => 
          array (
          ),
          'ownership' => 
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
          'companyId' => NULL,
          'parentId' => NULL,
          'employeeCount' => NULL,
          'isActive' => '1',
          'name' => NULL,
          'normalizedName' => NULL,
          'ownership' => NULL,
          'createdAt' => '0000-00-00 00:00:00',
          'updatedAt' => '0000-00-00 00:00:00',
          'deletedAt' => '0000-00-00 00:00:00',
        );

}

?>