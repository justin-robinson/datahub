<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in LeadinGroupPub
  */
namespace DBCore\Bizjcms;

use phpr\Database\Model;

class LeadinGroupPub extends Model {

    const SCHEMA = 'bizjcms';
    const TABLE = 'leadin_group_pub';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'group_id',
          1 => 'pub_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'group_id',
          1 => 'pub_id',
        );

    public $group_id = NULL;
    public $pub_id = NULL;
    public $DBColumnsArray = 
        array (
          'group_id' => 
          array (
            0 => 1,
          ),
          'pub_id' => 
          array (
            0 => 1,
          ),
        );




}

?>