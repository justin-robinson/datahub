<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PerlPod
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PerlPod extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'perl_pod';
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
    public $absolute_path = NULL;
    public $directory = NULL;
    public $file_name = NULL;
    public $pod = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'absolute_path' => 
          array (
          ),
          'directory' => 
          array (
          ),
          'file_name' => 
          array (
          ),
          'pod' => 
          array (
          ),
        );




}

?>