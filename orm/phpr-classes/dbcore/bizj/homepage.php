<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Homepage
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class Homepage extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'homepage';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'c_time',
          2 => 'market',
        );

    public $id = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $issue_date = NULL;
    public $market = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'issue_date' => 
          array (
          ),
          'market' => 
          array (
          ),
        );




}

?>