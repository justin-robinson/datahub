<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

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
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageLeadinGroup
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get page_id
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set group_type
     *
     * @param string $groupType
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * Set group_url
     *
     * @param string $groupUrl
     * @return PageLeadinGroup
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
     * @return PageLeadinGroup
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
     * Add LeadinItems
     *
     * @param \Entity\Bzjpreview\PageLeadinItem $leadinItems
     * @return PageLeadinGroup
     */
    public function addLeadinItem(\Entity\Bzjpreview\PageLeadinItem $leadinItems)
    {
        $this->LeadinItems[] = $leadinItems;

        return $this;
    }

    /**
     * Remove LeadinItems
     *
     * @param \Entity\Bzjpreview\PageLeadinItem $leadinItems
     */
    public function removeLeadinItem(\Entity\Bzjpreview\PageLeadinItem $leadinItems)
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
     * Set Page
     *
     * @param \Entity\Bzjpreview\Page $page
     * @return PageLeadinGroup
     */
    public function setPage(\Entity\Bzjpreview\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get Page
     *
     * @return \Entity\Bzjpreview\Page 
     */
    public function getPage()
    {
        return $this->Page;
    }
}
