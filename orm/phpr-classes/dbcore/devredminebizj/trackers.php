<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Trackers
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class Trackers extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'trackers';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'name',
          2 => 'is_in_chlog',
          3 => 'is_in_roadmap',
        );

    public $id = NULL;
    public $name = NULL;
    public $is_in_chlog = NULL;
    public $position = NULL;
    public $is_in_roadmap = NULL;
    public $fields_bits = NULL;
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
          'is_in_chlog' => 
          array (
          ),
          'position' => 
          array (
          ),
          'is_in_roadmap' => 
          array (
          ),
          'fields_bits' => 
          array (
          ),
        );




}

?>