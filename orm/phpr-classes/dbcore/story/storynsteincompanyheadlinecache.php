<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in StoryNsteinCompanyHeadlineCache
  */
namespace DBCore\Story;

use phpr\Database\Model;

class StoryNsteinCompanyHeadlineCache extends Model {

    const SCHEMA = 'story';
    const TABLE = 'story_nstein_company_headline_cache';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'obj_id',
          1 => 'obj_type',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'obj_id',
          1 => 'c_time',
          2 => 'obj_type',
          3 => 'stored_object',
        );

    public $obj_id = NULL;
    public $c_time = NULL;
    public $obj_type = NULL;
    public $stored_object = NULL;
    public $DBColumnsArray = 
        array (
          'obj_id' => 
          array (
            0 => 1,
          ),
          'c_time' => 
          array (
          ),
          'obj_type' => 
          array (
            0 => 1,
          ),
          'stored_object' => 
          array (
          ),
        );




}

?>