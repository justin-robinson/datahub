<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Topic
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class Topic extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'topic';
    const AUTO_INCREMENT_COLUMN = 'topic_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'topic_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'topic_id',
          1 => 'usage_market',
          2 => 'topic_code',
          3 => 'topic_name',
          4 => 'hidden',
          5 => 'is_active',
        );

    public $topic_id = NULL;
    public $usage_market = NULL;
    public $topic_code = NULL;
    public $topic_name = NULL;
    public $hidden = NULL;
    public $is_active = NULL;
    public $section_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'topic_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'usage_market' => 
          array (
          ),
          'topic_code' => 
          array (
          ),
          'topic_name' => 
          array (
          ),
          'hidden' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'section_id' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>