<?php

namespace Entity\Bizjstatus;

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
     * Get codeId
     *
     * @return integer
     */
    public function getCodeId()
    {
        return $this->code_id;
    }

    /**
     * Set codeName
     *
     * @param string $codeName
     *
     * @return StatusCode
     */
    public function setCodeName($codeName)
    {
        $this->code_name = $codeName;

        return $this;
    }

    /**
     * Get codeName
     *
     * @return string
     */
    public function getCodeName()
    {
        return $this->code_name;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     *
     * @return StatusCode
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->display_order = $displayOrder;

        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer
     */
    public function getDisplayOrder()
    {
        return $this->display_order;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return StatusCode
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
     * @return StatusCode
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
     * @return StatusCode
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
     * Add event
     *
     * @param \Entity\Bizjstatus\StatusCode $event
     *
     * @return StatusCode
     */
    public function addEvent(\Entity\Bizjstatus\StatusCode $event)
    {
        $this->Events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Entity\Bizjstatus\StatusCode $event
     */
    public function removeEvent(\Entity\Bizjstatus\StatusCode $event)
    {
        $this->Events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->Events;
    }
}

