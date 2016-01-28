<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in NomEmail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class NomEmail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'nom_email';
    const AUTO_INCREMENT_COLUMN = 'email_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'email_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'email_id',
          1 => 'authorized',
        );

    public $email_id = NULL;
    public $nomination_id = NULL;
    public $sent_time = NULL;
    public $sent_count = NULL;
    public $c_time = NULL;
    public $batch_id = NULL;
    public $scheduled_time = NULL;
    public $authorized = NULL;
    public $DBColumnsArray = 
        array (
          'email_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'nomination_id' => 
          array (
          ),
          'sent_time' => 
          array (
          ),
          'sent_count' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'batch_id' => 
          array (
          ),
          'scheduled_time' => 
          array (
          ),
          'authorized' => 
          array (
          ),
        );




}

?>