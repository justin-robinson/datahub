<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class DhIndustryBizjChannelMap
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/14
 * @property mixed $dh_industry_id
 * @property mixed $channel_id
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\DhIndustryBizjChannelMap
 */
class DhIndustryBizjChannelMap extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'dh_industry_bizj_channel_map';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
        );

    public static $dBColumnPropertiesArray = 
        array (
          'dh_industry_id' => 
          array (
          ),
          'channel_id' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'dh_industry_id' => NULL,
          'channel_id' => NULL,
        );

}

?>