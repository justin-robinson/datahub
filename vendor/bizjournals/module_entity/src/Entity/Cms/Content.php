<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 */
class Content extends \Entity\Entity\Base
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
    private $last_updated_by = '';

    /**
     * @var string
     */
    private $nilsimsa_digest;

    /**
     * @var integer
     */
    private $parent_frontend_id;

    /**
     * @var integer
     */
    private $parent_content_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Versions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $AuditLog;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ContentDesk;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ContentWorkspace;

    /**
     * @var \Entity\Cms\Publication
     */
    private $Publication;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Versions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AuditLog = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ContentDesk = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ContentWorkspace = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get content_id
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
     * @return Content
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
     * Set content_type
     *
     * @param string $contentType
     * @return Content
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get content_type
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
     * @return Content
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
     * @return Content
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
     * Set pub_id
     *
     * @param integer $pubId
     * @return Content
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
     * Set frontend_id
     *
     * @param integer $frontendId
     * @return Content
     */
    public function setFrontendId($frontendId)
    {
        $this->frontend_id = $frontendId;

        return $this;
    }

    /**
     * Get frontend_id
     *
     * @return integer 
     */
    public function getFrontendId()
    {
        return $this->frontend_id;
    }

    /**
     * Set last_published_version
     *
     * @param integer $lastPublishedVersion
     * @return Content
     */
    public function setLastPublishedVersion($lastPublishedVersion)
    {
        $this->last_published_version = $lastPublishedVersion;

        return $this;
    }

    /**
     * Get last_published_version
     *
     * @return integer 
     */
    public function getLastPublishedVersion()
    {
        return $this->last_published_version;
    }

    /**
     * Set json_data
     *
     * @param string $jsonData
     * @return Content
     */
    public function setJsonData($jsonData)
    {
        $this->json_data = $jsonData;

        return $this;
    }

    /**
     * Get json_data
     *
     * @return string 
     */
    public function getJsonData()
    {
        return $this->json_data;
    }

    /**
     * Set db_created_at
     *
     * @param \DateTime $dbCreatedAt
     * @return Content
     */
    public function setDbCreatedAt($dbCreatedAt)
    {
        $this->db_created_at = $dbCreatedAt;

        return $this;
    }

    /**
     * Get db_created_at
     *
     * @return \DateTime 
     */
    public function getDbCreatedAt()
    {
        return $this->db_created_at;
    }

    /**
     * Set db_updated_at
     *
     * @param \DateTime $dbUpdatedAt
     * @return Content
     */
    public function setDbUpdatedAt($dbUpdatedAt)
    {
        $this->db_updated_at = $dbUpdatedAt;

        return $this;
    }

    /**
     * Get db_updated_at
     *
     * @return \DateTime 
     */
    public function getDbUpdatedAt()
    {
        return $this->db_updated_at;
    }

    /**
     * Set last_updated_by
     *
     * @param string $lastUpdatedBy
     * @return Content
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->last_updated_by = $lastUpdatedBy;

        return $this;
    }

    /**
     * Get last_updated_by
     *
     * @return string 
     */
    public function getLastUpdatedBy()
    {
        return $this->last_updated_by;
    }

    /**
     * Set nilsimsa_digest
     *
     * @param string $nilsimsaDigest
     * @return Content
     */
    public function setNilsimsaDigest($nilsimsaDigest)
    {
        $this->nilsimsa_digest = $nilsimsaDigest;

        return $this;
    }

    /**
     * Get nilsimsa_digest
     *
     * @return string 
     */
    public function getNilsimsaDigest()
    {
        return $this->nilsimsa_digest;
    }

    /**
     * Set parent_frontend_id
     *
     * @param integer $parentFrontendId
     * @return Content
     */
    public function setParentFrontendId($parentFrontendId)
    {
        $this->parent_frontend_id = $parentFrontendId;

        return $this;
    }

    /**
     * Get parent_frontend_id
     *
     * @return integer 
     */
    public function getParentFrontendId()
    {
        return $this->parent_frontend_id;
    }

    /**
     * Set parent_content_id
     *
     * @param integer $parentContentId
     * @return Content
     */
    public function setParentContentId($parentContentId)
    {
        $this->parent_content_id = $parentContentId;

        return $this;
    }

    /**
     * Get parent_content_id
     *
     * @return integer 
     */
    public function getParentContentId()
    {
        return $this->parent_content_id;
    }

    /**
     * Add Versions
     *
     * @param \Entity\Cms\ContentVersion $versions
     * @return Content
     */
    public function addVersion(\Entity\Cms\ContentVersion $versions)
    {
        $this->Versions[] = $versions;

        return $this;
    }

    /**
     * Remove Versions
     *
     * @param \Entity\Cms\ContentVersion $versions
     */
    public function removeVersion(\Entity\Cms\ContentVersion $versions)
    {
        $this->Versions->removeElement($versions);
    }

    /**
     * Get Versions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVersions()
    {
        return $this->Versions;
    }

    /**
     * Add AuditLog
     *
     * @param \Entity\Cms\AuditLog $auditLog
     * @return Content
     */
    public function addAuditLog(\Entity\Cms\AuditLog $auditLog)
    {
        $this->AuditLog[] = $auditLog;

        return $this;
    }

    /**
     * Remove AuditLog
     *
     * @param \Entity\Cms\AuditLog $auditLog
     */
    public function removeAuditLog(\Entity\Cms\AuditLog $auditLog)
    {
        $this->AuditLog->removeElement($auditLog);
    }

    /**
     * Get AuditLog
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuditLog()
    {
        return $this->AuditLog;
    }

    /**
     * Add ContentDesk
     *
     * @param \Entity\Cms\ContentDesk $contentDesk
     * @return Content
     */
    public function addContentDesk(\Entity\Cms\ContentDesk $contentDesk)
    {
        $this->ContentDesk[] = $contentDesk;

        return $this;
    }

    /**
     * Remove ContentDesk
     *
     * @param \Entity\Cms\ContentDesk $contentDesk
     */
    public function removeContentDesk(\Entity\Cms\ContentDesk $contentDesk)
    {
        $this->ContentDesk->removeElement($contentDesk);
    }

    /**
     * Get ContentDesk
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContentDesk()
    {
        return $this->ContentDesk;
    }

    /**
     * Add ContentWorkspace
     *
     * @param \Entity\Cms\ContentWorkspace $contentWorkspace
     * @return Content
     */
    public function addContentWorkspace(\Entity\Cms\ContentWorkspace $contentWorkspace)
    {
        $this->ContentWorkspace[] = $contentWorkspace;

        return $this;
    }

    /**
     * Remove ContentWorkspace
     *
     * @param \Entity\Cms\ContentWorkspace $contentWorkspace
     */
    public function removeContentWorkspace(\Entity\Cms\ContentWorkspace $contentWorkspace)
    {
        $this->ContentWorkspace->removeElement($contentWorkspace);
    }

    /**
     * Get ContentWorkspace
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContentWorkspace()
    {
        return $this->ContentWorkspace;
    }

    /**
     * Set Publication
     *
     * @param \Entity\Cms\Publication $publication
     * @return Content
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
