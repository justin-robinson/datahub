<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UIncomeLevel
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UIncomeLevel extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_income_level';
    const AUTO_INCREMENT_COLUMN = 'income_level_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'income_level_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'income_level_id',
        );

    public $income_level_id = NULL;
    public $description = NULL;
    public $DBColumnsArray = 
        array (
          'income_level_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'description' => 
          array (
          ),
        );




}

?>