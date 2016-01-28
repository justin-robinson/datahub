<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SmbcResources
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SmbcResources extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'smbc_resources';
    const AUTO_INCREMENT_COLUMN = 'resource_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'resource_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'resource_id',
          1 => 'market',
          2 => 'link_url',
          3 => 'c_or_m_time',
          4 => 'display_order',
        );

    public $resource_id = NULL;
    public $market = NULL;
    public $link_url = NULL;
    public $link_text = NULL;
    public $c_or_m_time = NULL;
    public $display_order = NULL;
    public $DBColumnsArray = 
        array (
          'resource_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market' => 
          array (
          ),
          'link_url' => 
          array (
          ),
          'link_text' => 
          array (
          ),
          'c_or_m_time' => 
          array (
          ),
          'display_order' => 
          array (
          ),
        );




}

?>