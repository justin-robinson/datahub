<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Notes
  */
namespace DBCore\OldNascarSite;

use phpr\Database\Model;

class Notes extends Model {

    const SCHEMA = 'old_nascar_site';
    const TABLE = 'notes';
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
    public $spread_id = NULL;
    public $position = NULL;
    public $notes_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $title = NULL;
    public $summary = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'spread_id' => 
          array (
          ),
          'position' => 
          array (
          ),
          'notes_id' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'title' => 
          array (
          ),
          'summary' => 
          array (
          ),
        );




}

?>