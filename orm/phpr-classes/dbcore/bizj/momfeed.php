<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in MomFeed
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class MomFeed extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'mom_feed';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
        );

    public $id = NULL;
    public $custnum = NULL;
    public $altnum = NULL;
    public $lastname = NULL;
    public $firstname = NULL;
    public $company = NULL;
    public $address1 = NULL;
    public $address2 = NULL;
    public $city = NULL;
    public $state = NULL;
    public $zipcode = NULL;
    public $foreign_fld = NULL;
    public $phone = NULL;
    public $comment = NULL;
    public $ctype1 = NULL;
    public $ctype2 = NULL;
    public $ctype3 = NULL;
    public $taxexempt = NULL;
    public $prospect = NULL;
    public $cardtype = NULL;
    public $cardnum = NULL;
    public $expires = NULL;
    public $source_key = NULL;
    public $catalog = NULL;
    public $sales_id = NULL;
    public $oper_id = NULL;
    public $reference = NULL;
    public $shipvia = NULL;
    public $fulfilled = NULL;
    public $paid = NULL;
    public $continued = NULL;
    public $order_date = NULL;
    public $odr_num = NULL;
    public $product01 = NULL;
    public $quantity01 = NULL;
    public $product02 = NULL;
    public $quantity02 = NULL;
    public $product03 = NULL;
    public $quantity03 = NULL;
    public $product04 = NULL;
    public $quantity04 = NULL;
    public $product05 = NULL;
    public $quantity05 = NULL;
    public $slastname = NULL;
    public $sfirstname = NULL;
    public $scompany = NULL;
    public $saddress1 = NULL;
    public $saddress2 = NULL;
    public $scity = NULL;
    public $sstate = NULL;
    public $szipcode = NULL;
    public $holddate = NULL;
    public $paymethod = NULL;
    public $greeting1 = NULL;
    public $greeting2 = NULL;
    public $promocred = NULL;
    public $useprices = NULL;
    public $price01 = NULL;
    public $discount01 = NULL;
    public $price02 = NULL;
    public $discount02 = NULL;
    public $price03 = NULL;
    public $discount03 = NULL;
    public $price04 = NULL;
    public $discount04 = NULL;
    public $price05 = NULL;
    public $discount05 = NULL;
    public $useshipamt = NULL;
    public $shipping = NULL;
    public $email = NULL;
    public $internetid = NULL;
    public $country = NULL;
    public $scountry = NULL;
    public $phone2 = NULL;
    public $sphone = NULL;
    public $sphone2 = NULL;
    public $semail = NULL;
    public $ordertype = NULL;
    public $fld77 = NULL;
    public $fld78 = NULL;
    public $fld79 = NULL;
    public $fld80 = NULL;
    public $fld81 = NULL;
    public $fld82 = NULL;
    public $fld83 = NULL;
    public $fld84 = NULL;
    public $fld85 = NULL;
    public $fld86 = NULL;
    public $fld87 = NULL;
    public $fld88 = NULL;
    public $fld89 = NULL;
    public $batch_id = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'custnum' => 
          array (
          ),
          'altnum' => 
          array (
          ),
          'lastname' => 
          array (
          ),
          'firstname' => 
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
          'zipcode' => 
          array (
          ),
          'foreign_fld' => 
          array (
          ),
          'phone' => 
          array (
          ),
          'comment' => 
          array (
          ),
          'ctype1' => 
          array (
          ),
          'ctype2' => 
          array (
          ),
          'ctype3' => 
          array (
          ),
          'taxexempt' => 
          array (
          ),
          'prospect' => 
          array (
          ),
          'cardtype' => 
          array (
          ),
          'cardnum' => 
          array (
          ),
          'expires' => 
          array (
          ),
          'source_key' => 
          array (
          ),
          'catalog' => 
          array (
          ),
          'sales_id' => 
          array (
          ),
          'oper_id' => 
          array (
          ),
          'reference' => 
          array (
          ),
          'shipvia' => 
          array (
          ),
          'fulfilled' => 
          array (
          ),
          'paid' => 
          array (
          ),
          'continued' => 
          array (
          ),
          'order_date' => 
          array (
          ),
          'odr_num' => 
          array (
          ),
          'product01' => 
          array (
          ),
          'quantity01' => 
          array (
          ),
          'product02' => 
          array (
          ),
          'quantity02' => 
          array (
          ),
          'product03' => 
          array (
          ),
          'quantity03' => 
          array (
          ),
          'product04' => 
          array (
          ),
          'quantity04' => 
          array (
          ),
          'product05' => 
          array (
          ),
          'quantity05' => 
          array (
          ),
          'slastname' => 
          array (
          ),
          'sfirstname' => 
          array (
          ),
          'scompany' => 
          array (
          ),
          'saddress1' => 
          array (
          ),
          'saddress2' => 
          array (
          ),
          'scity' => 
          array (
          ),
          'sstate' => 
          array (
          ),
          'szipcode' => 
          array (
          ),
          'holddate' => 
          array (
          ),
          'paymethod' => 
          array (
          ),
          'greeting1' => 
          array (
          ),
          'greeting2' => 
          array (
          ),
          'promocred' => 
          array (
          ),
          'useprices' => 
          array (
          ),
          'price01' => 
          array (
          ),
          'discount01' => 
          array (
          ),
          'price02' => 
          array (
          ),
          'discount02' => 
          array (
          ),
          'price03' => 
          array (
          ),
          'discount03' => 
          array (
          ),
          'price04' => 
          array (
          ),
          'discount04' => 
          array (
          ),
          'price05' => 
          array (
          ),
          'discount05' => 
          array (
          ),
          'useshipamt' => 
          array (
          ),
          'shipping' => 
          array (
          ),
          'email' => 
          array (
          ),
          'internetid' => 
          array (
          ),
          'country' => 
          array (
          ),
          'scountry' => 
          array (
          ),
          'phone2' => 
          array (
          ),
          'sphone' => 
          array (
          ),
          'sphone2' => 
          array (
          ),
          'semail' => 
          array (
          ),
          'ordertype' => 
          array (
          ),
          'fld77' => 
          array (
          ),
          'fld78' => 
          array (
          ),
          'fld79' => 
          array (
          ),
          'fld80' => 
          array (
          ),
          'fld81' => 
          array (
          ),
          'fld82' => 
          array (
          ),
          'fld83' => 
          array (
          ),
          'fld84' => 
          array (
          ),
          'fld85' => 
          array (
          ),
          'fld86' => 
          array (
          ),
          'fld87' => 
          array (
          ),
          'fld88' => 
          array (
          ),
          'fld89' => 
          array (
          ),
          'batch_id' => 
          array (
          ),
        );




}

?>