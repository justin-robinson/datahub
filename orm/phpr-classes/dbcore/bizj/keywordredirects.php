<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in KeywordRedirects
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class KeywordRedirects extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'keyword_redirects';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'keyword',
          1 => 'location',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'keyword',
          1 => 'location',
          2 => 'url',
        );

    public $keyword = NULL;
    public $location = NULL;
    public $url = NULL;
    public $DBColumnsArray = 
        array (
          'keyword' => 
          array (
            0 => 1,
          ),
          'location' => 
          array (
            0 => 1,
          ),
          'url' => 
          array (
          ),
        );




}

?>