<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CompanyMapManual
  */
namespace DBCore\Story;

use phpr\Database\Model;

class CompanyMapManual extends Model {

    const SCHEMA = 'story';
    const TABLE = 'company_map_manual';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'norm_name',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'norm_name',
          1 => 'gcode',
        );

    public $norm_name = NULL;
    public $gcode = NULL;
    public $DBColumnsArray = 
        array (
          'norm_name' => 
          array (
            0 => 1,
          ),
          'gcode' => 
          array (
          ),
        );




}

?>