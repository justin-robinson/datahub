<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in JobListing
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class JobListing extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'job_listing';
    const AUTO_INCREMENT_COLUMN = 'job_listing_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'job_listing_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'job_listing_id',
          1 => 'is_active',
          2 => 'is_paid',
          3 => 'is_premium',
          4 => 'is_direct_link',
          5 => 'listing_duration',
          6 => 'company_name',
          7 => 'job_title',
          8 => 'job_type',
          9 => 'can_telecommute',
          10 => 'experience',
          11 => 'application_type',
          12 => 'view_count',
          13 => 'apply_count',
          14 => 'created_at',
          15 => 'updated_at',
          16 => 'is_external',
        );

    public $job_listing_id = NULL;
    public $user_id = NULL;
    public $is_active = NULL;
    public $is_paid = NULL;
    public $is_premium = NULL;
    public $is_direct_link = NULL;
    public $start_date = NULL;
    public $listing_duration = NULL;
    public $expires_at = NULL;
    public $renewed_at = NULL;
    public $company_name = NULL;
    public $company_description = NULL;
    public $company_url = NULL;
    public $job_zip_code = NULL;
    public $national_location_info = NULL;
    public $job_title = NULL;
    public $job_type = NULL;
    public $can_telecommute = NULL;
    public $job_description = NULL;
    public $experience = NULL;
    public $hire_date_info = NULL;
    public $salary_info = NULL;
    public $bonus_info = NULL;
    public $application_type = NULL;
    public $application_email = NULL;
    public $application_url = NULL;
    public $application_info = NULL;
    public $view_count = NULL;
    public $apply_count = NULL;
    public $image_id = NULL;
    public $admin_notes = NULL;
    public $job_package_id = NULL;
    public $created_by_ip = NULL;
    public $updated_by = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $job_url = NULL;
    public $originating_market = NULL;
    public $salesman = NULL;
    public $manual_sold_total = NULL;
    public $external_identifier = NULL;
    public $is_external = NULL;
    public $DBColumnsArray = 
        array (
          'job_listing_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'is_paid' => 
          array (
          ),
          'is_premium' => 
          array (
          ),
          'is_direct_link' => 
          array (
          ),
          'start_date' => 
          array (
          ),
          'listing_duration' => 
          array (
          ),
          'expires_at' => 
          array (
          ),
          'renewed_at' => 
          array (
          ),
          'company_name' => 
          array (
          ),
          'company_description' => 
          array (
          ),
          'company_url' => 
          array (
          ),
          'job_zip_code' => 
          array (
          ),
          'national_location_info' => 
          array (
          ),
          'job_title' => 
          array (
          ),
          'job_type' => 
          array (
          ),
          'can_telecommute' => 
          array (
          ),
          'job_description' => 
          array (
          ),
          'experience' => 
          array (
          ),
          'hire_date_info' => 
          array (
          ),
          'salary_info' => 
          array (
          ),
          'bonus_info' => 
          array (
          ),
          'application_type' => 
          array (
          ),
          'application_email' => 
          array (
          ),
          'application_url' => 
          array (
          ),
          'application_info' => 
          array (
          ),
          'view_count' => 
          array (
          ),
          'apply_count' => 
          array (
          ),
          'image_id' => 
          array (
          ),
          'admin_notes' => 
          array (
          ),
          'job_package_id' => 
          array (
          ),
          'created_by_ip' => 
          array (
          ),
          'updated_by' => 
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
          'job_url' => 
          array (
          ),
          'originating_market' => 
          array (
          ),
          'salesman' => 
          array (
          ),
          'manual_sold_total' => 
          array (
          ),
          'external_identifier' => 
          array (
          ),
          'is_external' => 
          array (
          ),
        );




}

?>