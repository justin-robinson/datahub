<?php

namespace Entity\Bizjstatus;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 */
class Event extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var integer
     */
    private $parent_id;

    /**
     * @var integer
     */
    private $grandparent_id;

    /**
     * @var boolean
     */
    private $has_child = false;

    /**
     * @var integer
     */
    private $code_id;

    /**
     * @var boolean
     */
    private $allow_syndication = false;

    /**
     * @var boolean
     */
    private $is_resolved = false;

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
     * @var \Entity\Bizjstatus\StatusCode
     */
    private $Status;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProductMap = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set parent_id
     *
     * @param integer $parentId
     * @return Event
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parent_id
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set grandparent_id
     *
     * @param integer $grandparentId
     * @return Event
     */
    public function setGrandparentId($grandparentId)
    {
        $this->grandparent_id = $grandparentId;

        return $this;
    }

    /**
     * Get grandparent_id
     *
     * @return integer 
     */
    public function getGrandparentId()
    {
        return $this->grandparent_id;
    }

    /**
     * Set has_child
     *
     * @param boolean $hasChild
     * @return Event
     */
    public function setHasChild($hasChild)
    {
        $this->has_child = $hasChild;

        return $this;
    }

    /**
     * Get has_child
     *
     * @return boolean 
     */
    public function getHasChild()
    {
        return $this->has_child;
    }

    /**
     * Set code_id
     *
     * @param integer $codeId
     * @return Event
     */
    public function setCodeId($codeId)
    {
        $this->code_id = $codeId;

        return $this;
    }

    /**
     * Get code_id
     *
     * @return integer 
     */
    public function getCodeId()
    {
        return $this->code_id;
    }

    /**
     * Set allow_syndication
     *
     * @param boolean $allowSyndication
     * @return Event
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
     * Set is_resolved
     *
     * @param boolean $isResolved
     * @return Event
     */
    public function setIsResolved($isResolved)
    {
        $this->is_resolved = $isResolved;

        return $this;
    }

    /**
     * Get is_resolved
     *
     * @return boolean 
     */
    public function getIsResolved()
    {
        return $this->is_resolved;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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

    /**
     * Set Status
     *
     * @param \Entity\Bizjstatus\StatusCode $status
     * @return Event
     */
    public function setStatus(\Entity\Bizjstatus\StatusCode $status = null)
    {
        $this->Status = $status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return \Entity\Bizjstatus\StatusCode 
     */
    public function getStatus()
    {
        return $this->Status;
    }
}
