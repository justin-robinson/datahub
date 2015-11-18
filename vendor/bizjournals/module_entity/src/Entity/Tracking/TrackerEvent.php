<?php

namespace Entity\Tracking;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrackerEvent
 */
class TrackerEvent extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var integer
     */
    private $tracker_key_id;

    /**
     * @var integer
     */
    private $client_id;

    /**
     * @var string
     */
    private $user_ref;

    /**
     * @var string
     */
    private $event_properties;

    /**
     * @var \DateTime
     */
    private $created_at;


    /**
     * Get event_id
     *
     * @return integer 
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set tracker_key_id
     *
     * @param integer $trackerKeyId
     * @return TrackerEvent
     */
    public function setTrackerKeyId($trackerKeyId)
    {
        $this->tracker_key_id = $trackerKeyId;

        return $this;
    }

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
     * Set client_id
     *
     * @param integer $clientId
     * @return TrackerEvent
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
     * Set user_ref
     *
     * @param string $userRef
     * @return TrackerEvent
     */
    public function setUserRef($userRef)
    {
        $this->user_ref = $userRef;

        return $this;
    }

    /**
     * Get user_ref
     *
     * @return string 
     */
    public function getUserRef()
    {
        return $this->user_ref;
    }

    /**
     * Set event_properties
     *
     * @param string $eventProperties
     * @return TrackerEvent
     */
    public function setEventProperties($eventProperties)
    {
        $this->event_properties = $eventProperties;

        return $this;
    }

    /**
     * Get event_properties
     *
     * @return string 
     */
    public function getEventProperties()
    {
        return $this->event_properties;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return TrackerEvent
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
}
