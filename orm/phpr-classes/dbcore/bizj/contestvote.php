<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in ContestVote
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class ContestVote extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'contest_vote';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'contest_name',
          2 => 'user_id',
          3 => 'voted_for',
          4 => 'ip_address',
          5 => 'created_at',
        );

    public $id = NULL;
    public $contest_name = NULL;
    public $user_id = NULL;
    public $voted_for = NULL;
    public $ip_address = NULL;
    public $created_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'contest_name' => 
          array (
          ),
          'user_id' => 
          array (
          ),
          'voted_for' => 
          array (
          ),
          'ip_address' => 
          array (
          ),
          'created_at' => 
          array (
          ),
        );




}

?>