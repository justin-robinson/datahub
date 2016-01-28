<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Journals
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class Journals extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'journals';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'journalized_id',
          2 => 'journalized_type',
          3 => 'user_id',
          4 => 'created_on',
          5 => 'private_notes',
        );

    public $id = NULL;
    public $journalized_id = NULL;
    public $journalized_type = NULL;
    public $user_id = NULL;
    public $notes = NULL;
    public $created_on = NULL;
    public $private_notes = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'journalized_id' => 
          array (
          ),
          'journalized_type' => 
          array (
          ),
          'user_id' => 
          array (
          ),
          'notes' => 
          array (
          ),
          'created_on' => 
          array (
          ),
          'private_notes' => 
          array (
          ),
        );




}

?>