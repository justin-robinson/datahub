<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteSection
 */
class SiteSection extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $section_id;

    /**
     * @var integer
     */
    private $site_id;

    /**
     * @var string
     */
    private $section_slug;

    /**
     * @var string
     */
    private $section_name;

    /**
     * @var string
     */
    private $section_crumb;

    /**
     * @var string
     */
    private $section_url;

    /**
     * @var integer
     */
    private $parent_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var integer
     */
    private $lft;

    /**
     * @var integer
     */
    private $rgt;

    /**
     * @var integer
     */
    private $level;

    /**
     * @var \Entity\Bizj\Site
     */
    private $Site;


    /**
     * Get section_id
     *
     * @return integer 
     */
    public function getSectionId()
    {
        return $this->section_id;
    }

    /**
     * Set site_id
     *
     * @param integer $siteId
     * @return SiteSection
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get site_id
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set section_slug
     *
     * @param string $sectionSlug
     * @return SiteSection
     */
    public function setSectionSlug($sectionSlug)
    {
        $this->section_slug = $sectionSlug;

        return $this;
    }

    /**
     * Get section_slug
     *
     * @return string 
     */
    public function getSectionSlug()
    {
        return $this->section_slug;
    }

    /**
     * Set section_name
     *
     * @param string $sectionName
     * @return SiteSection
     */
    public function setSectionName($sectionName)
    {
        $this->section_name = $sectionName;

        return $this;
    }

    /**
     * Get section_name
     *
     * @return string 
     */
    public function getSectionName()
    {
        return $this->section_name;
    }

    /**
     * Set section_crumb
     *
     * @param string $sectionCrumb
     * @return SiteSection
     */
    public function setSectionCrumb($sectionCrumb)
    {
        $this->section_crumb = $sectionCrumb;

        return $this;
    }

    /**
     * Get section_crumb
     *
     * @return string 
     */
    public function getSectionCrumb()
    {
        return $this->section_crumb;
    }

    /**
     * Set section_url
     *
     * @param string $sectionUrl
     * @return SiteSection
     */
    public function setSectionUrl($sectionUrl)
    {
        $this->section_url = $sectionUrl;

        return $this;
    }

    /**
     * Get section_url
     *
     * @return string 
     */
    public function getSectionUrl()
    {
        return $this->section_url;
    }

    /**
     * Set parent_id
     *
     * @param integer $parentId
     * @return SiteSection
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return SiteSection
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
     * @return SiteSection
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
     * Set lft
     *
     * @param integer $lft
     * @return SiteSection
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return SiteSection
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return SiteSection
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set Site
     *
     * @param \Entity\Bizj\Site $site
     * @return SiteSection
     */
    public function setSite(\Entity\Bizj\Site $site = null)
    {
        $this->Site = $site;

        return $this;
    }

    /**
     * Get Site
     *
     * @return \Entity\Bizj\Site 
     */
    public function getSite()
    {
        return $this->Site;
    }
}
