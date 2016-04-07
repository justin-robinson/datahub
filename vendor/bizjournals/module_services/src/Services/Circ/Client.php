<?php

namespace Services\Circ;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;

class Client extends AbstractClient
{
    /** 
     * Post to the API
     * 
     * @access public
     * @param  string $service
     * @param  array  $params
     * @return array
     */
    public function post($service, array $params = array())
    {
        $request = new HttpRequest();
        $request->setUri($this->base_url . $service);
        $request->getPost()->fromArray($params);
        $request->setMethod('POST');

        $response = $this->getHttpClient()
            ->setEncType(HttpClient::ENC_URLENCODED)
            ->send($request);

        $this->validate($response);
        $xml  = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $data = json_decode(json_encode((array) $xml), true);
        if (isset($data[0])) {
            $error_parts = explode(':', $data[0]);
            if (count($error_parts) > 1) {
                $data = array(
                    'ERROR' => array('CODE' => $error_parts[0], 'MESSAGE' => $error_parts[1]),
                );
            } else {
                $data = array(
                    'ERROR' => array('MESSAGE' => $data[0]),
                );
            }
        }
        return $data;
    }
}
