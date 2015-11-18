<?php

namespace Services\Bizjmerchant;

use Services\AbstractService;

/**
 * Interface with Bizjournals Merchant Services
 */
class MerchantService extends AbstractService
{
    protected $transactionId = null;

    /**
     * Set transaction ID
     *
     * @access public
     * @param string transaction id
     */
    public function setTransactionId($transactionId = '')
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * Get transaction id set on this instance
     *
     * @access public
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Create merchant transaction record
     * API result has keys success=BOOL, duplicate=BOOL, message
     *
     * Success:
     *  Merchant Transaction Reference has been created
     *
     * Error:
     *  MTR already exists
     *  Invalid payment process type
     *  Invoice missing
     *  Invalid amount
     *  Internal error
     *
     * @access public
     * @param array $invoice - from $this->createInvoice
     * @param array $params - can contain:
     *     billing_first, billing_last, billing_company, billing_address1, billing_city, billing_state, billing_province,
     *     billing_zip, billing_email, billing_phone, billing_country
     *     payment_process_type, payment_amount,
     *     success_url, cancel_url, error_url,
     *     template_vars [as json string], omniture_config, use_mobile_template, collect_shipping_address
     * @return array
     */
    public function createMTR(array $invoice, array $params)
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        $params['invoice'] = json_encode($invoice);

