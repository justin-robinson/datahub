<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in RenewalEffortCopy
  */
namespace DBCore\Bizjphp;

use phpr\Database\Model;

class RenewalEffortCopy extends Model {

    const SCHEMA = 'bizjphp';
    const TABLE = 'renewal_effort_copy';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'source_code',
          2 => 'effort_number',
          3 => 'headline',
          4 => 'copy',
          5 => 'created_at',
          6 => 'updated_at',
        );

    public $id = NULL;
    public $source_code = NULL;
    public $effort_number = NULL;
    public $headline = NULL;
    public $copy = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'source_code' => 
          array (
          ),
          'effort_number' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'copy' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>