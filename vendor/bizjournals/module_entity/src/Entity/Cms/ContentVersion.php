<?php

namespace Entity\Cms;

/**
 * ContentVersion
 */
class ContentVersion extends \Entity\Entity\Base
{
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
    private $content_type = 'story';

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug = 'index';

    /**
     * @var integer
     */
    private $pub_id = 2661;

    /**
     * @var integer
     */
    private $frontend_id;

    /**
     * @var integer
     */
    private $last_published_version;

    /**
     * @var string
     */
    private $json_data = '{}';

    /**
     * @var \DateTime
     */
    private $db_created_at;

    /**
     * @var \DateTime
     */
    private $db_updated_at;

    /**
     * @var string
     */
    private $last_updated_by;

    /**
     * @var string
     */
    private $nilsimsa_digest;

    /**
     * @var integer
     */
    private $parent_frontend_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $AuditLog;

    /**
     * @var \Entity\Cms\Content
     */
    private $Content;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AuditLog = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return ContentVersion
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
     * @return ContentVersion
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
     * Set contentType
     *
     * @param string $contentType
     *
     * @return ContentVersion
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ContentVersion
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ContentVersion
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
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return ContentVersion
     */
    public function setPubId($pubId)
    {
        $this->pub_id = $pubId;

        return $this;
    }

    /**
     * Get pubId
     *
     * @return integer
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set frontendId
     *
     * @param integer $frontendId
     *
     * @return ContentVersion
     */
    public function setFrontendId($frontendId)
    {
        $this->frontend_id = $frontendId;

        return $this;
    }

    /**
     * Get frontendId
     *
     * @return integer
     */
    public function getFrontendId()
    {
        return $this->frontend_id;
    }

    /**
     * Set lastPublishedVersion
     *
     * @param integer $lastPublishedVersion
     *
     * @return ContentVersion
     */
    public function setLastPublishedVersion($lastPublishedVersion)
    {
        $this->last_published_version = $lastPublishedVersion;

        return $this;
    }

    /**
     * Get lastPublishedVersion
     *
     * @return integer
     */
    public function getLastPublishedVersion()
    {
        return $this->last_published_version;
    }

    /**
     * Set jsonData
     *
     * @param string $jsonData
     *
     * @return ContentVersion
     */
    public function setJsonData($jsonData)
    {
        $this->json_data = $jsonData;

        return $this;
    }

    /**
     * Get jsonData
     *
     * @return string
     */
    public function getJsonData()
    {
        return $this->json_data;
    }

    /**
     * Set dbCreatedAt
     *
     * @param \DateTime $dbCreatedAt
     *
     * @return ContentVersion
     */
    public function setDbCreatedAt($dbCreatedAt)
    {
        $this->db_created_at = $dbCreatedAt;

        return $this;
    }

    /**
     * Get dbCreatedAt
     *
     * @return \DateTime
     */
    public function getDbCreatedAt()
    {
        return $this->db_created_at;
    }

    /**
     * Set dbUpdatedAt
     *
     * @param \DateTime $dbUpdatedAt
     *
     * @return ContentVersion
     */
    public function setDbUpdatedAt($dbUpdatedAt)
    {
        $this->db_updated_at = $dbUpdatedAt;

        return $this;
    }

    /**
     * Get dbUpdatedAt
     *
     * @return \DateTime
     */
    public function getDbUpdatedAt()
    {
        return $this->db_updated_at;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param string $lastUpdatedBy
     *
     * @return ContentVersion
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->last_updated_by = $lastUpdatedBy;

        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return string
     */
    public function getLastUpdatedBy()
    {
        return $this->last_updated_by;
    }

    /**
     * Set nilsimsaDigest
     *
     * @param string $nilsimsaDigest
     *
     * @return ContentVersion
     */
    public function setNilsimsaDigest($nilsimsaDigest)
    {
        $this->nilsimsa_digest = $nilsimsaDigest;

        return $this;
    }

    /**
     * Get nilsimsaDigest
     *
     * @return string
     */
    public function getNilsimsaDigest()
    {
        return $this->nilsimsa_digest;
    }

    /**
     * Set parentFrontendId
     *
     * @param integer $parentFrontendId
     *
     * @return ContentVersion
     */
    public function setParentFrontendId($parentFrontendId)
    {
        $this->parent_frontend_id = $parentFrontendId;

        return $this;
    }

    /**
     * Get parentFrontendId
     *
     * @return integer
     */
    public function getParentFrontendId()
    {
        return $this->parent_frontend_id;
    }

    /**
     * Add auditLog
     *
     * @param \Entity\Cms\AuditLog $auditLog
     *
     * @return ContentVersion
     */
    public function addAuditLog(\Entity\Cms\AuditLog $auditLog)
    {
        $this->AuditLog[] = $auditLog;

        return $this;
    }

    /**
     * Remove auditLog
     *
     * @param \Entity\Cms\AuditLog $auditLog
     */
    public function removeAuditLog(\Entity\Cms\AuditLog $auditLog)
    {
        $this->AuditLog->removeElement($auditLog);
    }

    /**
     * Get auditLog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuditLog()
    {
        return $this->AuditLog;
    }

    /**
     * Set content
     *
     * @param \Entity\Cms\Content $content
     *
     * @return ContentVersion
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
}

