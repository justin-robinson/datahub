<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ContentDesk
  */
namespace DBCore\Bizjcms;

use phpr\Database\Model;

class ContentDesk extends Model {

    const SCHEMA = 'bizjcms';
    const TABLE = 'content_desk';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'content_id',
          1 => 'desk_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'content_id',
          1 => 'desk_id',
        );

    public $content_id = NULL;
    public $desk_id = NULL;
    public $DBColumnsArray = 
        array (
          'content_id' => 
          array (
            0 => 1,
          ),
          'desk_id' => 
          array (
            0 => 1,
          ),
        );




}

?>