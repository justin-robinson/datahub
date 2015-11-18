<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaLink
 */
class MediaLink extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $link_id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var string
     */
    private $use_source = 'unknown';

    /**
     * @var integer
     */
    private $cms_id = 0;

    /**
     * @var string
     */
    private $page_url;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Medialibrary\Media
     */
    private $Media;

    /**
     * @var \Entity\Medialibrary\Publication
     */
    private $Publication;


    /**
     * Get link_id
     *
     * @return integer 
     */
    public function getLinkId()
    {
        return $this->link_id;
    }

    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return MediaLink
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
    }

    /**
     * Get media_id
     *
     * @return integer 
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set pub_id
     *
     * @param integer $pubId
     * @return MediaLink
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
     * Set use_source
     *
     * @param string $useSource
     * @return MediaLink
     */
    public function setUseSource($useSource)
    {
        $this->use_source = $useSource;

        return $this;
    }

    /**
     * Get use_source
     *
     * @return string 
     */
    public function getUseSource()
    {
        return $this->use_source;
    }

    /**
     * Set cms_id
     *
     * @param integer $cmsId
     * @return MediaLink
     */
    public function setCmsId($cmsId)
    {
        $this->cms_id = $cmsId;

        return $this;
    }

    /**
     * Get cms_id
     *
     * @return integer 
     */
    public function getCmsId()
    {
        return $this->cms_id;
    }

    /**
     * Set page_url
     *
     * @param string $pageUrl
     * @return MediaLink
     */
    public function setPageUrl($pageUrl)
    {
        $this->page_url = $pageUrl;

        return $this;
    }

    /**
     * Get page_url
     *
     * @return string 
     */
    public function getPageUrl()
    {
        return $this->page_url;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MediaLink
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
     * @return MediaLink
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
     * Set Media
     *
     * @param \Entity\Medialibrary\Media $media
     * @return MediaLink
     */
    public function setMedia(\Entity\Medialibrary\Media $media = null)
    {
        $this->Media = $media;

        return $this;
    }

    /**
     * Get Media
     *
     * @return \Entity\Medialibrary\Media 
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Set Publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     * @return MediaLink
     */
    public function setPublication(\Entity\Medialibrary\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get Publication
     *
     * @return \Entity\Medialibrary\Publication 
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}
