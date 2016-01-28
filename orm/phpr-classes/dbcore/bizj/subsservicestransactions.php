<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SubsservicesTransactions
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class SubsservicesTransactions extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'subsservices_transactions';
    const AUTO_INCREMENT_COLUMN = 'transaction_uid';
    const PRIMARY_KEYS = 
        array (
          0 => 'transaction_uid',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'transaction_uid',
        );

    public $transaction_uid = NULL;
    public $user_id = NULL;
    public $uin = NULL;
    public $c_time = NULL;
    public $contact_email = NULL;
    public $billing_first_name = NULL;
    public $billing_last_name = NULL;
    public $billing_company = NULL;
    public $billing_address1 = NULL;
    public $billing_address2 = NULL;
    public $billing_city = NULL;
    public $billing_state = NULL;
    public $billing_province = NULL;
    public $billing_postal_code = NULL;
    public $billing_country_code = NULL;
    public $billing_phone = NULL;
    public $purchase_tax = NULL;
    public $purchase_shipping = NULL;
    public $purchase_subtotal = NULL;
    public $purchase_total = NULL;
    public $trans_online_payment = NULL;
    public $cc_processor_id = NULL;
    public $avs_code = NULL;
    public $bank_auth_code = NULL;
    public $cardholder_name = NULL;
    public $cc_number_hidden = NULL;
    public $cc_exp_month = NULL;
    public $cc_exp_year = NULL;
    public $cc_type = NULL;
    public $user_notify = NULL;
    public $admin_notify = NULL;
    public $other_notify = NULL;
    public $cc_postauth = NULL;
    public $notify_of_updates = NULL;
    public $mom_sent = NULL;
    public $ref_code = NULL;
    public $promo_code = NULL;
    public $discount_amount = NULL;
    public $service = NULL;
    public $sub_id = NULL;
    public $term = NULL;
    public $DBColumnsArray = 
        array (
          'transaction_uid' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'user_id' => 
          array (
          ),
          'uin' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'contact_email' => 
          array (
          ),
          'billing_first_name' => 
          array (
          ),
          'billing_last_name' => 
          array (
          ),
          'billing_company' => 
          array (
          ),
          'billing_address1' => 
          array (
          ),
          'billing_address2' => 
          array (
          ),
          'billing_city' => 
          array (
          ),
          'billing_state' => 
          array (
          ),
          'billing_province' => 
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
          'trans_online_payment' => 
          array (
          ),
          'cc_processor_id' => 
          array (
          ),
          'avs_code' => 
          array (
          ),
          'bank_auth_code' => 
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
          'cc_type' => 
          array (
          ),
          'user_notify' => 
          array (
          ),
          'admin_notify' => 
          array (
          ),
          'other_notify' => 
          array (
          ),
          'cc_postauth' => 
          array (
          ),
          'notify_of_updates' => 
          array (
          ),
          'mom_sent' => 
          array (
          ),
          'ref_code' => 
          array (
          ),
          'promo_code' => 
          array (
          ),
          'discount_amount' => 
          array (
          ),
          'service' => 
          array (
          ),
          'sub_id' => 
          array (
          ),
          'term' => 
          array (
          ),
        );




}

?>