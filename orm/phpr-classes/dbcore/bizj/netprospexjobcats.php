<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NetprospexJobcats
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NetprospexJobcats extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'netprospex_jobcats';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
          1 => 'parent',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'parent',
        );

    public $id = NULL;
    public $parent = NULL;
    public $child = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'parent' => 
          array (
            0 => 1,
          ),
          'child' => 
          array (
          ),
        );




}

?>