<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in PackagePartner
  */
namespace DBCore\Story;

use phpr\Database\Model;

class PackagePartner extends Model {

    const SCHEMA = 'story';
    const TABLE = 'package_partner';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'package_id',
          1 => 'partner_id',
        );

    public $package_id = NULL;
    public $partner_id = NULL;
    public $DBColumnsArray = 
        array (
          'package_id' => 
          array (
          ),
          'partner_id' => 
          array (
          ),
        );




}

?>