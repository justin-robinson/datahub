<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FecCandidateStatusMeta
  */
namespace DBCore\Bizjfed;

use phpr\Database\Model;

class FecCandidateStatusMeta extends Model {

    const SCHEMA = 'bizjfed';
    const TABLE = 'fec_candidate_status_meta';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'status',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'status',
        );

    public $status = NULL;
    public $description = NULL;
    public $DBColumnsArray = 
        array (
          'status' => 
          array (
            0 => 1,
          ),
          'description' => 
          array (
          ),
        );




}

?>