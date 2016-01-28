<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NominationEntry
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NominationEntry extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'nomination_entry';
    const AUTO_INCREMENT_COLUMN = 'entry_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'entry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'entry_id',
          1 => 'is_winner',
          2 => 'is_honoree',
          3 => 'created_at',
          4 => 'updated_at',
        );

    public $entry_id = NULL;
    public $nomination_id = NULL;
    public $response = NULL;
    public $submitter_name = NULL;
    public $submitter_email = NULL;
    public $submitter_ip = NULL;
    public $nominee_id = NULL;
    public $nominator_id = NULL;
    public $is_winner = NULL;
    public $is_honoree = NULL;
    public $brand_category_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $DBColumnsArray = 
        array (
          'entry_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'nomination_id' => 
          array (
          ),
          'response' => 
          array (
          ),
          'submitter_name' => 
          array (
          ),
          'submitter_email' => 
          array (
          ),
          'submitter_ip' => 
          array (
          ),
          'nominee_id' => 
          array (
          ),
          'nominator_id' => 
          array (
          ),
          'is_winner' => 
          array (
          ),
          'is_honoree' => 
          array (
          ),
          'brand_category_id' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
        );




}

?>