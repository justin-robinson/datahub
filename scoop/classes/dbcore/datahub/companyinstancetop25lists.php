<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyInstanceTop25lists
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/21
 * @property mixed $companyInstanceId
 * @property mixed $listId
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyInstanceTop25lists
 */
class CompanyInstanceTop25lists extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'companyInstance_top25lists';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
        );

    public static $dBColumnPropertiesArray = 
        array (
          'companyInstanceId' => 
          array (
          ),
          'listId' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'companyInstanceId' => NULL,
          'listId' => NULL,
        );

}

?>