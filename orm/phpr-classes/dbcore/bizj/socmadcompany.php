<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SocmadCompany
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SocmadCompany extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'socmad_company';
    const AUTO_INCREMENT_COLUMN = 'socmad_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'socmad_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'socmad_id',
          1 => 'market_id',
          2 => 'year',
          3 => 'status_id',
          4 => 'is_locked',
          5 => 'is_suspect',
          6 => 'user_id',
          7 => 'size_category',
          8 => 'size_id',
          9 => 'country',
          10 => 'has_accepted_terms',
          11 => 'submitter_ip',
          12 => 'submitted_from',
          13 => 'local_seed_number',
          14 => 'national_seed_number',
          15 => 'modified_by',
          16 => 'created_at',
          17 => 'updated_at',
        );

    public $socmad_id = NULL;
    public $market_id = NULL;
    public $year = NULL;
    public $dup_socmad_id = NULL;
    public $status_id = NULL;
    public $reason_text = NULL;
    public $is_locked = NULL;
    public $is_suspect = NULL;
    public $user_id = NULL;
    public $first_name = NULL;
    public $last_name = NULL;
    public $email = NULL;
    public $phone = NULL;
    public $company_name = NULL;
    public $size_category = NULL;
    public $size_id = NULL;
    public $refinery_id = NULL;
    public $address1 = NULL;
    public $address2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $country = NULL;
    public $postal_code = NULL;
    public $charity_name = NULL;
    public $web_url = NULL;
    public $facebook_url = NULL;
    public $facebook_id = NULL;
    public $twitter_url = NULL;
    public $twitter_id = NULL;
    public $linkedin_url = NULL;
    public $linkedin_id = NULL;
    public $gplus_url = NULL;
    public $gplus_id = NULL;
    public $has_accepted_terms = NULL;
    public $acknowledged_at = NULL;
    public $submitter_ip = NULL;
    public $submitted_from = NULL;
    public $local_seed_number = NULL;
    public $national_seed_number = NULL;
    public $modified_by = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $version = NULL;
    public $DBColumnsArray = 
        array (
          'socmad_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market_id' => 
          array (
          ),
          'year' => 
          array (
          ),
          'dup_socmad_id' => 
          array (
          ),
          'status_id' => 
          array (
          ),
          'reason_text' => 
          array (
          ),
          'is_locked' => 
          array (
          ),
          'is_suspect' => 
          array (
          ),
          'user_id' => 
          array (
          ),
          'first_name' => 
          array (
          ),
          'last_name' => 
          array (
          ),
          'email' => 
          array (
          ),
          'phone' => 
          array (
          ),
          'company_name' => 
          array (
          ),
          'size_category' => 
          array (
          ),
          'size_id' => 
          array (
          ),
          'refinery_id' => 
          array (
          ),
          'address1' => 
          array (
          ),
          'address2' => 
          array (
          ),
          'city' => 
          array (
          ),
          'state' => 
          array (
          ),
          'country' => 
          array (
          ),
          'postal_code' => 
          array (
          ),
          'charity_name' => 
          array (
          ),
          'web_url' => 
          array (
          ),
          'facebook_url' => 
          array (
          ),
          'facebook_id' => 
          array (
          ),
          'twitter_url' => 
          array (
          ),
          'twitter_id' => 
          array (
          ),
          'linkedin_url' => 
          array (
          ),
          'linkedin_id' => 
          array (
          ),
          'gplus_url' => 
          array (
          ),
          'gplus_id' => 
          array (
          ),
          'has_accepted_terms' => 
          array (
          ),
          'acknowledged_at' => 
          array (
          ),
          'submitter_ip' => 
          array (
          ),
          'submitted_from' => 
          array (
          ),
          'local_seed_number' => 
          array (
          ),
          'national_seed_number' => 
          array (
          ),
          'modified_by' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
          'version' => 
          array (
          ),
        );




}

?>