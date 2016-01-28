<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PotmSubmission
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class PotmSubmission extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'potm_submission';
    const AUTO_INCREMENT_COLUMN = 'submission_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'submission_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'submission_id',
          1 => 'submission_type',
          2 => 'first_name',
          3 => 'last_name',
          4 => 'gender',
          5 => 'market_id',
          6 => 'submitter_first_name',
          7 => 'submitter_last_name',
          8 => 'submitter_email',
          9 => 'subscription_offer',
          10 => 'email_offer',
          11 => 'approved',
          12 => 'is_premium',
          13 => 'is_national',
          14 => 'has_approved_email_sent',
          15 => 'is_sponsored',
          16 => 'is_from_bizwomen',
          17 => 'created_at',
          18 => 'updated_at',
        );

    public $submission_id = NULL;
    public $submission_type = NULL;
    public $first_name = NULL;
    public $last_name = NULL;
    public $gender = NULL;
    public $current_employer = NULL;
    public $previous_employer = NULL;
    public $headquarters = NULL;
    public $office = NULL;
    public $office_street_1 = NULL;
    public $office_street_2 = NULL;
    public $office_city = NULL;
    public $office_state = NULL;
    public $office_zip = NULL;
    public $office_phone = NULL;
    public $office_url = NULL;
    public $current_position = NULL;
    public $previous_position = NULL;
    public $position_level = NULL;
    public $position_department = NULL;
    public $board = NULL;
    public $officer = NULL;
    public $summary = NULL;
    public $industry_id = NULL;
    public $industry_other = NULL;
    public $market_id = NULL;
    public $submission_photo_id = NULL;
    public $published_photo_id = NULL;
    public $published_media_id = NULL;
    public $published_media_url = NULL;
    public $published_media_data = NULL;
    public $press_release_id = NULL;
    public $linkedin_url = NULL;
    public $facebook_url = NULL;
    public $twitter_username = NULL;
    public $submitter_first_name = NULL;
    public $submitter_last_name = NULL;
    public $submitter_email = NULL;
    public $submitter_phone = NULL;
    public $additional_email = NULL;
    public $comments = NULL;
    public $subscription_offer = NULL;
    public $email_offer = NULL;
    public $submitted_market = NULL;
    public $approved = NULL;
    public $approved_at = NULL;
    public $issue_date = NULL;
    public $is_premium = NULL;
    public $is_national = NULL;
    public $has_approved_email_sent = NULL;
    public $is_sponsored = NULL;
    public $is_from_bizwomen = NULL;
    public $college_ope_id1 = NULL;
    public $college_ope_id2 = NULL;
    public $college_ope_id3 = NULL;
    public $modified_by = NULL;
    public $ip_address = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $version = NULL;
    public $DBColumnsArray = 
        array (
          'submission_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'submission_type' => 
          array (
          ),
          'first_name' => 
          array (
          ),
          'last_name' => 
          array (
          ),
          'gender' => 
          array (
          ),
          'current_employer' => 
          array (
          ),
          'previous_employer' => 
          array (
          ),
          'headquarters' => 
          array (
          ),
          'office' => 
          array (
          ),
          'office_street_1' => 
          array (
          ),
          'office_street_2' => 
          array (
          ),
          'office_city' => 
          array (
          ),
          'office_state' => 
          array (
          ),
          'office_zip' => 
          array (
          ),
          'office_phone' => 
          array (
          ),
          'office_url' => 
          array (
          ),
          'current_position' => 
          array (
          ),
          'previous_position' => 
          array (
          ),
          'position_level' => 
          array (
          ),
          'position_department' => 
          array (
          ),
          'board' => 
          array (
          ),
          'officer' => 
          array (
          ),
          'summary' => 
          array (
          ),
          'industry_id' => 
          array (
          ),
          'industry_other' => 
          array (
          ),
          'market_id' => 
          array (
          ),
          'submission_photo_id' => 
          array (
          ),
          'published_photo_id' => 
          array (
          ),
          'published_media_id' => 
          array (
          ),
          'published_media_url' => 
          array (
          ),
          'published_media_data' => 
          array (
          ),
          'press_release_id' => 
          array (
          ),
          'linkedin_url' => 
          array (
          ),
          'facebook_url' => 
          array (
          ),
          'twitter_username' => 
          array (
          ),
          'submitter_first_name' => 
          array (
          ),
          'submitter_last_name' => 
          array (
          ),
          'submitter_email' => 
          array (
          ),
          'submitter_phone' => 
          array (
          ),
          'additional_email' => 
          array (
          ),
          'comments' => 
          array (
          ),
          'subscription_offer' => 
          array (
          ),
          'email_offer' => 
          array (
          ),
          'submitted_market' => 
          array (
          ),
          'approved' => 
          array (
          ),
          'approved_at' => 
          array (
          ),
          'issue_date' => 
          array (
          ),
          'is_premium' => 
          array (
          ),
          'is_national' => 
          array (
          ),
          'has_approved_email_sent' => 
          array (
          ),
          'is_sponsored' => 
          array (
          ),
          'is_from_bizwomen' => 
          array (
          ),
          'college_ope_id1' => 
          array (
          ),
          'college_ope_id2' => 
          array (
          ),
          'college_ope_id3' => 
          array (
          ),
          'modified_by' => 
          array (
          ),
          'ip_address' => 
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