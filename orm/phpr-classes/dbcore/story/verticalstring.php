<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in VerticalString
  */
namespace DBCore\Story;

use phpr\Database\Model;

class VerticalString extends Model {

    const SCHEMA = 'story';
    const TABLE = 'vertical_string';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'vertical_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'vertical_id',
          1 => 'vertical_string',
        );

    public $vertical_id = NULL;
    public $vertical_string = NULL;
    public $DBColumnsArray = 
        array (
          'vertical_id' => 
          array (
            0 => 1,
          ),
          'vertical_string' => 
          array (
          ),
        );




}

?>