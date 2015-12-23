<?php

namespace Entity\Medialibrary;

/**
 * GalleryMedia
 */
class GalleryMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $gallery_id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $crop_data;

    /**
     * @var string
     */
    private $title = '';

    /**
     * @var string
     */
    private $caption = '';

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Medialibrary\Gallery
     */
    private $Gallery;

    /**
     * @var \Entity\Medialibrary\Media
     */
    private $Media;


    /**
     * Set galleryId
     *
     * @param integer $galleryId
     *
     * @return GalleryMedia
     */
    public function setGalleryId($galleryId)
    {
        $this->gallery_id = $galleryId;

        return $this;
    }

    /**
     * Get galleryId
     *
     * @return integer
     */
    public function getGalleryId()
    {
        return $this->gallery_id;
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return GalleryMedia
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
     * Set ord
     *
     * @param integer $ord
     *
     * @return GalleryMedia
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set cropData
     *
     * @param string $cropData
     *
     * @return GalleryMedia
     */
    public function setCropData($cropData)
    {
        $this->crop_data = $cropData;

        return $this;
    }

    /**
     * Get cropData
     *
     * @return string
     */
    public function getCropData()
    {
        return $this->crop_data;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return GalleryMedia
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
     * Set caption
     *
     * @param string $caption
     *
     * @return GalleryMedia
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GalleryMedia
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
     * @return GalleryMedia
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
     * Set gallery
     *
     * @param \Entity\Medialibrary\Gallery $gallery
     *
     * @return GalleryMedia
     */
    public function setGallery(\Entity\Medialibrary\Gallery $gallery = null)
    {
        $this->Gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \Entity\Medialibrary\Gallery
     */
    public function getGallery()
    {
        return $this->Gallery;
    }

    /**
     * Set media
     *
     * @param \Entity\Medialibrary\Media $media
     *
     * @return GalleryMedia
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

