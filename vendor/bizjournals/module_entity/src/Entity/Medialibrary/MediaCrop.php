<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Get crop_id
     *
     * @return integer 
     */
    public function getCropId()
    {
        return $this->crop_id;
    }

    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return MediaCrop
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
     * Set ratio
     *
     * @param string $ratio
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
     * Set is_default
     *
     * @param boolean $isDefault
     * @return MediaCrop
     */
    public function setIsDefault($isDefault)
    {
        $this->is_default = $isDefault;

        return $this;
    }

    /**
     * Get is_default
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->is_default;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MediaCrop
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
     * @return MediaCrop
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
     * @return MediaCrop
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
}
