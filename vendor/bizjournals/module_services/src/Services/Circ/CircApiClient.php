<?php

namespace Services\Circ;

use Services\AbstractClient;
use Zend\Http\CircApiClient as HttpClient;
use Zend\Http\Request as HttpRequest;
use Zend\Uri\Http;
use Zend\Uri\Uri;

class CircApiClient extends AbstractClient
{
    private $apiUrl = "subscribe.bizjournals.com";

    /**
     * Post to the API
     *
     * @access public
     * @param array $params
     * @return array
     */
    public function post($url = '', array $params = array())
    {
        $first = true;
        foreach ($params as $key => $val) {
            if($first) {
                $url .= '?';
                $first = false;
            } else {
                $url .= '&';
            }
            $url .= $key . '=' . urlencode($val);
        }

        $ch = curl_init($this->apiUrl .$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;
    }
}
