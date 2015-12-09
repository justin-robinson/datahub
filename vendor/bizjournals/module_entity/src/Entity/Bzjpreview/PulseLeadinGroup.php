<?php

namespace Entity\Bzjpreview;

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
     * @var \Entity\Bzjpreview\Pulse
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
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseLeadinGroup
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulseId
     *
     * @return integer
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set groupType
     *
     * @param string $groupType
     *
     * @return PulseLeadinGroup
     */
    public function setGroupType($groupType)
    {
        $this->group_type = $groupType;

        return $this;
    }

    /**
     * Get groupType
     *
     * @return string
     */
    public function getGroupType()
    {
        return $this->group_type;
    }

    /**
     * Set groupTitle
     *
     * @param string $groupTitle
     *
     * @return PulseLeadinGroup
     */
    public function setGroupTitle($groupTitle)
    {
        $this->group_title = $groupTitle;

        return $this;
    }

    /**
     * Get groupTitle
     *
     * @return string
     */
    public function getGroupTitle()
    {
        return $this->group_title;
    }

    /**
     * Set groupClass
     *
     * @param string $groupClass
     *
     * @return PulseLeadinGroup
     */
    public function setGroupClass($groupClass)
    {
        $this->group_class = $groupClass;

        return $this;
    }

    /**
     * Get groupClass
     *
     * @return string
     */
    public function getGroupClass()
    {
        return $this->group_class;
    }

    /**
     * Set groupTopic
     *
     * @param string $groupTopic
     *
     * @return PulseLeadinGroup
     */
    public function setGroupTopic($groupTopic)
    {
        $this->group_topic = $groupTopic;

        return $this;
    }

    /**
     * Get groupTopic
     *
     * @return string
     */
    public function getGroupTopic()
    {
        return $this->group_topic;
    }

    /**
     * Set groupTeaser
     *
     * @param string $groupTeaser
     *
     * @return PulseLeadinGroup
     */
    public function setGroupTeaser($groupTeaser)
    {
        $this->group_teaser = $groupTeaser;

        return $this;
    }

    /**
     * Get groupTeaser
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
     *
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
     *
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
     * Set groupUrl
     *
     * @param string $groupUrl
     *
     * @return PulseLeadinGroup
     */
    public function setGroupUrl($groupUrl)
    {
        $this->group_url = $groupUrl;

        return $this;
    }

    /**
     * Get groupUrl
     *
     * @return string
     */
    public function getGroupUrl()
    {
        return $this->group_url;
    }

    /**
     * Set autoQuery
     *
     * @param string $autoQuery
     *
     * @return PulseLeadinGroup
     */
    public function setAutoQuery($autoQuery)
    {
        $this->auto_query = $autoQuery;

        return $this;
    }

    /**
     * Get autoQuery
     *
     * @return string
     */
    public function getAutoQuery()
    {
        return $this->auto_query;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseLeadinGroup
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
     * @return PulseLeadinGroup
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return PulseLeadinGroup
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Add leadinItem
     *
     * @param \Entity\Bzjpreview\PulseLeadinItem $leadinItem
     *
     * @return PulseLeadinGroup
     */
    public function addLeadinItem(\Entity\Bzjpreview\PulseLeadinItem $leadinItem)
    {
        $this->LeadinItems[] = $leadinItem;

        return $this;
    }

    /**
     * Remove leadinItem
     *
     * @param \Entity\Bzjpreview\PulseLeadinItem $leadinItem
     */
    public function removeLeadinItem(\Entity\Bzjpreview\PulseLeadinItem $leadinItem)
    {
        $this->LeadinItems->removeElement($leadinItem);
    }

    /**
     * Get leadinItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeadinItems()
    {
        return $this->LeadinItems;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bzjpreview\Pulse $pulse
     *
     * @return PulseLeadinGroup
     */
    public function setPulse(\Entity\Bzjpreview\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bzjpreview\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}

