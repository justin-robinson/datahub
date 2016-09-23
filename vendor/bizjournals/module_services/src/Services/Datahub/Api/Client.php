<?php

namespace Services\Datahub\Api;

/**
 * Class Client
 * @package Services\Datahub\Api
 */
class Client
{

    /**
     * @var ApiResource
     */
    protected $resource;

    /**
     * Client constructor.
     *
     * @param $uri
     */
    public function __construct($uri)
    {

        $this->setResource(new ApiResource($uri));
    }

    /**
     * @param $id
     *
     * @return array|object|string
     */
    public function get($id = '')
    {

        return $this->resource->get($id);
    }

    /**
     * @param $data
     *
     * @return array|object|string
     */
    public function post(\stdClass $data)
    {

        return $this->resource->post($data);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return array|object|string
     */
    public function put($id, $data)
    {

        return $this->resource->put($id, $data);
    }

    /**
     * @param $id
     *
     * @return array|object|string
     */
    public function delete($id)
    {

        return $this->resource->delete($id);
    }

    /**
     * @param $linkName
     *
     * @return array|null|object|string
     */
    public function getHalLinkResource($linkName)
    {

        $links = $this->getLinks();

        if (empty($links->$linkName)) {
            return null;
        }

        $urlParts = parse_url($links->$linkName->href);

        $this->resource->setPath($urlParts['path']);
        $this->resource->setHost($urlParts['scheme'] . '://' . $urlParts['host']);

        return $this->get();
    }

    /**
     * @return null
     */
    public function getLinks()
    {

        $body = $this->resource->getBody();
        if (empty($body) || empty($body->_links)) {
            return null;
        }

        return $body->_links;
    }

    /**
     * @return null
     */
    public function getStatusCode()
    {

        return $this->resource->getStatusCode();
    }

    /**
     * @param ApiResource $resource
     */
    public function setResource(ApiResource $resource)
    {

        $this->resource = $resource;
    }

}
