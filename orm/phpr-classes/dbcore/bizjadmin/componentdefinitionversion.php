<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ComponentDefinitionVersion
  */
namespace DBCore\Bizjadmin;

use phpr\Database\Model;

class ComponentDefinitionVersion extends Model {

    const SCHEMA = 'bizjadmin';
    const TABLE = 'component_definition_version';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'component_id',
          1 => 'version',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'component_id',
          1 => 'component_name',
          2 => 'component_type_id',
          3 => 'is_active',
          4 => 'created_at',
          5 => 'updated_at',
          6 => 'version',
        );

    public $component_id = NULL;
    public $component_name = NULL;
    public $component_type_id = NULL;
    public $source = NULL;
    public $class_name = NULL;
    public $description = NULL;
    public $is_active = NULL;
    public $modified_by = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $version = NULL;
    public $DBColumnsArray = 
        array (
          'component_id' => 
          array (
            0 => 1,
          ),
          'component_name' => 
          array (
          ),
          'component_type_id' => 
          array (
          ),
          'source' => 
          array (
          ),
          'class_name' => 
          array (
          ),
          'description' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'modified_by' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'version' => 
          array (
            0 => 1,
          ),
        );




}

?>