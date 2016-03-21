<?php

namespace Services\Medialibrary;

use Services\AbstractClient;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;
use Zend\Json\Json;
use Zend\Session\Container;
use Services\Medialibrary\ConnectionException;
use Services\Medialibrary\ParseException;

class Client extends AbstractClient
{
    /**
     * Session Container
     *
     * @var \Zend\Session\Container
     */
    protected $session;

    /**
     * Constructor
     *
     * @param  array  $input
     */
    public function __construct($input = array())
    {
        $this->session = new Container(__NAMESPACE__);

        parent::__construct($input, self::ARRAY_AS_PROPS);
    }

    public function init()
    {
        if (!$this->session->id) {
            if (isset($_SERVER['REMOTE_ADDR'])) {
                $client_ip = $_SERVER['REMOTE_ADDR'];
            } else {
                preg_match_all('/inet addr: ?([^ ]+)/', `ifconfig`, $ips, PREG_SET_ORDER);
                $client_ip = $ips[0][1];
            }
            $unique = uniqid() . time();
            $signature = preg_replace('/=+$/', '',
                base64_encode(pack('H*',
                    sha1(sprintf('%s%s%s', trim($unique), $this->secret, $this->key))
                ))
            );

            $sessionParams = array(
                'api_key'   => $this->key,
                'unique_id' => $unique,
                'username'  => (isset($this->username) ? $this->username : 'unknown user'),
                'client_ip' => $client_ip,
                'signature' => $signature
            );

            $response = $this->post('session', $sessionParams);
            if (is_array($response) && isset($response['medialibrary']) && $response['medialibrary']['status']['code'] == 0) {
                $this->session->id = $response['medialibrary']['session']['id'];
                $this->session->setExpirationSeconds(strtotime($response['medialibrary']['session']['expires']['date']) - time());
            }
        }
    }

    public function getHttpClient()
    {
        // enable xdebugger if in development
        $httpClient = parent::getHttpClient();
        if (getenv('APPLICATION_ENV') == 'development') {
            $httpClient->setCookies(array('XDEBUG_SESSION' => 'XDEBUG_ECLIPSE'));
        }

        return $httpClient;
    }

    public function getSessionId()
    {
        return $this->session->id;
    }

    public function get($resource_path, array $params = array())
    {
        $fqurl = $this->base_url . '/' . ltrim($resource_path, '/');

        try {
            $request = new HttpRequest;
            $request->setUri($fqurl);
            $request->getQuery()->fromArray($params);

            if (($session = $this->getSessionId()) !== null) {
                $request->getHeaders()->addHeaderLine('X-Session-Id', $session);
            }

            $response = $this->getHttpClient()->send($request);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
        $this->validate($response);

        try {
            $return = Json::decode($response->getBody(), Json::TYPE_ARRAY);
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage(), $e->getCode(), $e);
        }
        return $return;
    }

    public function post($resource_path, array $params = array())
    {
        $fqurl = $this->base_url . '/' . ltrim($resource_path, '/');

        try {
            $request = new HttpRequest;
            $request->setUri($fqurl);
            $request->getPost()->fromArray($params);
            $request->setMethod('POST');

            if (($session = $this->getSessionId()) !== null) {
                $request->getHeaders()->addHeaderLine('X-Session-Id', $session);
            }

            $response = $this->getHttpClient()
                ->setEncType(HttpClient::ENC_URLENCODED)
                ->send($request);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }

        $this->validate($response);

        try {
            $return = Json::decode($response->getBody(), Json::TYPE_ARRAY);
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage(), $e->getCode(), $e);
        }

        return $return;
    }

    public function put($resource_path, array $params = array())
    {
        $fqurl = $this->base_url . '/' . ltrim($resource_path, '/');

        try {
            $request = new HttpRequest;
            $request->setUri($fqurl);
            $request->setContent(http_build_query($params));
            $request->setMethod('PUT');

            if (($session = $this->getSessionId()) !== null) {
                $request->getHeaders()->addHeaderLine('X-Session-Id', $session);
            }

            $response = $this->getHttpClient()->send($request);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }

        $this->validate($response);

        try {
            $return = Json::decode($response->getBody(), Json::TYPE_ARRAY);
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage(), $e->getCode(), $e);
        }

        return $return;
    }

    public function delete($resource_path)
    {
        $fqurl = $this->base_url . '/' . ltrim($resource_path, '/');

        try {
            $request = new HttpRequest;
            $request->setUri($fqurl);
            $request->setMethod('DELETE');

            if (($session = $this->getSessionId()) !== null) {
                $request->getHeaders()->addHeaderLine('X-Session-Id', $session);
            }

            $response = $this->getHttpClient()->send($request);
        } catch (\Exception $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }

        $this->validate($response);

        try {
            $return = Json::decode($response->getBody(), Json::TYPE_ARRAY);
        } catch (\Exception $e) {
            throw new ParseException($e->getMessage(), $e->getCode(), $e);
        }

        return $return;
    }

    public function validate(HttpResponse $response)
    {
        if ($response->isServerError() || $response->isForbidden()) {
            throw new ConnectionException(
                sprintf('An error occurred sending request. Status code: %s; Response: %s',
                    $response->getStatusCode(),
                    $response->getBody()
                )
            );
        }
    }
}
