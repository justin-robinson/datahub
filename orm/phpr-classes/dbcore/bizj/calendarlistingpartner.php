<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CalendarListingPartner
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class CalendarListingPartner extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'calendar_listing_partner';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'partner_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'partner_id',
          1 => 'is_active',
          2 => 'created_at',
          3 => 'updated_at',
        );

    public $partner_id = NULL;
    public $partner_name = NULL;
    public $is_active = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'partner_id' => 
          array (
            0 => 1,
          ),
          'partner_name' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>