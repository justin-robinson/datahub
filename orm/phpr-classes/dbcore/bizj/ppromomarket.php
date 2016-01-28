<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PPromoMarket
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PPromoMarket extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'p_promo_market';
    const AUTO_INCREMENT_COLUMN = 'promo_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'promo_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'promo_id',
          1 => 'm_time',
        );

    public $promo_id = NULL;
    public $market = NULL;
    public $headline = NULL;
    public $color_id = NULL;
    public $start_date = NULL;
    public $end_date = NULL;
    public $promo_text = NULL;
    public $m_time = NULL;
    public $link_url = NULL;
    public $link_name = NULL;
    public $image = NULL;
    public $DBColumnsArray = 
        array (
          'promo_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'color_id' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'end_date' => 
          array (
          ),
          'promo_text' => 
          array (
          ),
          'm_time' => 
          array (
          ),
          'link_url' => 
          array (
          ),
          'link_name' => 
          array (
          ),
          'image' => 
          array (
          ),
        );




}

?>