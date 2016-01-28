<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BizspacePropertyBrokerMap
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class BizspacePropertyBrokerMap extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'bizspace_property_broker_map';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'property_id',
          1 => 'broker_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'property_id',
          1 => 'broker_id',
          2 => 'created_at',
          3 => 'updated_at',
        );

    public $property_id = NULL;
    public $broker_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $display_order = NULL;
    public $DBColumnsArray = 
        array (
          'property_id' => 
          array (
            0 => 1,
          ),
          'broker_id' => 
          array (
            0 => 1,
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'display_order' => 
          array (
          ),
        );




}

?>