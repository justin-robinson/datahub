<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class MeroveusIndustry
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/05
 * @property mixed $meroveus_industry_id
 * @property mixed $external_id
 * @property mixed $industry
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\MeroveusIndustry
 */
class MeroveusIndustry extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'meroveus_industry';
    const AUTO_INCREMENT_COLUMN = 'meroveus_industry_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'meroveus_industry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'meroveus_industry_id',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'meroveus_industry_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'external_id' => 
          array (
          ),
          'industry' => 
          array (
          ),
        );


    protected $dBValuesArray = 
        array (
          'meroveus_industry_id' => NULL,
          'external_id' => NULL,
          'industry' => NULL,
        );



}

?>