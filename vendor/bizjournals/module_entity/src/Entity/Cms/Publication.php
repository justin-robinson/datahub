<?php

namespace Entity\Cms;

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
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return Publication
     */
    public function setPubId($pubId)
    {
        $this->pub_id = $pubId;

        return $this;
    }

    /**
     * Get pubId
     *
     * @return integer
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set pubName
     *
     * @param string $pubName
     *
     * @return Publication
     */
    public function setPubName($pubName)
    {
        $this->pub_name = $pubName;

        return $this;
    }

    /**
     * Get pubName
     *
     * @return string
     */
    public function getPubName()
    {
        return $this->pub_name;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Publication
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set marketCode
     *
     * @param string $marketCode
     *
     * @return Publication
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get marketCode
     *
     * @return string
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set publisherConfig
     *
     * @param string $publisherConfig
     *
     * @return Publication
     */
    public function setPublisherConfig($publisherConfig)
    {
        $this->publisher_config = $publisherConfig;

        return $this;
    }

    /**
     * Get publisherConfig
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
     *
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
     * Set defaultCopyrightNotice
     *
     * @param string $defaultCopyrightNotice
     *
     * @return Publication
     */
    public function setDefaultCopyrightNotice($defaultCopyrightNotice)
    {
        $this->default_copyright_notice = $defaultCopyrightNotice;

        return $this;
    }

    /**
     * Get defaultCopyrightNotice
     *
     * @return string
     */
    public function getDefaultCopyrightNotice()
    {
        return $this->default_copyright_notice;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Publication
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Publication
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add content
     *
     * @param \Entity\Cms\Content $content
     *
     * @return Publication
     */
    public function addContent(\Entity\Cms\Content $content)
    {
        $this->Content[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \Entity\Cms\Content $content
     */
    public function removeContent(\Entity\Cms\Content $content)
    {
        $this->Content->removeElement($content);
    }

    /**
     * Get content
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContent()
    {
        return $this->Content;
    }
}

