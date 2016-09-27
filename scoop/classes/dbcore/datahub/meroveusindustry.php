<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class MeroveusIndustry
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/27
 * @property mixed $meroveusIndustryId
 * @property mixed $externalId
 * @property mixed $industry
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\MeroveusIndustry
 */
class MeroveusIndustry extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'meroveusIndustry';
    const AUTO_INCREMENT_COLUMN = 'meroveusIndustryId';
    const PRIMARY_KEYS = 
        array (
          0 => 'meroveusIndustryId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'meroveusIndustryId',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'meroveusIndustryId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'externalId' => 
          array (
          ),
          'industry' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'meroveusIndustryId' => NULL,
          'externalId' => NULL,
          'industry' => NULL,
        );

}

?>