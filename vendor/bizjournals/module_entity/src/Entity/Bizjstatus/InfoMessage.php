<?php

namespace Entity\Bizjstatus;

use Doctrine\ORM\Mapping as ORM;

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
     * Get message_id
     *
     * @return integer 
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * Set allow_syndication
     *
     * @param boolean $allowSyndication
     * @return InfoMessage
     */
    public function setAllowSyndication($allowSyndication)
    {
        $this->allow_syndication = $allowSyndication;

        return $this;
    }

    /**
     * Get allow_syndication
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
     * Set created_by
     *
     * @param string $createdBy
     * @return InfoMessage
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
     * Set updated_by
     *
     * @param string $updatedBy
     * @return InfoMessage
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updated_by
     *
     * @return string 
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return InfoMessage
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return InfoMessage
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
     * @return InfoMessage
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
     * Add ProductMap
     *
     * @param \Entity\Bizjstatus\ProductEventMap $productMap
     * @return InfoMessage
     */
    public function addProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {
        $this->ProductMap[] = $productMap;

        return $this;
    }

    /**
     * Remove ProductMap
     *
     * @param \Entity\Bizjstatus\ProductEventMap $productMap
     */
    public function removeProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {
        $this->ProductMap->removeElement($productMap);
    }

    /**
     * Get ProductMap
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductMap()
    {
        return $this->ProductMap;
    }
}
