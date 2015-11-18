<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Path
 */
class Path extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $path_id;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var integer
     */
    private $pub_id = 2661;

    /**
     * @var string
     */
    private $date_format = '/Y/m/';

    /**
     * @var boolean
     */
    private $allow_story = 1;

    /**
     * @var boolean
     */
    private $allow_section_front = 1;

    /**
     * @var boolean
     */
    private $allow_homepage = 0;

    /**
     * @var boolean
     */
    private $allow_poll = 0;

    /**
     * @var boolean
     */
    private $allow_new_content = 1;

    /**
     * @var boolean
     */
    private $syndication_default = 1;

    /**
     * @var boolean
     */
    private $is_premium = 0;

    /**
     * @var integer
     */
    private $sort_order = 9999999;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Cms\Publication
     */
    private $Publication;


    /**
     * Get path_id
     *
     * @return integer 
     */
    public function getPathId()
    {
        return $this->path_id;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Path
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Path
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Path
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pub_id
     *
     * @param integer $pubId
     * @return Path
     */
    public function setPubId($pubId)
    {
        $this->pub_id = $pubId;

        return $this;
    }

    /**
     * Get pub_id
     *
     * @return integer 
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set date_format
     *
     * @param string $dateFormat
     * @return Path
     */
    public function setDateFormat($dateFormat)
    {
        $this->date_format = $dateFormat;

        return $this;
    }

    /**
     * Get date_format
     *
     * @return string 
     */
    public function getDateFormat()
    {
        return $this->date_format;
    }

    /**
     * Set allow_story
     *
     * @param boolean $allowStory
     * @return Path
     */
    public function setAllowStory($allowStory)
    {
        $this->allow_story = $allowStory;

        return $this;
    }

    /**
     * Get allow_story
     *
     * @return boolean 
     */
    public function getAllowStory()
    {
        return $this->allow_story;
    }

    /**
     * Set allow_section_front
     *
     * @param boolean $allowSectionFront
     * @return Path
     */
    public function setAllowSectionFront($allowSectionFront)
    {
        $this->allow_section_front = $allowSectionFront;

        return $this;
    }

    /**
     * Get allow_section_front
     *
     * @return boolean 
     */
    public function getAllowSectionFront()
    {
        return $this->allow_section_front;
    }

    /**
     * Set allow_homepage
     *
     * @param boolean $allowHomepage
     * @return Path
     */
    public function setAllowHomepage($allowHomepage)
    {
        $this->allow_homepage = $allowHomepage;

        return $this;
    }

    /**
     * Get allow_homepage
     *
     * @return boolean 
     */
    public function getAllowHomepage()
    {
        return $this->allow_homepage;
    }

    /**
     * Set allow_poll
     *
     * @param boolean $allowPoll
     * @return Path
     */
    public function setAllowPoll($allowPoll)
    {
        $this->allow_poll = $allowPoll;

        return $this;
    }

    /**
     * Get allow_poll
     *
     * @return boolean 
     */
    public function getAllowPoll()
    {
        return $this->allow_poll;
    }

    /**
     * Set allow_new_content
     *
     * @param boolean $allowNewContent
     * @return Path
     */
    public function setAllowNewContent($allowNewContent)
    {
        $this->allow_new_content = $allowNewContent;

        return $this;
    }

    /**
     * Get allow_new_content
     *
     * @return boolean 
     */
    public function getAllowNewContent()
    {
        return $this->allow_new_content;
    }

    /**
     * Set syndication_default
     *
     * @param boolean $syndicationDefault
     * @return Path
     */
    public function setSyndicationDefault($syndicationDefault)
    {
        $this->syndication_default = $syndicationDefault;

        return $this;
    }

    /**
     * Get syndication_default
     *
     * @return boolean 
     */
    public function getSyndicationDefault()
    {
        return $this->syndication_default;
    }

    /**
     * Set is_premium
     *
     * @param boolean $isPremium
     * @return Path
     */
    public function setIsPremium($isPremium)
    {
        $this->is_premium = $isPremium;

        return $this;
    }

    /**
     * Get is_premium
     *
     * @return boolean 
     */
    public function getIsPremium()
    {
        return $this->is_premium;
    }

    /**
     * Set sort_order
     *
     * @param integer $sortOrder
     * @return Path
     */
    public function setSortOrder($sortOrder)
    {
        $this->sort_order = $sortOrder;

        return $this;
    }

    /**
     * Get sort_order
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Path
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
     * @return Path
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
     * Set Publication
     *
     * @param \Entity\Cms\Publication $publication
     * @return Path
     */
    public function setPublication(\Entity\Cms\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get Publication
     *
     * @return \Entity\Cms\Publication 
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}
