<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * BatchUpload
 */
class BatchUpload extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $batch_id;

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var string
     */
    private $ip_address;

    /**
     * @var string
     */
    private $user_agent;

    /**
     * @var boolean
     */
    private $is_complete = false;

    /**
     * @var string
     */
    private $created_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $BatchMedia;

    /**
     * @var \Entity\Medialibrary\Publication
     */
    private $Publication;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->BatchMedia = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get batch_id
     *
     * @return integer 
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * Set pub_id
     *
     * @param integer $pubId
     * @return BatchUpload
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
     * Set ip_address
     *
     * @param string $ipAddress
     * @return BatchUpload
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set user_agent
     *
     * @param string $userAgent
     * @return BatchUpload
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get user_agent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set is_complete
     *
     * @param boolean $isComplete
     * @return BatchUpload
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get is_complete
     *
     * @return boolean 
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set created_by
     *
     * @param string $createdBy
     * @return BatchUpload
     */
    public function setCreatedBy($createdBy)
    {
        $this->created_by = $createdBy;

        return $this;
    }

    /**
     * Get created_by
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return BatchUpload
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
     * Add BatchMedia
     *
     * @param \Entity\Medialibrary\BatchMedia $batchMedia
     * @return BatchUpload
     */
    public function addBatchMedia(\Entity\Medialibrary\BatchMedia $batchMedia)
    {
        $this->BatchMedia[] = $batchMedia;

        return $this;
    }

    /**
     * Remove BatchMedia
     *
     * @param \Entity\Medialibrary\BatchMedia $batchMedia
     */
    public function removeBatchMedia(\Entity\Medialibrary\BatchMedia $batchMedia)
    {
        $this->BatchMedia->removeElement($batchMedia);
    }

    /**
     * Get BatchMedia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBatchMedia()
    {
        return $this->BatchMedia;
    }

    /**
     * Set Publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     * @return BatchUpload
     */
    public function setPublication(\Entity\Medialibrary\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get Publication
     *
     * @return \Entity\Medialibrary\Publication 
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}
