<?php

namespace Entity\Bizjstatus;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusCode
 */
class StatusCode extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $code_id;

    /**
     * @var string
     */
    private $code_name;

    /**
     * @var integer
     */
    private $display_order = '0';

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Events;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Events = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set code_name
     *
     * @param string $codeName
     * @return StatusCode
     */
    public function setCodeName($codeName)
    {
        $this->code_name = $codeName;

        return $this;
    }

    /**
     * Get code_name
     *
     * @return string 
     */
    public function getCodeName()
    {
        return $this->code_name;
    }

    /**
     * Set display_order
     *
     * @param integer $displayOrder
     * @return StatusCode
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->display_order = $displayOrder;

        return $this;
    }

    /**
     * Get display_order
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->display_order;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return StatusCode
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
     * @return StatusCode
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
     * @return StatusCode
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
     * Add Events
     *
     * @param \Entity\Bizjstatus\StatusCode $events
     * @return StatusCode
     */
    public function addEvent(\Entity\Bizjstatus\StatusCode $events)
    {
        $this->Events[] = $events;

        return $this;
    }

    /**
     * Remove Events
     *
     * @param \Entity\Bizjstatus\StatusCode $events
     */
    public function removeEvent(\Entity\Bizjstatus\StatusCode $events)
    {
        $this->Events->removeElement($events);
    }

    /**
     * Get Events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->Events;
    }
}
