<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in AudienceEmailSignup
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class AudienceEmailSignup extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'audience_email_signup';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'user_id',
          2 => 'product_id',
          3 => 'sales_territory',
          4 => 'created_at',
          5 => 'updated_at',
        );

    public $id = NULL;
    public $user_id = NULL;
    public $product_id = NULL;
    public $sales_territory = NULL;
    public $request_id = NULL;
    public $optin_at = NULL;
    public $optout_at = NULL;
    public $source = NULL;
    public $communication_type = NULL;
    public $email = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'product_id' => 
          array (
          ),
          'sales_territory' => 
          array (
          ),
          'request_id' => 
          array (
          ),
          'optin_at' => 
          array (
          ),
          'optout_at' => 
          array (
          ),
          'source' => 
          array (
          ),
          'communication_type' => 
          array (
          ),
          'email' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );




}

?>