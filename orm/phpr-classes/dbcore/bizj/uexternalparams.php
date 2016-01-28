<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in UExternalParams
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class UExternalParams extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'u_external_params';
    const AUTO_INCREMENT_COLUMN = 'external_param_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'external_param_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'external_param_id',
          1 => 'external_auth_id',
          2 => 'param_key',
        );

    public $external_param_id = NULL;
    public $external_auth_id = NULL;
    public $param_key = NULL;
    public $param_value = NULL;
    public $DBColumnsArray = 
        array (
          'external_param_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'external_auth_id' => 
          array (
          ),
          'param_key' => 
          array (
          ),
          'param_value' => 
          array (
          ),
        );




}

?>