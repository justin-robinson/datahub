<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in StoryEntityCompany
  */
namespace DBCore\BizjPreview;

use phpr\Database\Model;

class StoryEntityCompany extends Model {

    const SCHEMA = 'bizj_preview';
    const TABLE = 'story_entity_company';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $story_id = NULL;
    public $name = NULL;
    public $eoc = NULL;
    public $c_time = NULL;
    public $normalized_name = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'story_id' => 
          array (
          ),
          'name' => 
          array (
          ),
          'eoc' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'normalized_name' => 
          array (
          ),
        );




}

?>