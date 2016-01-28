<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EvSponsorTier
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EvSponsorTier extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ev_sponsor_tier';
    const AUTO_INCREMENT_COLUMN = 'tier_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'tier_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'tier_id',
          1 => 'event_id',
          2 => 'level',
          3 => 'available',
          4 => 'benefits',
          5 => 'other_benefits',
          6 => 'ord',
        );

    public $tier_id = NULL;
    public $event_id = NULL;
    public $level = NULL;
    public $title = NULL;
    public $cost = NULL;
    public $available = NULL;
    public $benefits = NULL;
    public $other_benefits = NULL;
    public $ord = NULL;
    public $DBColumnsArray = 
        array (
          'tier_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'event_id' => 
          array (
          ),
          'level' => 
          array (
          ),
          'title' => 
          array (
          ),
          'cost' => 
          array (
          ),
          'available' => 
          array (
          ),
          'benefits' => 
          array (
          ),
          'other_benefits' => 
          array (
          ),
          'ord' => 
          array (
          ),
        );




}

?>