<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in VidaveeMarketVideos
  */
namespace DBCore\Story;

use phpr\Database\Model;

class VidaveeMarketVideos extends Model {

    const SCHEMA = 'story';
    const TABLE = 'vidavee_market_videos';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'market',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'market',
        );

    public $id = NULL;
    public $market = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
          ),
          'market' => 
          array (
            0 => 1,
          ),
        );




}

?>