<?php

namespace Entity\Cms;

/**
 * AuditLog
 */
class AuditLog extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $content_id;

    /**
     * @var integer
     */
    private $version;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $detail;

    /**
     * @var string
     */
    private $updated_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Cms\Content
     */
    private $Content;

    /**
     * @var \Entity\Cms\ContentVersion
     */
    private $ContentVersion;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return AuditLog
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return integer
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * Set version
     *
     * @param integer $version
     *
     * @return AuditLog
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return AuditLog
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return AuditLog
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return AuditLog
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AuditLog
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
     * Set content
     *
     * @param \Entity\Cms\Content $content
     *
     * @return AuditLog
     */
    public function setContent(\Entity\Cms\Content $content = null)
    {
        $this->Content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Entity\Cms\Content
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Set contentVersion
     *
     * @param \Entity\Cms\ContentVersion $contentVersion
     *
     * @return AuditLog
     */
    public function setContentVersion(\Entity\Cms\ContentVersion $contentVersion = null)
    {
        $this->ContentVersion = $contentVersion;

        return $this;
    }

    /**
     * Get contentVersion
     *
     * @return \Entity\Cms\ContentVersion
     */
    public function getContentVersion()
    {
        return $this->ContentVersion;
    }
}

