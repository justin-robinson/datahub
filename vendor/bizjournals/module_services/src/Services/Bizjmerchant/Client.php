<?php

namespace Services\Bizjmerchant;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;
use Services\Bizjmerchant\MerchantException;

class Client extends AbstractClient
{
    /**
     * Post to the API
     *
     * @access public
     * @param string url api end point (like mtr/create)
     * @param string transaction id|null
     * @param array $params
     * @return array
     */
    public function post($url = '', $transactionId = null, array $params = array())
    {
        // merchant access key on every request
        $params = array_map('strval', $params);

        $params['mack'] = $this->key;

        if (!empty($transactionId)) {
            $params['merchant_transaction_ref'] = sprintf('%020d', $transactionId);
        }

        // get signature and add to params
        $params['signature'] = $this->getSignature($params);
        $request = new HttpRequest();
        $request->setUri($this->api_url . '/' . $url);
        $request->getPost()->fromArray($params);
        $request->setMethod('POST');
        #\Zend\Debug\Debug::dump($params, "POST PARAMS:");

        $response = $this->getHttpClient()
            ->setEncType(HttpClient::ENC_URLENCODED)
            ->send($request);

        $this->validate($response);
        $data = json_decode($response->getBody(), true);
        if ($data == null) {
            throw new MerchantException('Unusable return data: ' . json_last_error() . '"' . $response->getBody() . '"');
        }
        return $data;
    }

    /**
     * Get frontend url
     *
     * @access public
     * @param string url frontend end point (like payment/restart)
     * @param string transaction id|null
     * @param array $params
     * @return string
     */
    public function getFrontendUrl($url = '', $transactionId = null, array $params = array())
    {
        $params = array_map('strval', $params);

        // merchant access key on every request
        $params['mack'] = $this->key;
        if (!empty($transactionId)) {
            $params['merchant_transaction_ref'] = sprintf('%020d', $transactionId);
        }

        // get signature and add to params
        $params['signature'] = $this->getSignature($params);

        $returnUrl = $this->frontend_url . '/' . $url;
        if (!empty($params)) {
            $returnUrl .= '?' . http_build_query($params);
        }
        return $returnUrl;
    }

    /**
     * Generate signatured based on params and return signature
     *
     * @access public
     * @param array $params
     * @return string signature
     */
    public function getSignature($params = array())
    {
        $flattenedArray = $this->flattenArray($params);
        ksort($flattenedArray);

        $tmp = array();
        foreach ($flattenedArray as $k => $v) {
            $tmp[] = $k . '=' . $v;
        }

        $queryString = implode('&', $tmp);

        $key         = str_pad($this->secret, 64, chr(0x00));
        $outerKeyPad = $key ^ str_repeat(chr(0x5c), 64);
        $innerKeyPad = $key ^ str_repeat(chr(0x36), 64);

        return base64_encode(
            extension_loaded('hash')
            ? hash_hmac('sha1', $queryString, $this->secret, true)
            : pack('H*', sha1($outerKeyPad . pack('H*', sha1($innerKeyPad . $queryString))))
        );
    }

    /**
     * Flatten array for signing
     *
     * @param array $array
     * @param string $prefix
     * @return array
     */
    protected function flattenArray(array $array, $prefix = null)
    {
        $tmp = array();
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $tmp = array_merge($tmp, self::flattenArray($v, $k));
            } else {
                $key = ($prefix !== null) ? $prefix . '[' . $k . ']' : $k;
                $tmp[$key] = $v;
            }
        }
        return $tmp;
    }
}
