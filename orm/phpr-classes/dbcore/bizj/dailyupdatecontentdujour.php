<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in DailyUpdateContentDuJour
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class DailyUpdateContentDuJour extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'daily_update_content_du_jour';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $title = NULL;
    public $headline = NULL;
    public $teaser = NULL;
    public $date = NULL;
    public $content_type = NULL;
    public $url = NULL;
    public $market = NULL;
    public $logo = NULL;
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
          'headline' => 
          array (
          ),
          'teaser' => 
          array (
          ),
          'date' => 
          array (
          ),
          'content_type' => 
          array (
          ),
          'url' => 
          array (
          ),
          'market' => 
          array (
          ),
          'logo' => 
          array (
          ),
        );




}

?>