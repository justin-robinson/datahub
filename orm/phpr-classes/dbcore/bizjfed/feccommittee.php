<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in FecCommittee
  */
namespace DBCore\Bizjfed;

use phpr\Database\Model;

class FecCommittee extends Model {

    const SCHEMA = 'bizjfed';
    const TABLE = 'fec_committee';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'committee_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'committee_id',
        );

    public $committee_id = NULL;
    public $race = NULL;
    public $committee_name = NULL;
    public $treasurer_name = NULL;
    public $street1 = NULL;
    public $street2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zip_code = NULL;
    public $designation = NULL;
    public $committee_type = NULL;
    public $party = NULL;
    public $frequency = NULL;
    public $category = NULL;
    public $connected_org_name = NULL;
    public $candidate_id = NULL;
    public $DBColumnsArray = 
        array (
          'committee_id' => 
          array (
            0 => 1,
          ),
          'race' => 
          array (
          ),
          'committee_name' => 
          array (
          ),
          'treasurer_name' => 
          array (
          ),
          'street1' => 
          array (
          ),
          'street2' => 
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
          'designation' => 
          array (
          ),
          'committee_type' => 
          array (
          ),
          'party' => 
          array (
          ),
          'frequency' => 
          array (
          ),
          'category' => 
          array (
          ),
          'connected_org_name' => 
          array (
          ),
          'candidate_id' => 
          array (
          ),
        );




}

?>