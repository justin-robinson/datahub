<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AfterHours
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AfterHours extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'after_hours';
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
    public $title = NULL;
    public $c_time = NULL;
    public $m_time = NULL;
    public $image_order = NULL;
    public $details = NULL;
    public $issue_date = NULL;
    public $active = NULL;
    public $market = NULL;
    public $order = NULL;
    public $subhead = NULL;
    public $byline = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'title' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'image_order' => 
          array (
          ),
          'details' => 
          array (
          ),
          'issue_date' => 
          array (
          ),
          'active' => 
          array (
          ),
          'market' => 
          array (
          ),
          'order' => 
          array (
          ),
          'subhead' => 
          array (
          ),
          'byline' => 
          array (
          ),
        );




}

?>