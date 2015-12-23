<?php

namespace Entity\Medialibrary;

/**
 * MediaCrop
 */
class MediaCrop extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $crop_id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $ratio;

    /**
     * @var string
     */
    private $cropdata;

    /**
     * @var boolean
     */
    private $is_default = false;

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
     * Get cropId
     *
     * @return integer
     */
    public function getCropId()
    {
        return $this->crop_id;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return MediaCrop
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
     * Set ratio
     *
     * @param string $ratio
     *
     * @return MediaCrop
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * Get ratio
     *
     * @return string
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * Set cropdata
     *
     * @param string $cropdata
     *
     * @return MediaCrop
     */
    public function setCropdata($cropdata)
    {
        $this->cropdata = $cropdata;

        return $this;
    }

    /**
     * Get cropdata
     *
     * @return string
     */
    public function getCropdata()
    {
        return $this->cropdata;
    }

    /**
     * Set isDefault
     *
     * @param boolean $isDefault
     *
     * @return MediaCrop
     */
    public function setIsDefault($isDefault)
    {
        $this->is_default = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->is_default;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MediaCrop
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
     * @return MediaCrop
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
     * @return MediaCrop
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

