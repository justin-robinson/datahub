<?php

namespace Entity\Medialibrary;

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
     * Get batchId
     *
     * @return integer
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return BatchUpload
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
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return BatchUpload
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return BatchUpload
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set isComplete
     *
     * @param boolean $isComplete
     *
     * @return BatchUpload
     */
    public function setIsComplete($isComplete)
    {
        $this->is_complete = $isComplete;

        return $this;
    }

    /**
     * Get isComplete
     *
     * @return boolean
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return BatchUpload
     */
    public function setCreatedBy($createdBy)
    {
        $this->created_by = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BatchUpload
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
     * Add batchMedia
     *
     * @param \Entity\Medialibrary\BatchMedia $batchMedia
     *
     * @return BatchUpload
     */
    public function addBatchMedia(\Entity\Medialibrary\BatchMedia $batchMedia)
    {
        $this->BatchMedia[] = $batchMedia;

        return $this;
    }

    /**
     * Remove batchMedia
     *
     * @param \Entity\Medialibrary\BatchMedia $batchMedia
     */
    public function removeBatchMedia(\Entity\Medialibrary\BatchMedia $batchMedia)
    {
        $this->BatchMedia->removeElement($batchMedia);
    }

    /**
     * Get batchMedia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBatchMedia()
    {
        return $this->BatchMedia;
    }

    /**
     * Set publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     *
     * @return BatchUpload
     */
    public function setPublication(\Entity\Medialibrary\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \Entity\Medialibrary\Publication
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}

