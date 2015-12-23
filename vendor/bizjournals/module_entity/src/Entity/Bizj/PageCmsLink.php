<?php

namespace Entity\Bizj;

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
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set reserveTime
     *
     * @param \DateTime $reserveTime
     *
     * @return PageCmsLink
     */
    public function setReserveTime($reserveTime)
    {
        $this->reserve_time = $reserveTime;

        return $this;
    }

    /**
     * Get reserveTime
     *
     * @return \DateTime
     */
    public function getReserveTime()
    {
        return $this->reserve_time;
    }

    /**
     * Set publishTime
     *
     * @param \DateTime $publishTime
     *
     * @return PageCmsLink
     */
    public function setPublishTime($publishTime)
    {
        $this->publish_time = $publishTime;

        return $this;
    }

    /**
     * Get publishTime
     *
     * @return \DateTime
     */
    public function getPublishTime()
    {
        return $this->publish_time;
    }

    /**
     * Set revisionTime
     *
     * @param \DateTime $revisionTime
     *
     * @return PageCmsLink
     */
    public function setRevisionTime($revisionTime)
    {
        $this->revision_time = $revisionTime;

        return $this;
    }

    /**
     * Get revisionTime
     *
     * @return \DateTime
     */
    public function getRevisionTime()
    {
        return $this->revision_time;
    }

    /**
     * Set deleteTime
     *
     * @param \DateTime $deleteTime
     *
     * @return PageCmsLink
     */
    public function setDeleteTime($deleteTime)
    {
        $this->delete_time = $deleteTime;

        return $this;
    }

    /**
     * Get deleteTime
     *
     * @return \DateTime
     */
    public function getDeleteTime()
    {
        return $this->delete_time;
    }

    /**
     * Set deleteIssueDate
     *
     * @param \DateTime $deleteIssueDate
     *
     * @return PageCmsLink
     */
    public function setDeleteIssueDate($deleteIssueDate)
    {
        $this->delete_issue_date = $deleteIssueDate;

        return $this;
    }

    /**
     * Get deleteIssueDate
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
     *
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
     *
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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return PageCmsLink
     */
    public function setTypeId($typeId)
    {
        $this->type_id = $typeId;

        return $this;
    }

    /**
     * Get typeId
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
     *
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

