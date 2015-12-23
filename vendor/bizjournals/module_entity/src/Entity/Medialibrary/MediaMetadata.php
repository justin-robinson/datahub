<?php

namespace Entity\Medialibrary;

/**
 * MediaMetadata
 */
class MediaMetadata extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $meta_id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $meta_group = 'attribute';

    /**
     * @var string
     */
    private $meta_name;

    /**
     * @var string
     */
    private $meta_value;

    /**
     * @var boolean
     */
    private $is_preferred = false;

    /**
     * @var boolean
     */
    private $is_original = false;

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
     * Get metaId
     *
     * @return integer
     */
    public function getMetaId()
    {
        return $this->meta_id;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return MediaMetadata
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
     * Set metaGroup
     *
     * @param string $metaGroup
     *
     * @return MediaMetadata
     */
    public function setMetaGroup($metaGroup)
    {
        $this->meta_group = $metaGroup;

        return $this;
    }

    /**
     * Get metaGroup
     *
     * @return string
     */
    public function getMetaGroup()
    {
        return $this->meta_group;
    }

    /**
     * Set metaName
     *
     * @param string $metaName
     *
     * @return MediaMetadata
     */
    public function setMetaName($metaName)
    {
        $this->meta_name = $metaName;

        return $this;
    }

    /**
     * Get metaName
     *
     * @return string
     */
    public function getMetaName()
    {
        return $this->meta_name;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     *
     * @return MediaMetadata
     */
    public function setMetaValue($metaValue)
    {
        $this->meta_value = $metaValue;

        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string
     */
    public function getMetaValue()
    {
        return $this->meta_value;
    }

    /**
     * Set isPreferred
     *
     * @param boolean $isPreferred
     *
     * @return MediaMetadata
     */
    public function setIsPreferred($isPreferred)
    {
        $this->is_preferred = $isPreferred;

        return $this;
    }

    /**
     * Get isPreferred
     *
     * @return boolean
     */
    public function getIsPreferred()
    {
        return $this->is_preferred;
    }

    /**
     * Set isOriginal
     *
     * @param boolean $isOriginal
     *
     * @return MediaMetadata
     */
    public function setIsOriginal($isOriginal)
    {
        $this->is_original = $isOriginal;

        return $this;
    }

    /**
     * Get isOriginal
     *
     * @return boolean
     */
    public function getIsOriginal()
    {
        return $this->is_original;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MediaMetadata
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
     * @return MediaMetadata
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
     * @return MediaMetadata
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
}

