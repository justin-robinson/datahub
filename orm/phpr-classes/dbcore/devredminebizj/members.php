<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in Members
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class Members extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'members';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'user_id',
          2 => 'project_id',
          3 => 'mail_notification',
        );

    public $id = NULL;
    public $user_id = NULL;
    public $project_id = NULL;
    public $created_on = NULL;
    public $mail_notification = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'project_id' => 
          array (
          ),
          'created_on' => 
          array (
          ),
          'mail_notification' => 
          array (
          ),
        );




}

?>