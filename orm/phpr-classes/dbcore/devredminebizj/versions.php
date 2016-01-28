<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Versions
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class Versions extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'versions';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'project_id',
          2 => 'name',
          3 => 'sharing',
        );

    public $id = NULL;
    public $project_id = NULL;
    public $name = NULL;
    public $description = NULL;
    public $effective_date = NULL;
    public $created_on = NULL;
    public $updated_on = NULL;
    public $wiki_page_title = NULL;
    public $status = NULL;
    public $sharing = NULL;
    public $ir_start_date = NULL;
    public $ir_end_date = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'project_id' => 
          array (
          ),
          'name' => 
          array (
          ),
          'description' => 
          array (
          ),
          'effective_date' => 
          array (
          ),
          'created_on' => 
          array (
          ),
          'updated_on' => 
          array (
          ),
          'wiki_page_title' => 
          array (
          ),
          'status' => 
          array (
          ),
          'sharing' => 
          array (
          ),
          'ir_start_date' => 
          array (
          ),
          'ir_end_date' => 
          array (
          ),
        );




}

?>