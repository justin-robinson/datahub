<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FecOperatingExpenditures
  */
namespace DBCore\Bizjfed;

use phpr\Database\Model;

class FecOperatingExpenditures extends Model {

    const SCHEMA = 'bizjfed';
    const TABLE = 'fec_operating_expenditures';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'sub_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'committee_id',
          1 => 'sub_id',
        );

    public $committee_id = NULL;
    public $race = NULL;
    public $amendment_indicator = NULL;
    public $report_year = NULL;
    public $report_type = NULL;
    public $image_num = NULL;
    public $line_num = NULL;
    public $form_type = NULL;
    public $schedule_type = NULL;
    public $contributor_name = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip_code = NULL;
    public $transaction_date = NULL;
    public $transaction_amount = NULL;
    public $transaction_pgi = NULL;
    public $purpose = NULL;
    public $category = NULL;
    public $category_desc = NULL;
    public $memo_code = NULL;
    public $memo_text = NULL;
    public $entity_type = NULL;
    public $sub_id = NULL;
    public $file_num = NULL;
    public $transaction_id = NULL;
    public $back_ref_transaction_id = NULL;
    public $DBColumnsArray = 
        array (
          'committee_id' => 
          array (
          ),
          'race' => 
          array (
          ),
          'amendment_indicator' => 
          array (
          ),
          'report_year' => 
          array (
          ),
          'report_type' => 
          array (
          ),
          'image_num' => 
          array (
          ),
          'line_num' => 
          array (
          ),
          'form_type' => 
          array (
          ),
          'schedule_type' => 
          array (
          ),
          'contributor_name' => 
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
          'transaction_date' => 
          array (
          ),
          'transaction_amount' => 
          array (
          ),
          'transaction_pgi' => 
          array (
          ),
          'purpose' => 
          array (
          ),
          'category' => 
          array (
          ),
          'category_desc' => 
          array (
          ),
          'memo_code' => 
          array (
          ),
          'memo_text' => 
          array (
          ),
          'entity_type' => 
          array (
          ),
          'sub_id' => 
          array (
            0 => 1,
          ),
          'file_num' => 
          array (
          ),
          'transaction_id' => 
          array (
          ),
          'back_ref_transaction_id' => 
          array (
          ),
        );




}

?>