<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Get url_id
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
     * Set created_time
     *
     * @param \DateTime $createdTime
     * @return UrlShortener
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;

        return $this;
    }

    /**
     * Get created_time
     *
     * @return \DateTime 
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * Set modified_time
     *
     * @param \DateTime $modifiedTime
     * @return UrlShortener
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modified_time = $modifiedTime;

        return $this;
    }

    /**
     * Get modified_time
     *
     * @return \DateTime 
     */
    public function getModifiedTime()
    {
        return $this->modified_time;
    }
}
