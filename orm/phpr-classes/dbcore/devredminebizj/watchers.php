<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Watchers
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class Watchers extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'watchers';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'watchable_type',
          2 => 'watchable_id',
        );

    public $id = NULL;
    public $watchable_type = NULL;
    public $watchable_id = NULL;
    public $user_id = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'watchable_type' => 
          array (
          ),
          'watchable_id' => 
          array (
          ),
          'user_id' => 
          array (
          ),
        );




}

?>