<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AdminUrl
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AdminUrl extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'admin_url';
    const AUTO_INCREMENT_COLUMN = 'url_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'url_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'url_id',
        );

    public $url_id = NULL;
    public $url = NULL;
    public $DBColumnsArray = 
        array (
          'url_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'url' => 
          array (
          ),
        );




}

?>