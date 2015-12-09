<?php

namespace Entity\Bizj;

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
     * @var \Entity\Bizj\Page
     */
    private $Page;


    /**
     * Get urlId
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
     *
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
     *
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
     *
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
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return PageUrl
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;

        return $this;
    }

    /**
     * Get issueDate
     *
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageUrl
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
     * Set isPrimary
     *
     * @param boolean $isPrimary
     *
     * @return PageUrl
     */
    public function setIsPrimary($isPrimary)
    {
        $this->is_primary = $isPrimary;

        return $this;
    }

    /**
     * Get isPrimary
     *
     * @return boolean
     */
    public function getIsPrimary()
    {
        return $this->is_primary;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return PageUrl
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
     * Set isRedirect
     *
     * @param boolean $isRedirect
     *
     * @return PageUrl
     */
    public function setIsRedirect($isRedirect)
    {
        $this->is_redirect = $isRedirect;

        return $this;
    }

    /**
     * Get isRedirect
     *
     * @return boolean
     */
    public function getIsRedirect()
    {
        return $this->is_redirect;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PageUrl
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
     * @return PageUrl
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
     * Set page
     *
     * @param \Entity\Bizj\Page $page
     *
     * @return PageUrl
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Entity\Bizj\Page
     */
    public function getPage()
    {
        return $this->Page;
    }
}

