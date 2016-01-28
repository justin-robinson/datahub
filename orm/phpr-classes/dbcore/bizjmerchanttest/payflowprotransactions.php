<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PayflowProTransactions
  */
namespace DBCore\BizjmerchantTest;

use phpr\Database\Model;

class PayflowProTransactions extends Model {

    const SCHEMA = 'bizjmerchant_test';
    const TABLE = 'payflow_pro_transactions';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'trxtype',
          2 => 'created_at',
          3 => 'updated_at',
        );

    public $id = NULL;
    public $merchant_transaction_ref_id = NULL;
    public $trxtype = NULL;
    public $action = NULL;
    public $origid = NULL;
    public $origprofileid = NULL;
    public $ref = NULL;
    public $result = NULL;
    public $respmsg = NULL;
    public $amt = NULL;
    public $authcode = NULL;
    public $avs_result = NULL;
    public $raw_request = NULL;
    public $raw_response = NULL;
    public $comment1 = NULL;
    public $comment2 = NULL;
    public $status = NULL;
    public $transstate = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'merchant_transaction_ref_id' => 
          array (
          ),
          'trxtype' => 
          array (
          ),
          'action' => 
          array (
          ),
          'origid' => 
          array (
          ),
          'origprofileid' => 
          array (
          ),
          'ref' => 
          array (
          ),
          'result' => 
          array (
          ),
          'respmsg' => 
          array (
          ),
          'amt' => 
          array (
          ),
          'authcode' => 
          array (
          ),
          'avs_result' => 
          array (
          ),
          'raw_request' => 
          array (
          ),
          'raw_response' => 
          array (
          ),
          'comment1' => 
          array (
          ),
          'comment2' => 
          array (
          ),
          'status' => 
          array (
          ),
          'transstate' => 
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