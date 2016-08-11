<?php

namespace Entity\Bizj;

/**
 * UrlShortener
 */
class UrlShortener extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $url_id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $market;

    /**
     * @var \DateTime
     */
    private $created_time;

    /**
     * @var \DateTime
     */
    private $modified_time;

    /**
     * @var string
     */
    private $source;


    /**
     * Get urlId
     *
     * @return integer
     */
    public function getUrlId()
    {
        return $this->url_id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return UrlShortener
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set market
     *
     * @param string $market
     *
     * @return UrlShortener
     */
    public function setMarket($market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return string
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return UrlShortener
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * Set modifiedTime
     *
     * @param \DateTime $modifiedTime
     *
     * @return UrlShortener
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modified_time = $modifiedTime;

        return $this;
    }

    /**
     * Get modifiedTime
     *
     * @return \DateTime
     */
    public function getModifiedTime()
    {
        return $this->modified_time;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return UrlShortener
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
}

