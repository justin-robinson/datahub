<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in IDirectoryListingCategory
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class IDirectoryListingCategory extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'i_directory_listing_category';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'listing_id',
          1 => 'category_id',
        );

    public $listing_id = NULL;
    public $category_id = NULL;
    public $DBColumnsArray = 
        array (
          'listing_id' => 
          array (
          ),
          'category_id' => 
          array (
          ),
        );




}

?>