<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AgileColors
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class AgileColors extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'agile_colors';
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
    public $container_id = NULL;
    public $container_type = NULL;
    public $color = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'container_id' => 
          array (
          ),
          'container_type' => 
          array (
          ),
          'color' => 
          array (
          ),
        );




}

?>