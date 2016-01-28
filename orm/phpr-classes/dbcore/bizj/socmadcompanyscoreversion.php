<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SocmadCompanyScoreVersion
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SocmadCompanyScoreVersion extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'socmad_company_score_version';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
          1 => 'version',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'socmad_id',
          2 => 'round_id',
          3 => 'snapshot_id',
          4 => 'baseline_snapshot_id',
          5 => 'facebook_score',
          6 => 'twitter_score',
          7 => 'linkedin_score',
          8 => 'gplus_score',
          9 => 'votes_score',
          10 => 'total_score',
          11 => 'total_score_delta',
          12 => 'created_at',
          13 => 'updated_at',
          14 => 'version',
        );

    public $id = NULL;
    public $socmad_id = NULL;
    public $round_id = NULL;
    public $snapshot_id = NULL;
    public $baseline_snapshot_id = NULL;
    public $facebook_score = NULL;
    public $twitter_score = NULL;
    public $linkedin_score = NULL;
    public $gplus_score = NULL;
    public $votes_score = NULL;
    public $total_score = NULL;
    public $total_score_delta = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $version = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'socmad_id' => 
          array (
          ),
          'round_id' => 
          array (
          ),
          'snapshot_id' => 
          array (
          ),
          'baseline_snapshot_id' => 
          array (
          ),
          'facebook_score' => 
          array (
          ),
          'twitter_score' => 
          array (
          ),
          'linkedin_score' => 
          array (
          ),
          'gplus_score' => 
          array (
          ),
          'votes_score' => 
          array (
          ),
          'total_score' => 
          array (
          ),
          'total_score_delta' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'version' => 
          array (
            0 => 1,
          ),
        );




}

?>