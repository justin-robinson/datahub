<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in KrangPageTags
  */
namespace DBCore\BizjPreview;

use phpr\Database\Model;

class KrangPageTags extends Model {

    const SCHEMA = 'bizj_preview';
    const TABLE = 'krang_page_tags';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'krang_page_id',
          1 => 'tag',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'krang_page_id',
          1 => 'tag',
          2 => 'c_time',
        );

    public $krang_page_id = NULL;
    public $tag = NULL;
    public $c_time = NULL;
    public $DBColumnsArray = 
        array (
          'krang_page_id' => 
          array (
            0 => 1,
          ),
          'tag' => 
          array (
            0 => 1,
          ),
          'c_time' => 
          array (
          ),
        );




}

?>