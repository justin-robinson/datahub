<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SearchAutocomplete
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SearchAutocomplete extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'search_autocomplete';
    const AUTO_INCREMENT_COLUMN = 'term_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'term_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'term_id',
          1 => 'term',
          2 => 'term_type',
          3 => 'created_at',
          4 => 'updated_at',
        );

    public $term_id = NULL;
    public $term = NULL;
    public $term_type = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $use_flag = NULL;
    public $site = NULL;
    public $weight = NULL;
    public $DBColumnsArray = 
        array (
          'term_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'term' => 
          array (
          ),
          'term_type' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'use_flag' => 
          array (
          ),
          'site' => 
          array (
          ),
          'weight' => 
          array (
          ),
        );




}

?>