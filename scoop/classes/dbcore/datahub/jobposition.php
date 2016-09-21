<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class JobPosition
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/09/21
 * @property mixed $job_position_id
 * @property mixed $position
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\JobPosition
 */
class JobPosition extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'job_position';
    const AUTO_INCREMENT_COLUMN = 'job_position_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'job_position_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'job_position_id',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'job_position_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'position' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'job_position_id' => NULL,
          'position' => NULL,
        );

}

?>