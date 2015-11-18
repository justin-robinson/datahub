<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageCmsLink
 */
class PageCmsLink extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var \DateTime
     */
    private $reserve_time;

    /**
     * @var \DateTime
     */
    private $publish_time;

    /**
     * @var \DateTime
     */
    private $revision_time;

    /**
     * @var \DateTime
     */
    private $delete_time;

    /**
     * @var \DateTime
     */
    private $delete_issue_date;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $headline;

    /**
     * @var integer
     */
    private $type_id = 0;

    /**
     * @var string
     */
    private $source = 'cms';


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
     * Set reserve_time
     *
     * @param \DateTime $reserveTime
     * @return PageCmsLink
     */
    public function setReserveTime($reserveTime)
    {
        $this->reserve_time = $reserveTime;

        return $this;
    }

    /**
     * Get reserve_time
     *
     * @return \DateTime 
     */
    public function getReserveTime()
    {
        return $this->reserve_time;
    }

    /**
     * Set publish_time
     *
     * @param \DateTime $publishTime
     * @return PageCmsLink
     */
    public function setPublishTime($publishTime)
    {
        $this->publish_time = $publishTime;

        return $this;
    }

    /**
     * Get publish_time
     *
     * @return \DateTime 
     */
    public function getPublishTime()
    {
        return $this->publish_time;
    }

    /**
     * Set revision_time
     *
     * @param \DateTime $revisionTime
     * @return PageCmsLink
     */
    public function setRevisionTime($revisionTime)
    {
        $this->revision_time = $revisionTime;

        return $this;
    }

    /**
     * Get revision_time
     *
     * @return \DateTime 
     */
    public function getRevisionTime()
    {
        return $this->revision_time;
    }

    /**
     * Set delete_time
     *
     * @param \DateTime $deleteTime
     * @return PageCmsLink
     */
    public function setDeleteTime($deleteTime)
    {
        $this->delete_time = $deleteTime;

        return $this;
    }

    /**
     * Get delete_time
     *
     * @return \DateTime 
     */
    public function getDeleteTime()
    {
        return $this->delete_time;
    }

    /**
     * Set delete_issue_date
     *
     * @param \DateTime $deleteIssueDate
     * @return PageCmsLink
     */
    public function setDeleteIssueDate($deleteIssueDate)
    {
        $this->delete_issue_date = $deleteIssueDate;

        return $this;
    }

    /**
     * Get delete_issue_date
     *
     * @return \DateTime 
     */
    public function getDeleteIssueDate()
    {
        return $this->delete_issue_date;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return PageCmsLink
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set headline
     *
     * @param string $headline
     * @return PageCmsLink
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string 
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set type_id
     *
     * @param integer $typeId
     * @return PageCmsLink
     */
    public function setTypeId($typeId)
    {
        $this->type_id = $typeId;

        return $this;
    }

    /**
     * Get type_id
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return PageCmsLink
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }
}
