<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SolutionsSubject
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SolutionsSubject extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'solutions_subject';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'email_date',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'email_date',
        );

    public $email_date = NULL;
    public $subject = NULL;
    public $DBColumnsArray = 
        array (
          'email_date' => 
          array (
            0 => 1,
          ),
          'subject' => 
          array (
          ),
        );




}

?>