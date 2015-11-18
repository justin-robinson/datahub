<?php

namespace Services\Refinery;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;
use Zend\Json\Json;
use Services\Refinery\ConnectionException;
use Services\Refinery\ParseException;

class Client extends AbstractClient
{
    public function post(array $params = array())
    {
        try {
            $request = new HttpRequest;
            $request->setUri($this->base_url);
            $request->getPost()->fromArray($params);
            $request->setMethod('POST');

            $response = $this->getHttpClient()
                ->setEncType(HttpClient::ENC_URLENCODED)
                ->send($request);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }

        try {
            $this->validate($response);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }

        $return = Json::decode($response->getBody(), Json::TYPE_ARRAY);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ParseException(json_last_error_msg() . ' on ' . $response->getBody());
        }
        return $return;
    }
}
