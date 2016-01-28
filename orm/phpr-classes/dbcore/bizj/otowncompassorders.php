<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in OTowncompassOrders
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class OTowncompassOrders extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'o_towncompass_orders';
    const AUTO_INCREMENT_COLUMN = 'tc_order_uid';
    const PRIMARY_KEYS = 
        array (
          0 => 'tc_order_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'tc_order_uid',
        );

    public $tc_order_uid = NULL;
    public $user_id = NULL;
    public $contact_email = NULL;
    public $billing_full_name = NULL;
    public $billing_company = NULL;
    public $billing_address_1 = NULL;
    public $billing_address_2 = NULL;
    public $billing_city = NULL;
    public $billing_state = NULL;
    public $billing_postal_code = NULL;
    public $billing_country_code = NULL;
    public $billing_phone = NULL;
    public $purchase_tax = NULL;
    public $purchase_shipping = NULL;
    public $purchase_subtotal = NULL;
    public $purchase_total = NULL;
    public $avs_code = NULL;
    public $bank_auth_code = NULL;
    public $purchase_time = NULL;
    public $cardholder_name = NULL;
    public $cc_number_hidden = NULL;
    public $cc_exp_month = NULL;
    public $cc_exp_year = NULL;
    public $cybercash_order_id = NULL;
    public $cc_type = NULL;
    public $online_payment = NULL;
    public $user_notify = NULL;
    public $admin_notify = NULL;
    public $cybercash_postauth = NULL;
    public $DBColumnsArray = 
        array (
          'tc_order_uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'contact_email' => 
          array (
          ),
          'billing_full_name' => 
          array (
          ),
          'billing_company' => 
          array (
          ),
          'billing_address_1' => 
          array (
          ),
          'billing_address_2' => 
          array (
          ),
          'billing_city' => 
          array (
          ),
          'billing_state' => 
          array (
          ),
          'billing_postal_code' => 
          array (
          ),
          'billing_country_code' => 
          array (
          ),
          'billing_phone' => 
          array (
          ),
          'purchase_tax' => 
          array (
          ),
          'purchase_shipping' => 
          array (
          ),
          'purchase_subtotal' => 
          array (
          ),
          'purchase_total' => 
          array (
          ),
          'avs_code' => 
          array (
          ),
          'bank_auth_code' => 
          array (
          ),
          'purchase_time' => 
          array (
          ),
          'cardholder_name' => 
          array (
          ),
          'cc_number_hidden' => 
          array (
          ),
          'cc_exp_month' => 
          array (
          ),
          'cc_exp_year' => 
          array (
          ),
          'cybercash_order_id' => 
          array (
          ),
          'cc_type' => 
          array (
          ),
          'online_payment' => 
          array (
          ),
          'user_notify' => 
          array (
          ),
          'admin_notify' => 
          array (
          ),
          'cybercash_postauth' => 
          array (
          ),
        );




}

?>