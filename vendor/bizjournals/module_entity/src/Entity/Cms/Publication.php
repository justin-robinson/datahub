<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 */
class Publication extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var string
     */
    private $pub_name;

    /**
     * @var string
     */
    private $short_name;

    /**
     * @var string
     */
    private $market_code;

    /**
     * @var string
     */
    private $publisher_config = 'default-publisher';

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var string
     */
    private $default_copyright_notice;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Content;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Content = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pub_id
     *
     * @param integer $pubId
     * @return Publication
     */
    public function setPubId($pubId)
    {
        $this->pub_id = $pubId;

        return $this;
    }

    /**
     * Get pub_id
     *
     * @return integer 
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set pub_name
     *
     * @param string $pubName
     * @return Publication
     */
    public function setPubName($pubName)
    {
        $this->pub_name = $pubName;

        return $this;
    }

    /**
     * Get pub_name
     *
     * @return string 
     */
    public function getPubName()
    {
        return $this->pub_name;
    }

    /**
     * Set short_name
     *
     * @param string $shortName
     * @return Publication
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get short_name
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set market_code
     *
     * @param string $marketCode
     * @return Publication
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set publisher_config
     *
     * @param string $publisherConfig
     * @return Publication
     */
    public function setPublisherConfig($publisherConfig)
    {
        $this->publisher_config = $publisherConfig;

        return $this;
    }

    /**
     * Get publisher_config
     *
     * @return string 
     */
    public function getPublisherConfig()
    {
        return $this->publisher_config;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Publication
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set default_copyright_notice
     *
     * @param string $defaultCopyrightNotice
     * @return Publication
     */
    public function setDefaultCopyrightNotice($defaultCopyrightNotice)
    {
        $this->default_copyright_notice = $defaultCopyrightNotice;

        return $this;
    }

    /**
     * Get default_copyright_notice
     *
     * @return string 
     */
    public function getDefaultCopyrightNotice()
    {
        return $this->default_copyright_notice;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Publication
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Publication
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add Content
     *
     * @param \Entity\Cms\Content $content
     * @return Publication
     */
    public function addContent(\Entity\Cms\Content $content)
    {
        $this->Content[] = $content;

        return $this;
    }

    /**
     * Remove Content
     *
     * @param \Entity\Cms\Content $content
     */
    public function removeContent(\Entity\Cms\Content $content)
    {
        $this->Content->removeElement($content);
    }

    /**
     * Get Content
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContent()
    {
        return $this->Content;
    }
}
