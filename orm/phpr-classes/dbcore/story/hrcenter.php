<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in HrCenter
  */
namespace DBCore\Story;

use phpr\Database\Model;

class HrCenter extends Model {

    const SCHEMA = 'story';
    const TABLE = 'hr_center';
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
    public $headline = NULL;
    public $teaser = NULL;
    public $story_id = NULL;
    public $is_feature = NULL;
    public $section_string = NULL;
    public $sort_order = NULL;
    public $feature_date = NULL;
    public $m_time = NULL;
    public $consultant_doc_id = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'headline' => 
          array (
          ),
          'teaser' => 
          array (
          ),
          'story_id' => 
          array (
          ),
          'is_feature' => 
          array (
          ),
          'section_string' => 
          array (
          ),
          'sort_order' => 
          array (
          ),
          'feature_date' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'consultant_doc_id' => 
          array (
          ),
        );




}

?>