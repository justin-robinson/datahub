<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AdminUrlGroup
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AdminUrlGroup extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'admin_url_group';
    const AUTO_INCREMENT_COLUMN = 'url_group_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'url_group_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'url_group_id',
        );

    public $url_group_id = NULL;
    public $description = NULL;
    public $DBColumnsArray = 
        array (
          'url_group_id' => 
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