<?php

namespace Entity\Tracking;

use Doctrine\ORM\Mapping as ORM;

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
     * Get tracker_key_id
     *
     * @return integer 
     */
    public function getTrackerKeyId()
    {
        return $this->tracker_key_id;
    }

    /**
     * Set tracker_key
     *
     * @param string $trackerKey
     * @return TrackerKey
     */
    public function setTrackerKey($trackerKey)
    {
        $this->tracker_key = $trackerKey;

        return $this;
    }

    /**
     * Get tracker_key
     *
     * @return string 
     */
    public function getTrackerKey()
    {
        return $this->tracker_key;
    }

    /**
     * Set client_id
     *
     * @param integer $clientId
     * @return TrackerKey
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get client_id
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set tracker_type
     *
     * @param string $trackerType
     * @return TrackerKey
     */
    public function setTrackerType($trackerType)
    {
        $this->tracker_type = $trackerType;

        return $this;
    }

    /**
     * Get tracker_type
     *
     * @return string 
     */
    public function getTrackerType()
    {
        return $this->tracker_type;
    }

    /**
     * Set tracker_subtype
     *
     * @param string $trackerSubtype
     * @return TrackerKey
     */
    public function setTrackerSubtype($trackerSubtype)
    {
        $this->tracker_subtype = $trackerSubtype;

        return $this;
    }

    /**
     * Get tracker_subtype
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
     * Set campaign_ref
     *
     * @param string $campaignRef
     * @return TrackerKey
     */
    public function setCampaignRef($campaignRef)
    {
        $this->campaign_ref = $campaignRef;

        return $this;
    }

    /**
     * Get campaign_ref
     *
     * @return string 
     */
    public function getCampaignRef()
    {
        return $this->campaign_ref;
    }

    /**
     * Set tracker_properties
     *
     * @param string $trackerProperties
     * @return TrackerKey
     */
    public function setTrackerProperties($trackerProperties)
    {
        $this->tracker_properties = $trackerProperties;

        return $this;
    }

    /**
     * Get tracker_properties
     *
     * @return string 
     */
    public function getTrackerProperties()
    {
        return $this->tracker_properties;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return TrackerKey
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return TrackerKey
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
     * @return TrackerKey
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
}
