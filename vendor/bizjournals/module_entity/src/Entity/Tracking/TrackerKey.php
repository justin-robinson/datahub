<?php

namespace Entity\Tracking;

/**
 * TrackerKey
 */
class TrackerKey extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $tracker_key_id;

    /**
     * @var string
     */
    private $tracker_key;

    /**
     * @var integer
     */
    private $client_id;

    /**
     * @var string
     */
    private $tracker_type;

    /**
     * @var string
     */
    private $tracker_subtype;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $campaign_ref;

    /**
     * @var string
     */
    private $tracker_properties;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * Get trackerKeyId
     *
     * @return integer
     */
    public function getTrackerKeyId()
    {
        return $this->tracker_key_id;
    }

    /**
     * Set trackerKey
     *
     * @param string $trackerKey
     *
     * @return TrackerKey
     */
    public function setTrackerKey($trackerKey)
    {
        $this->tracker_key = $trackerKey;

        return $this;
    }

    /**
     * Get trackerKey
     *
     * @return string
     */
    public function getTrackerKey()
    {
        return $this->tracker_key;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return TrackerKey
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set trackerType
     *
     * @param string $trackerType
     *
     * @return TrackerKey
     */
    public function setTrackerType($trackerType)
    {
        $this->tracker_type = $trackerType;

        return $this;
    }

    /**
     * Get trackerType
     *
     * @return string
     */
    public function getTrackerType()
    {
        return $this->tracker_type;
    }

    /**
     * Set trackerSubtype
     *
     * @param string $trackerSubtype
     *
     * @return TrackerKey
     */
    public function setTrackerSubtype($trackerSubtype)
    {
        $this->tracker_subtype = $trackerSubtype;

        return $this;
    }

    /**
     * Get trackerSubtype
     *
     * @return string
     */
    public function getTrackerSubtype()
    {
        return $this->tracker_subtype;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return TrackerKey
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
     * Set campaignRef
     *
     * @param string $campaignRef
     *
     * @return TrackerKey
     */
    public function setCampaignRef($campaignRef)
    {
        $this->campaign_ref = $campaignRef;

        return $this;
    }

    /**
     * Get campaignRef
     *
     * @return string
     */
    public function getCampaignRef()
    {
        return $this->campaign_ref;
    }

    /**
     * Set trackerProperties
     *
     * @param string $trackerProperties
     *
     * @return TrackerKey
     */
    public function setTrackerProperties($trackerProperties)
    {
        $this->tracker_properties = $trackerProperties;

        return $this;
    }

    /**
     * Get trackerProperties
     *
     * @return string
     */
    public function getTrackerProperties()
    {
        return $this->tracker_properties;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return TrackerKey
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TrackerKey
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
     * @return TrackerKey
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
}

