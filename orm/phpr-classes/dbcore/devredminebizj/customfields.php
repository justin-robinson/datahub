<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CustomFields
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class CustomFields extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'custom_fields';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'type',
          2 => 'name',
          3 => 'field_format',
          4 => 'is_required',
          5 => 'is_for_all',
          6 => 'is_filter',
          7 => 'visible',
        );

    public $id = NULL;
    public $type = NULL;
    public $name = NULL;
    public $field_format = NULL;
    public $possible_values = NULL;
    public $regexp = NULL;
    public $min_length = NULL;
    public $max_length = NULL;
    public $is_required = NULL;
    public $is_for_all = NULL;
    public $is_filter = NULL;
    public $position = NULL;
    public $searchable = NULL;
    public $default_value = NULL;
    public $editable = NULL;
    public $visible = NULL;
    public $multiple = NULL;
    public $format_store = NULL;
    public $description = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'type' => 
          array (
          ),
          'name' => 
          array (
          ),
          'field_format' => 
          array (
          ),
          'possible_values' => 
          array (
          ),
          'regexp' => 
          array (
          ),
          'min_length' => 
          array (
          ),
          'max_length' => 
          array (
          ),
          'is_required' => 
          array (
          ),
          'is_for_all' => 
          array (
          ),
          'is_filter' => 
          array (
          ),
          'position' => 
          array (
          ),
          'searchable' => 
          array (
          ),
          'default_value' => 
          array (
          ),
          'editable' => 
          array (
          ),
          'visible' => 
          array (
          ),
          'multiple' => 
          array (
          ),
          'format_store' => 
          array (
          ),
          'description' => 
          array (
          ),
        );




}

?>