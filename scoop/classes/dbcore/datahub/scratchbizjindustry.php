<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class ScratchBizjIndustry
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/06
 * @property mixed $industry_id
 * @property mixed $industry_code
 * @property mixed $industry_name
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\ScratchBizjIndustry
 */
class ScratchBizjIndustry extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'scratch_bizjIndustry';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
        );

    public static $dBColumnPropertiesArray = 
        array (
          'industry_id' => 
          array (
          ),
          'industry_code' => 
          array (
          ),
          'industry_name' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'industry_id' => NULL,
          'industry_code' => NULL,
          'industry_name' => NULL,
        );

}

?>