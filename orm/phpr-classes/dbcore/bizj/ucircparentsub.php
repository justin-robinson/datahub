<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UCircParentsub
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UCircParentsub extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_circ_parentsub';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $user_id = NULL;
    public $parent_id = NULL;
    public $id = NULL;
    public $DBColumnsArray = 
        array (
          'user_id' => 
          array (
          ),
          'parent_id' => 
          array (
          ),
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
        );




}

?>