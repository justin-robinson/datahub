<?php

namespace Entity\Bizjstatus;

/**
 * InfoMessage
 */
class InfoMessage extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $message_id;

    /**
     * @var boolean
     */
    private $allow_syndication = false;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $details;

    /**
     * @var string
     */
    private $created_by;

    /**
     * @var string
     */
    private $updated_by;

    /**
     * @var \DateTime
     */
    private $expires_at;

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
    private $ProductMap;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProductMap = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get messageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * Set allowSyndication
     *
     * @param boolean $allowSyndication
     *
     * @return InfoMessage
     */
    public function setAllowSyndication($allowSyndication)
    {
        $this->allow_syndication = $allowSyndication;

        return $this;
    }

    /**
     * Get allowSyndication
     *
     * @return boolean
     */
    public function getAllowSyndication()
    {
        return $this->allow_syndication;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return InfoMessage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return InfoMessage
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return InfoMessage
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
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return InfoMessage
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return InfoMessage
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return InfoMessage
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
     * @return InfoMessage
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
     * Add productMap
     *
     * @param \Entity\Bizjstatus\ProductEventMap $productMap
     *
     * @return InfoMessage
     */
    public function addProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {
        $this->ProductMap[] = $productMap;

        return $this;
    }

    /**
     * Remove productMap
     *
     * @param \Entity\Bizjstatus\ProductEventMap $productMap
     */
    public function removeProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {
        $this->ProductMap->removeElement($productMap);
    }

    /**
     * Get productMap
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductMap()
    {
        return $this->ProductMap;
    }
}

