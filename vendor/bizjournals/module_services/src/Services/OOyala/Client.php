<?php

namespace Services\Ooyala;

use Services\AbstractClient;

use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;
use Zend\Json\Json;

class Client extends AbstractClient
{
    public function get($resource_path, array $params = array())
    {
        $params = $this->addSignature('get', $resource_path, $params);
        $fqurl = $this->base_url . '/' . $this->version . '/' . $resource_path;
        
        $request = new HttpRequest;
        $request->setUri($fqurl);
        $request->getQuery()->fromArray($params);
        
        $response = $this->getHttpClient()->send($request);
    
        $this->validate($response);
    
        return Json::decode($response->getBody(), Json::TYPE_ARRAY);
    }
    
    public function post($resource_path, array $params = array())
    {
        $baseurl = rtrim($this->base_url, '/');
        $resource_path = ltrim($resource_path, '/');
        $fqurl = $baseurl . '/' . $resource_path;
        
        $request = new HttpRequest;
        $request->setUri($fqurl);
        $request->getPost()->fromArray($params);
        $request->setMethod('POST');
        
        $response = $this->getHttpClient()
            ->setEncType(HttpClient::ENC_URLENCODED)
            ->send($request);
        
        $this->validate($response);
        
        return Json::decode($response->getBody(), Json::TYPE_ARRAY);
    }
    
    /**
     * Generate a signature for a request via the API and return
     * the updated $params array.
     *
     * @access private
     * @param string $action (get, put, etc.)
     * @param string $resource_path (without version)
     * @param array $params
     * @param string $body (optional)
     * @return array
     */
    private function addSignature($action, $resource_path, array $params, $body = '')
    {
        // Append params added to every request
        if (!isset($params['api_key'])) {
            $params['api_key'] = $this->key;
        }
        if (!isset($params['expires'])) {
            $params['expires'] = (time() + 100);
        }
        
        // Sort Parameter Keys
        ksort($params);
        $auth_string = $this->secret . strtoupper($action) . '/' . $this->version . '/' . $resource_path;
        foreach ($params as $pkey => $pval) {
            $auth_string .= $pkey . '=' . $pval;
        }
        $auth_string .= $body;
        
        $params['signature'] = preg_replace('/=+$/', '', substr(base64_encode(hash('sha256', $auth_string, true)), 0, 43));
        return $params;
    }
}
