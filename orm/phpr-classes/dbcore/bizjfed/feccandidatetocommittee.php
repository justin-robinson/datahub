<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FecCandidateToCommittee
  */
namespace DBCore\Bizjfed;

use phpr\Database\Model;

class FecCandidateToCommittee extends Model {

    const SCHEMA = 'bizjfed';
    const TABLE = 'fec_candidate_to_committee';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
        );

    public $candidate_id = NULL;
    public $race = NULL;
    public $candidate_election_year = NULL;
    public $fec_election_year = NULL;
    public $committee_id = NULL;
    public $committee_type = NULL;
    public $committee_designation = NULL;
    public $linkage_id = NULL;
    public $DBColumnsArray = 
        array (
          'candidate_id' => 
          array (
          ),
          'race' => 
          array (
          ),
          'candidate_election_year' => 
          array (
          ),
          'fec_election_year' => 
          array (
          ),
          'committee_id' => 
          array (
          ),
          'committee_type' => 
          array (
          ),
          'committee_designation' => 
          array (
          ),
          'linkage_id' => 
          array (
          ),
        );




}

?>