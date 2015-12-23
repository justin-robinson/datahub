<?php

namespace Entity\Bizj;

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
     * Get sectionId
     *
     * @return integer
     */
    public function getSectionId()
    {
        return $this->section_id;
    }

    /**
     * Set siteId
     *
     * @param integer $siteId
     *
     * @return SiteSection
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get siteId
     *
     * @return integer
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set sectionSlug
     *
     * @param string $sectionSlug
     *
     * @return SiteSection
     */
    public function setSectionSlug($sectionSlug)
    {
        $this->section_slug = $sectionSlug;

        return $this;
    }

    /**
     * Get sectionSlug
     *
     * @return string
     */
    public function getSectionSlug()
    {
        return $this->section_slug;
    }

    /**
     * Set sectionName
     *
     * @param string $sectionName
     *
     * @return SiteSection
     */
    public function setSectionName($sectionName)
    {
        $this->section_name = $sectionName;

        return $this;
    }

    /**
     * Get sectionName
     *
     * @return string
     */
    public function getSectionName()
    {
        return $this->section_name;
    }

    /**
     * Set sectionCrumb
     *
     * @param string $sectionCrumb
     *
     * @return SiteSection
     */
    public function setSectionCrumb($sectionCrumb)
    {
        $this->section_crumb = $sectionCrumb;

        return $this;
    }

    /**
     * Get sectionCrumb
     *
     * @return string
     */
    public function getSectionCrumb()
    {
        return $this->section_crumb;
    }

    /**
     * Set sectionUrl
     *
     * @param string $sectionUrl
     *
     * @return SiteSection
     */
    public function setSectionUrl($sectionUrl)
    {
        $this->section_url = $sectionUrl;

        return $this;
    }

    /**
     * Get sectionUrl
     *
     * @return string
     */
    public function getSectionUrl()
    {
        return $this->section_url;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return SiteSection
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SiteSection
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
     * @return SiteSection
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
     * Set lft
     *
     * @param integer $lft
     *
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
     *
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
     *
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
     * Set site
     *
     * @param \Entity\Bizj\Site $site
     *
     * @return SiteSection
     */
    public function setSite(\Entity\Bizj\Site $site = null)
    {
        $this->Site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \Entity\Bizj\Site
     */
    public function getSite()
    {
        return $this->Site;
    }
}

