<?php

namespace Services\Datahub\Api;

use Zend\Http\Client as HttpClient;
use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Header\ContentType;
use Zend\Http\Request;
use Zend\Json\Json;

/**
 * Class ApiResource
 * @package Services\Datahub\Api
 */
class ApiResource
{

    /**
     * @var string base path to api
     */
    protected $host;

    /**
     * @var string path to current resource
     */
    protected $path;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * ApiResource constructor.
     *
     * @param        $host
     * @param string $path
     */
    public function __construct($host, $path = '/api/v1/company')
    {

        $this->setHost($host);
        $this->setPath($path);

        $clientConfig = [
            'adapter' => Curl::class,
        ];
        $this->httpClient = new HttpClient('', $clientConfig);
    }

    /*********************************************
     * START REST METHODS
     *********************************************/

    /**
     * @param string $id
     *
     * @return \stdClass|string
     */
    public function get($id = '')
    {

        $url = $this->getHost() . $this->getPath();
        $url .= empty($id) ? '' : '/' . $id;

        $request = new Request();
        $request
            ->setUri($url)
            ->setMethod(Request::METHOD_GET)
            ->getHeaders()->addHeaders(['Content-Type' => 'application/json',]);
        $this->httpClient->send($request);

        return $this->getBody();
    }

    /**
     * @param \stdClass $data
     *
     * @return \stdClass|string
     */
    public function post(\stdClass $data)
    {

        if (!is_string($data)) {
            $data = Json::encode($data);
        }

        $request = new Request();
        $request
            ->setUri($this->getHost() . $this->getPath())
            ->setMethod(Request::METHOD_POST)
            ->setContent($data)
            ->getHeaders()->addHeaders(['Content-Type' => 'application/json',]);
        $this->httpClient->send($request);

        return $this->getBody();
    }

    /**
     * @param $id
     * @param $data
     *
     * @return \stdClass|string
     */
    public function put($id, $data)
    {

        if (!is_string($data)) {
            $data = Json::encode($data);
        }

        $url = $this->getHost() . $this->getPath();
        $url .= empty($id) ? '' : '/' . $id;
        $request = new Request();
        $request
            ->setUri($url)
            ->setMethod(Request::METHOD_PUT)
            ->setContent($data)
            ->getHeaders()->addHeaders(['Content-Type' => 'application/json',]);
        $this->httpClient->send($request);

        return $this->getBody();
    }

    /**
     * @param $id
     *
     * @return \stdClass|string
     */
    public function delete($id)
    {

        $url = $this->getHost() . $this->getPath();
        $url .= empty($id) ? '' : '/' . $id;

        $request = new Request();
        $request
            ->setUri($url)
            ->setMethod(Request::METHOD_DELETE);
        $this->httpClient->send($request);

        return $this->getBody();
    }

    /*********************************************
     * END REST METHODS
     *********************************************/

    /**
     * @return int
     */
    public function getStatusCode()
    {

        return $this->httpClient->getResponse()->getStatusCode();
    }

    /**
     * @return string|\stdClass
     */
    public function getBody()
    {

        $body = $this->httpClient->getResponse()->getContent();

        $contentTypeHeader = $this->httpClient->getResponse()->getHeaders()->get('contenttype');
        if (is_a($contentTypeHeader, ContentType::class) && $contentTypeHeader->getMediaType() === 'application/json') {
            $body = Json::decode($body);
        }

        return $body;
    }

    /**
     * @return string
     */
    public function getHost()
    {

        return $this->host;
    }

    /**
     * @return string
     */
    public function getPath()
    {

        return $this->path;
    }

    /**
     * @param $host string
     */
    public function setHost($host)
    {

        $this->host = $host;
    }

    /**
     * @param $path string
     */
    public function setPath($path)
    {

        $this->path = $path;
    }


}
