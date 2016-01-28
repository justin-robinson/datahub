<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in StateList
  */
namespace DBCore\Nascarillustrated;

use phpr\Database\Model;

class StateList extends Model {

    const SCHEMA = 'nascarillustrated';
    const TABLE = 'state_list';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'state_code',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'state_code',
          1 => 'state_name',
          2 => 'is_active',
          3 => 'ord',
        );

    public $state_code = NULL;
    public $state_name = NULL;
    public $is_active = NULL;
    public $ord = NULL;
    public $DBColumnsArray = 
        array (
          'state_code' => 
          array (
            0 => 1,
          ),
          'state_name' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'ord' => 
          array (
          ),
        );




}

?>