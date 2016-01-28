<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in WikiPages
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class WikiPages extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'wiki_pages';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'wiki_id',
          2 => 'title',
          3 => 'created_on',
          4 => 'protected',
        );

    public $id = NULL;
    public $wiki_id = NULL;
    public $title = NULL;
    public $created_on = NULL;
    public $protected = NULL;
    public $parent_id = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'wiki_id' => 
          array (
          ),
          'title' => 
          array (
          ),
          'created_on' => 
          array (
          ),
          'protected' => 
          array (
          ),
          'parent_id' => 
          array (
          ),
        );




}

?>