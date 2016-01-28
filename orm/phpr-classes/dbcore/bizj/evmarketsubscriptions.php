<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EvMarketSubscriptions
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EvMarketSubscriptions extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ev_market_subscriptions';
    const AUTO_INCREMENT_COLUMN = 'subscription_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'subscription_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'subscription_id',
          1 => 'market',
          2 => 'first_name',
          3 => 'last_name',
          4 => 'company',
          5 => 'address1',
          6 => 'address2',
          7 => 'city',
          8 => 'state',
          9 => 'province',
          10 => 'zip',
          11 => 'country',
          12 => 'email',
          13 => 'phone_number',
          14 => 'campaign_code',
          15 => 'source_code',
          16 => 'sales_territory',
          17 => 'opt_in_date',
        );

    public $subscription_id = NULL;
    public $market = NULL;
    public $first_name = NULL;
    public $last_name = NULL;
    public $company = NULL;
    public $address1 = NULL;
    public $address2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $province = NULL;
    public $zip = NULL;
    public $country = NULL;
    public $email = NULL;
    public $phone_number = NULL;
    public $campaign_code = NULL;
    public $source_code = NULL;
    public $sales_territory = NULL;
    public $opt_in_date = NULL;
    public $DBColumnsArray = 
        array (
          'subscription_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'market' => 
          array (
          ),
          'first_name' => 
          array (
          ),
          'last_name' => 
          array (
          ),
          'company' => 
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
          'province' => 
          array (
          ),
          'zip' => 
          array (
          ),
          'country' => 
          array (
          ),
          'email' => 
          array (
          ),
          'phone_number' => 
          array (
          ),
          'campaign_code' => 
          array (
          ),
          'source_code' => 
          array (
          ),
          'sales_territory' => 
          array (
          ),
          'opt_in_date' => 
          array (
          ),
        );




}

?>