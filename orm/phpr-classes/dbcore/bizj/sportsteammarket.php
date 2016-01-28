<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SportsTeamMarket
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SportsTeamMarket extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'sports_team_market';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'team_id',
        );

    public $id = NULL;
    public $team_id = NULL;
    public $league = NULL;
    public $name = NULL;
    public $market = NULL;
    public $c_time = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'team_id' => 
          array (
          ),
          'league' => 
          array (
          ),
          'name' => 
          array (
          ),
          'market' => 
          array (
          ),
          'c_time' => 
          array (
          ),
        );




}

?>