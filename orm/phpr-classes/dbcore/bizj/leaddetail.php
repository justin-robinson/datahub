<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in LeadDetail
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class LeadDetail extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'lead_detail';
    const AUTO_INCREMENT_COLUMN = 'lead_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'lead_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'lead_id',
          1 => 'market_id',
          2 => 'issue_date',
          3 => 'type_code',
          4 => 'proof_uid',
          5 => 'is_active',
          6 => 'ord',
          7 => 'created_at',
          8 => 'updated_at',
        );

    public $lead_id = NULL;
    public $market_id = NULL;
    public $issue_date = NULL;
    public $type_code = NULL;
    public $subtype = NULL;
    public $juris_id = NULL;
    public $display_data = NULL;
    public $proof_uid = NULL;
    public $is_active = NULL;
    public $ord = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'lead_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market_id' => 
          array (
          ),
          'issue_date' => 
          array (
          ),
          'type_code' => 
          array (
          ),
          'subtype' => 
          array (
          ),
          'juris_id' => 
          array (
          ),
          'display_data' => 
          array (
          ),
          'proof_uid' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'ord' => 
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