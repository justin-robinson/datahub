<?php

namespace Entity\Medialibrary;

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
     * Get linkId
     *
     * @return integer
     */
    public function getLinkId()
    {
        return $this->link_id;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return MediaLink
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
    }

    /**
     * Get mediaId
     *
     * @return integer
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return MediaLink
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
     * Set useSource
     *
     * @param string $useSource
     *
     * @return MediaLink
     */
    public function setUseSource($useSource)
    {
        $this->use_source = $useSource;

        return $this;
    }

    /**
     * Get useSource
     *
     * @return string
     */
    public function getUseSource()
    {
        return $this->use_source;
    }

    /**
     * Set cmsId
     *
     * @param integer $cmsId
     *
     * @return MediaLink
     */
    public function setCmsId($cmsId)
    {
        $this->cms_id = $cmsId;

        return $this;
    }

    /**
     * Get cmsId
     *
     * @return integer
     */
    public function getCmsId()
    {
        return $this->cms_id;
    }

    /**
     * Set pageUrl
     *
     * @param string $pageUrl
     *
     * @return MediaLink
     */
    public function setPageUrl($pageUrl)
    {
        $this->page_url = $pageUrl;

        return $this;
    }

    /**
     * Get pageUrl
     *
     * @return string
     */
    public function getPageUrl()
    {
        return $this->page_url;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MediaLink
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
     * @return MediaLink
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
     * Set media
     *
     * @param \Entity\Medialibrary\Media $media
     *
     * @return MediaLink
     */
    public function setMedia(\Entity\Medialibrary\Media $media = null)
    {
        $this->Media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Entity\Medialibrary\Media
     */
    public function getMedia()
    {
        return $this->Media;
    }

    /**
     * Set publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     *
     * @return MediaLink
     */
    public function setPublication(\Entity\Medialibrary\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \Entity\Medialibrary\Publication
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}

