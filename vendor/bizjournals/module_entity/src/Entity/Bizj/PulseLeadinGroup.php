<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseLeadinGroup
 */
class PulseLeadinGroup extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $group_id;

    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var string
     */
    private $group_type;

    /**
     * @var string
     */
    private $group_title;

    /**
     * @var string
     */
    private $group_class;

    /**
     * @var string
     */
    private $group_topic;

    /**
     * @var string
     */
    private $group_teaser;

    /**
     * @var string
     */
    private $placement;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $group_url;

    /**
     * @var string
     */
    private $auto_query;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LeadinItems;

    /**
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->LeadinItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return PulseLeadinGroup
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulse_id
     *
     * @return integer 
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set group_type
     *
     * @param string $groupType
     * @return PulseLeadinGroup
     */
    public function setGroupType($groupType)
    {
        $this->group_type = $groupType;

        return $this;
    }

    /**
     * Get group_type
     *
     * @return string 
     */
    public function getGroupType()
    {
        return $this->group_type;
    }

    /**
     * Set group_title
     *
     * @param string $groupTitle
     * @return PulseLeadinGroup
     */
    public function setGroupTitle($groupTitle)
    {
        $this->group_title = $groupTitle;

        return $this;
    }

    /**
     * Get group_title
     *
     * @return string 
     */
    public function getGroupTitle()
    {
        return $this->group_title;
    }

    /**
     * Set group_class
     *
     * @param string $groupClass
     * @return PulseLeadinGroup
     */
    public function setGroupClass($groupClass)
    {
        $this->group_class = $groupClass;

        return $this;
    }

    /**
     * Get group_class
     *
     * @return string 
     */
    public function getGroupClass()
    {
        return $this->group_class;
    }

    /**
     * Set group_topic
     *
     * @param string $groupTopic
     * @return PulseLeadinGroup
     */
    public function setGroupTopic($groupTopic)
    {
        $this->group_topic = $groupTopic;

        return $this;
    }

    /**
     * Get group_topic
     *
     * @return string 
     */
    public function getGroupTopic()
    {
        return $this->group_topic;
    }

    /**
     * Set group_teaser
     *
     * @param string $groupTeaser
     * @return PulseLeadinGroup
     */
    public function setGroupTeaser($groupTeaser)
    {
        $this->group_teaser = $groupTeaser;

        return $this;
    }

    /**
     * Get group_teaser
     *
     * @return string 
     */
    public function getGroupTeaser()
    {
        return $this->group_teaser;
    }

    /**
     * Set placement
     *
     * @param string $placement
     * @return PulseLeadinGroup
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return string 
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return PulseLeadinGroup
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer 
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set group_url
     *
     * @param string $groupUrl
     * @return PulseLeadinGroup
     */
    public function setGroupUrl($groupUrl)
    {
        $this->group_url = $groupUrl;

        return $this;
    }

    /**
     * Get group_url
     *
     * @return string 
     */
    public function getGroupUrl()
    {
        return $this->group_url;
    }

    /**
     * Set auto_query
     *
     * @param string $autoQuery
     * @return PulseLeadinGroup
     */
    public function setAutoQuery($autoQuery)
    {
        $this->auto_query = $autoQuery;

        return $this;
    }

    /**
     * Get auto_query
     *
     * @return string 
     */
    public function getAutoQuery()
    {
        return $this->auto_query;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseLeadinGroup
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
     * @return PulseLeadinGroup
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
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return PulseLeadinGroup
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Add LeadinItems
     *
     * @param \Entity\Bizj\PulseLeadinItem $leadinItems
     * @return PulseLeadinGroup
     */
    public function addLeadinItem(\Entity\Bizj\PulseLeadinItem $leadinItems)
    {
        $this->LeadinItems[] = $leadinItems;

        return $this;
    }

    /**
     * Remove LeadinItems
     *
     * @param \Entity\Bizj\PulseLeadinItem $leadinItems
     */
    public function removeLeadinItem(\Entity\Bizj\PulseLeadinItem $leadinItems)
    {
        $this->LeadinItems->removeElement($leadinItems);
    }

    /**
     * Get LeadinItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeadinItems()
    {
        return $this->LeadinItems;
    }

    /**
     * Set Pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     * @return PulseLeadinGroup
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get Pulse
     *
     * @return \Entity\Bizj\Pulse 
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}
