<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in JobProviderCareerbuilderListingCategory
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class JobProviderCareerbuilderListingCategory extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'job_provider_careerbuilder_listing_category';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'job_listing_id',
          1 => 'category_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'job_listing_id',
          1 => 'category_id',
        );

    public $job_listing_id = NULL;
    public $category_id = NULL;
    public $DBColumnsArray = 
        array (
          'job_listing_id' => 
          array (
            0 => 1,
          ),
          'category_id' => 
          array (
            0 => 1,
          ),
        );




}

?>