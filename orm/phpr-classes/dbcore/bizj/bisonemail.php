<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BisonEmail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class BisonEmail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'bison_email';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'm_time',
        );

    public $id = NULL;
    public $email_date = NULL;
    public $html = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $deleted = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'email_date' => 
          array (
          ),
          'html' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'deleted' => 
          array (
          ),
        );




}

?>