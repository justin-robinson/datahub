<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PageLeadinGroup
  */
namespace DBCore\BizjPreview;

use phpr\Database\Model;

class PageLeadinGroup extends Model {

    const SCHEMA = 'bizj_preview';
    const TABLE = 'page_leadin_group';
    const AUTO_INCREMENT_COLUMN = 'group_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'group_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'group_id',
          1 => 'page_id',
          2 => 'group_type',
          3 => 'ord',
        );

    public $group_id = NULL;
    public $page_id = NULL;
    public $group_type = NULL;
    public $group_title = NULL;
    public $group_class = NULL;
    public $group_topic = NULL;
    public $group_teaser = NULL;
    public $placement = NULL;
    public $ord = NULL;
    public $group_url = NULL;
    public $auto_query = NULL;
    public $DBColumnsArray = 
        array (
          'group_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'page_id' => 
          array (
          ),
          'group_type' => 
          array (
          ),
          'group_title' => 
          array (
          ),
          'group_class' => 
          array (
          ),
          'group_topic' => 
          array (
          ),
          'group_teaser' => 
          array (
          ),
          'placement' => 
          array (
          ),
          'ord' => 
          array (
          ),
          'group_url' => 
          array (
          ),
          'auto_query' => 
          array (
          ),
        );




}

?>