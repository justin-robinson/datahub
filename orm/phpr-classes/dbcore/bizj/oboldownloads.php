<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OBolDownloads
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OBolDownloads extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'o_bol_downloads';
    const AUTO_INCREMENT_COLUMN = 'download_uid';
    const PRIMARY_KEYS = 
        array (
          0 => 'download_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'download_uid',
        );

    public $download_uid = NULL;
    public $date = NULL;
    public $cc_processor_id = NULL;
    public $ip = NULL;
    public $user_agent = NULL;
    public $product_uid = NULL;
    public $filename = NULL;
    public $status = NULL;
    public $DBColumnsArray = 
        array (
          'download_uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'date' => 
          array (
          ),
          'cc_processor_id' => 
          array (
          ),
          'ip' => 
          array (
          ),
          'user_agent' => 
          array (
          ),
          'product_uid' => 
          array (
          ),
          'filename' => 
          array (
          ),
          'status' => 
          array (
          ),
        );




}

?>