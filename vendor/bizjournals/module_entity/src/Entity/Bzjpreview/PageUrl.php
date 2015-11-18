<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageUrl
 */
class PageUrl extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $url_id;

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
    private $slug;

    /**
     * @var \DateTime
     */
    private $issue_date;

    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var boolean
     */
    private $is_primary = false;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var boolean
     */
    private $is_redirect = false;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bzjpreview\Page
     */
    private $Page;


    /**
     * Get url_id
     *
     * @return integer 
     */
    public function getUrlId()
    {
        return $this->url_id;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return PageUrl
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
     * @return PageUrl
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
     * Set slug
     *
     * @param string $slug
     * @return PageUrl
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set issue_date
     *
     * @param \DateTime $issueDate
     * @return PageUrl
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;

        return $this;
    }

    /**
     * Get issue_date
     *
     * @return \DateTime 
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageUrl
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
     * Set is_primary
     *
     * @param boolean $isPrimary
     * @return PageUrl
     */
    public function setIsPrimary($isPrimary)
    {
        $this->is_primary = $isPrimary;

        return $this;
    }

    /**
     * Get is_primary
     *
     * @return boolean 
     */
    public function getIsPrimary()
    {
        return $this->is_primary;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return PageUrl
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
     * Set is_redirect
     *
     * @param boolean $isRedirect
     * @return PageUrl
     */
    public function setIsRedirect($isRedirect)
    {
        $this->is_redirect = $isRedirect;

        return $this;
    }

    /**
     * Get is_redirect
     *
     * @return boolean 
     */
    public function getIsRedirect()
    {
        return $this->is_redirect;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PageUrl
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
     * @return PageUrl
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
     * Set Page
     *
     * @param \Entity\Bzjpreview\Page $page
     * @return PageUrl
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