        $result = $this->getClient()->post('mtr/create', $this->transactionId, $params);
        return $result;
    }

    /**
     * Get info on merchant transaction record
     *
     * @access public
     * @return false|array
     */
    public function getMTRInfo()
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        $result = $this->getClient()->post('mtr/getInfo', $this->transactionId, array());
        $transactionId = sprintf('%020d', $this->transactionId);
        // API result has keys success=BOOL, data=ARRAY
        return (isset($result['data'][$transactionId])) ?
                $result['data'][$transactionId] : false;
    }

    /**
     * Get payment url
     *
     * @access public
     * @return string
     */
    public function getPaymentURL()
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        return $this->getClient()->getFrontendUrl('payment/restart', $this->transactionId, array());
    }


    /**
     * Return the signature
     *
     * Example use would be on the thank you page...
     * compare the generated signature with the signature sent into the thank you page
     *
     * @access public
     * @param string transactionId
     * @return string
     */
    public function getSignature($params = array())
    {
        return $this->getClient()->getSignature($params);
    }

    /**
     * Not tested after porting
     *
     * @access public
     * @return string
     */
    public function getTransactionCCNumber()
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        $result = $this->getMTRInfo();
        if ($result === false) {
            return false;
        }

        if (!isset($result['authorizing_pfp_index'])
            || !isset($result['pfp_transactions'][$result['authorizing_pfp_index']])) {
            throw new MerchantException("Transaction $transactionId no cc log authorizing trans found");
        }

        $authorizingPFPTransaction = $result['pfp_transactions'][$result['authorizing_pfp_index']];

        $requestData = json_decode($authorizingPFPTransaction['raw_request'], true);
        return $requestData['ACCT'];
    }


    /**
     * Not tested after porting
     *
     * $result is array with success = BOOL, message
     *
     * Success:
     *  Settlement of transaction has already been cancelled
     *  Settlement of transaction has been cancelled
     *
     * Error:
     *  Merchant Transaction Reference not found
     *  Transaction already settled
     *  Transaction is being settled
     *  Internal error
     *
     * @access public
     * @return array
     */
    public function cancelSettlement()
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        $result = $this->getClient()->post('mtr/cancelSettlement', $this->transactionId, $params);
        return $result;
    }

    /**
     * Not tested after porting
     *
     * Returns array with success=BOOL, duplicate=BOOL, message, data, credit_reference, reference
     *
     * Success:
     *  credit already processed
     *  full credit processed
     *  $[X] credit processed
     *
     * Error:
     *  Validation error [data will contain errors]
     *  Merchant Transaction Reference not found
     *  payment not processed yet
     *  payment not settled yet
     *  unable to get lock
     *  communication error
     *  credit unsuccessful: [REASON]
     *  Internal error
     *
     * @access public
     * @param string refund amount
     * @param string refund id
     * @return array
     */
    public function creditAmount($refundAmount, $refundId)
    {
        if (empty($this->transactionId)) {
            throw new MerchantException('Transaction ID must be set to use this method.');
        }

        $params = array(
            'transaction_id' => 'refund-' . $refundId,
            'credit_amount'  => sprintf('%.02f', $refundAmount),
        );

        $result = $this->getClient()->post('credit/creditAmount', $this->transactionId, $params);
        return $result;
    }

     /**
     * Not tested after porting
     *
     * Success:
     *  credit already processed
     *  full credit processed
     *  $[X] credit processed
     *
     * Error:
     *  Validation error [data will contain errors]
     *  Merchant Transaction Reference not found
     *  payment not processed yet
     *  payment not settled yet
     *  unable to get lock
     *  communication error
     *  credit unsuccessful: [REASON]
     *  Internal error
     *
     * @access public
     * @param string refund id
     * @return array
     */
    public static function credit($refundId)
    {
        $params = array(
            'transaction_id' => 'refund-' . $refundId,
        );

        $result = $this->getClient()->post('credit/credit', $this->transactionId, $params);
        return $result;
    }

    /**
     * Not tested after porting
     *
     * Returns array with success=BOOL, message, data, duplicate, authorization_reference
     *
     * Success:
     *  payment already processed
     *  payment processed
     *
     * Error:
     *  Validation error [data will contain errors]
     *  Merchant Transaction Reference not found
     *  unable to get lock
     *  communication error
     *  authorization unsuccessful: [REASON]
     *  authorization unsuccessful: CSC does not match
     *  capture unsuccessful: [REASON]
     *  Internal error
     *
     * @access public
     * @param string payment amount
     * @param array billing data with keys billing_first, billing_last, billing_address1,
     *                  billing_zip, billing_phone
     * @param array credit card data with keys cc_number, cc_exp_month, cc_exp_year, cc_csc
     * @return array
     */
    public function payment($paymentAmount, $billingData, $ccData)
    {
        $params = array(
            'payment_amount'   => sprintf('%.02f', $paymentAmount),
            'billing_first'    => $billingData['billing_first'],
            'billing_last'     => $billingData['billing_last'],
            'billing_address1' => $billingData['billing_address1'],
            'billing_zip'      => $billingData['billing_zip'],
            'billing_phone'    => $billingData['billing_phone'],
            'cc_number'        => $ccData['cc_number'],
            'cc_exp_month'     => $ccData['cc_exp_month'],
            'cc_exp_year'      => $ccData['cc_exp_year'],
            'cc_csc'           => $ccData['cc_csc'],
        );

        $result = $this->getClient()->post('payment/authCapture', $this->transactionId, $params);
        return $result;
    }

    //// HELPER METHODS

    /**
     * Create invoice
     *
     * @access public
     * @param array shopping cart subtotal, shipping, taxes, rebate, items: assoc array with name, description, quantity,
     *                  unit_price, unit_tax, unit_shipping, total
     * @param array shipping address - assoc array with first_name, last_name, company,
     *                  address1, address2, city, state, zip, country, phone, email
     * @return array
     */
    public function createInvoice($cartDisplayData, $shippingAddress)
    {
        $items = array();
        foreach ($cartDisplayData['items'] as $item) {
            $items[] = array(
                'name'          => $item['name'],
                'description'   => $item['description'],
                'quantity'      => $item['quantity'],
                'unit_price'    => $item['unit_price'],
                'unit_shipping' => $item['unit_shipping'],
                'tax'           => $item['quantity'] * $item['unit_tax'],
                'total'         => $item['total'],
                'rebate'        => 0,
            );
        }

        return array(
            'items'    => $items,
            'subtotal' => $cartDisplayData['subtotal'],
            'shipping' => $cartDisplayData['shipping'],
            'taxes'    => $cartDisplayData['taxes'],
            'rebate'   => $cartDisplayData['rebate'],

            'shipping_address' => array(
                'first'    => $shippingAddress['first_name'],
                'last'     => $shippingAddress['last_name'],
                'company'  => $shippingAddress['company'],
                'address1' => $shippingAddress['address1'],
                'address2' => $shippingAddress['address2'],
                'city'     => $shippingAddress['city'],
                'state'    => $shippingAddress['state'],
                'zip'      => $shippingAddress['zip'],
                'country'  => $shippingAddress['country'],
                'phone'    => $shippingAddress['phone'],
                'email'    => $shippingAddress['email'],
            ),
        );
    }
}
