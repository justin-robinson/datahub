<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EmailBatchSummary
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EmailBatchSummary extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'email_batch_summary';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'batch_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'batch_id',
        );

    public $batch_id = NULL;
    public $total_sent = NULL;
    public $open_count = NULL;
    public $send_date = NULL;
    public $unique_clickers = NULL;
    public $DBColumnsArray = 
        array (
          'batch_id' => 
          array (
            0 => 1,
          ),
          'total_sent' => 
          array (
          ),
          'open_count' => 
          array (
          ),
          'send_date' => 
          array (
          ),
          'unique_clickers' => 
          array (
          ),
        );




}

?>