<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in BisonAds
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class BisonAds extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'bison_ads';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $link = NULL;
    public $image_url = NULL;
    public $description = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
          ),
          'link' => 
          array (
          ),
          'image_url' => 
          array (
          ),
          'description' => 
          array (
          ),
        );




}

?>