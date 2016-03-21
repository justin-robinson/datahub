<?php

namespace Services\AdminAuthentication;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;
use Zend\Json\Json;

class Client extends AbstractClient
{
    /**
     * Post to the authentication API
     *
     * @access public
     * @param array $params
     *  -- required keys:
     *   --- email
     *   --- password
     *   --- token  (product code, ex. ni for NASCAR Illustrated)
     * @return array
     */
    public function post(array $params)
    {
        if (empty($this->secrets[$params['token']]) || empty($params['email']) || empty($params['password'])) {
            return [
                'success' => false,
            ];
        } else {

            $authKey = $params['password'] . ':' . $params['email'];
            $params['signature'] = hash_hmac('sha256', $authKey, $this->secrets[$params['token']]);

            $request = new HttpRequest;
            $request->setUri(rtrim($this->base_url, '/') . '/aa/');
            $request->getPost()->fromArray($params);
            $request->setMethod('POST');

            $response = $this->getHttpClient()
                ->setEncType(HttpClient::ENC_URLENCODED)
                ->send($request);
            $body = $response->getBody();
            if (substr($body, 0, 1) == '{') {
                return Json::decode($response->getBody(), Json::TYPE_ARRAY);
            } else {
                return [];
            }
        }

    }

}
