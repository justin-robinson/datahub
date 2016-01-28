<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in CommitteeContributions
  */
namespace DBCore\Bizjfed;

use phpr\Database\Model;

class CommitteeContributions extends Model {

    const SCHEMA = 'bizjfed';
    const TABLE = 'committee_contributions';
    const AUTO_INCREMENT_COLUMN = 'record_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'record_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'record_id',
          1 => 'sub_id',
          2 => 'created_at',
          3 => 'updated_at',
        );

    public $record_id = NULL;
    public $recipient_committee_id = NULL;
    public $recipient_candidate_id = NULL;
    public $giving_committee_id = NULL;
    public $race = NULL;
    public $amendment_indicator = NULL;
    public $report_type = NULL;
    public $transaction_pgi = NULL;
    public $image_num = NULL;
    public $transaction_type = NULL;
    public $entity_type = NULL;
    public $entity_name = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip_code = NULL;
    public $employer = NULL;
    public $occupation = NULL;
    public $transaction_date = NULL;
    public $transaction_amount = NULL;
    public $transaction_id = NULL;
    public $file_number = NULL;
    public $memo_code = NULL;
    public $memo_text = NULL;
    public $sub_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'record_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'recipient_committee_id' => 
          array (
          ),
          'recipient_candidate_id' => 
          array (
          ),
          'giving_committee_id' => 
          array (
          ),
          'race' => 
          array (
          ),
          'amendment_indicator' => 
          array (
          ),
          'report_type' => 
          array (
          ),
          'transaction_pgi' => 
          array (
          ),
          'image_num' => 
          array (
          ),
          'transaction_type' => 
          array (
          ),
          'entity_type' => 
          array (
          ),
          'entity_name' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'zip_code' => 
          array (
          ),
          'employer' => 
          array (
          ),
          'occupation' => 
          array (
          ),
          'transaction_date' => 
          array (
          ),
          'transaction_amount' => 
          array (
          ),
          'transaction_id' => 
          array (
          ),
          'file_number' => 
          array (
          ),
          'memo_code' => 
          array (
          ),
          'memo_text' => 
          array (
          ),
          'sub_id' => 
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