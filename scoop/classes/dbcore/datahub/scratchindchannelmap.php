<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class ScratchIndChannelMap
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/14
 * @property mixed $industry_id
 * @property mixed $channel_id
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\ScratchIndChannelMap
 */
class ScratchIndChannelMap extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'scratch_ind_channel_map';
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
          'channel_id' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'industry_id' => NULL,
          'channel_id' => NULL,
        );

}

?>