<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AccountMessages
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AccountMessages extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'account_messages';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $message = NULL;
    public $link_location = NULL;
    public $link_text = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'message' => 
          array (
          ),
          'link_location' => 
          array (
          ),
          'link_text' => 
          array (
          ),
        );




}

?>