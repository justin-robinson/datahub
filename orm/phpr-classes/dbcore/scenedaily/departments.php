<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Departments
  */
namespace DBCore\SceneDaily;

use phpr\Database\Model;

class Departments extends Model {

    const SCHEMA = 'scene_daily';
    const TABLE = 'departments';
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
    public $name = NULL;
    public $slug = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $page_title = NULL;
    public $meta_description = NULL;
    public $active = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'name' => 
          array (
          ),
          'slug' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'page_title' => 
          array (
          ),
          'meta_description' => 
          array (
          ),
          'active' => 
          array (
          ),
        );




}

?>