<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ListPeopleCounts
  */
namespace DBCore\Bolapi;

use phpr\Database\Model;

class ListPeopleCounts extends Model {

    const SCHEMA = 'bolapi';
    const TABLE = 'list_people_counts';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'list_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'list_uid',
        );

    public $list_uid = NULL;
    public $contact_count = NULL;
    public $unique_count = NULL;
    public $DBColumnsArray = 
        array (
          'list_uid' => 
          array (
            0 => 1,
          ),
          'contact_count' => 
          array (
          ),
          'unique_count' => 
          array (
          ),
        );




}

?>