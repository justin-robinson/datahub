<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PollSponsor
  */
namespace DBCore\Story;

use phpr\Database\Model;

class PollSponsor extends Model {

    const SCHEMA = 'story';
    const TABLE = 'poll_sponsor';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'poll_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'poll_id',
        );

    public $poll_id = NULL;
    public $name = NULL;
    public $site_url = NULL;
    public $image = NULL;
    public $DBColumnsArray = 
        array (
          'poll_id' => 
          array (
            0 => 1,
          ),
          'name' => 
          array (
          ),
          'site_url' => 
          array (
          ),
          'image' => 
          array (
          ),
        );




}

?>