<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in TopListUidConversion
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class TopListUidConversion extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'top25_list_uid_conversion';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'current_uid',
          1 => 'new_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'current_uid',
          1 => 'new_uid',
        );

    public $current_uid = NULL;
    public $new_uid = NULL;
    public $DBColumnsArray = 
        array (
          'current_uid' => 
          array (
            0 => 1,
          ),
          'new_uid' => 
          array (
            0 => 1,
          ),
        );




}

?>