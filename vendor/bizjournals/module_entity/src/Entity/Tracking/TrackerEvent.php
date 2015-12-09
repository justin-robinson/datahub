<?php

namespace Entity\Tracking;

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
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set trackerKeyId
     *
     * @param integer $trackerKeyId
     *
     * @return TrackerEvent
     */
    public function setTrackerKeyId($trackerKeyId)
    {
        $this->tracker_key_id = $trackerKeyId;

        return $this;
    }

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
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return TrackerEvent
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
     * Set userRef
     *
     * @param string $userRef
     *
     * @return TrackerEvent
     */
    public function setUserRef($userRef)
    {
        $this->user_ref = $userRef;

        return $this;
    }

    /**
     * Get userRef
     *
     * @return string
     */
    public function getUserRef()
    {
        return $this->user_ref;
    }

    /**
     * Set eventProperties
     *
     * @param string $eventProperties
     *
     * @return TrackerEvent
     */
    public function setEventProperties($eventProperties)
    {
        $this->event_properties = $eventProperties;

        return $this;
    }

    /**
     * Get eventProperties
     *
     * @return string
     */
    public function getEventProperties()
    {
        return $this->event_properties;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TrackerEvent
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
}

