<?php

namespace Entity\Bzjpreview;

/**
 * PageLeadinGroup
 */
class PageLeadinGroup extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $group_id;

    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var string
     */
    private $group_type = 'curate';

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LeadinItems;

    /**
     * @var \Entity\Bzjpreview\Page
     */
    private $Page;

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
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageLeadinGroup
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set groupType
     *
     * @param string $groupType
     *
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * Add leadinItem
     *
     * @param \Entity\Bzjpreview\PageLeadinItem $leadinItem
     *
     * @return PageLeadinGroup
     */
    public function addLeadinItem(\Entity\Bzjpreview\PageLeadinItem $leadinItem)
    {
        $this->LeadinItems[] = $leadinItem;

        return $this;
    }

    /**
     * Remove leadinItem
     *
     * @param \Entity\Bzjpreview\PageLeadinItem $leadinItem
     */
    public function removeLeadinItem(\Entity\Bzjpreview\PageLeadinItem $leadinItem)
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
     * Set page
     *
     * @param \Entity\Bzjpreview\Page $page
     *
     * @return PageLeadinGroup
     */
    public function setPage(\Entity\Bzjpreview\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Entity\Bzjpreview\Page
     */
    public function getPage()
    {
        return $this->Page;
    }
}

