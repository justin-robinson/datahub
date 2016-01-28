<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SolutionsHeadline
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SolutionsHeadline extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'solutions_headline';
    const AUTO_INCREMENT_COLUMN = 'headline_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'headline_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'headline_id',
        );

    public $headline_id = NULL;
    public $email_date = NULL;
    public $email_section = NULL;
    public $headline = NULL;
    public $copy = NULL;
    public $url = NULL;
    public $story_id = NULL;
    public $consultant_section = NULL;
    public $consultant_image = NULL;
    public $display_order = NULL;
    public $image_override = NULL;
    public $DBColumnsArray = 
        array (
          'headline_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'email_date' => 
          array (
          ),
          'email_section' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'copy' => 
          array (
          ),
          'url' => 
          array (
          ),
          'story_id' => 
          array (
          ),
          'consultant_section' => 
          array (
          ),
          'consultant_image' => 
          array (
          ),
          'display_order' => 
          array (
          ),
          'image_override' => 
          array (
          ),
        );




}

?>