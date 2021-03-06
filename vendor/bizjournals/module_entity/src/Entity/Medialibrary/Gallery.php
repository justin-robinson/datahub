<?php

namespace Entity\Medialibrary;

/**
 * Gallery
 */
class Gallery extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $gallery_id;

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var string
     */
    private $category = 'editorial';

    /**
     * @var string
     */
    private $title = 'New Gallery';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $gallery_type = 'curate';

    /**
     * @var string
     */
    private $auto_query;

    /**
     * @var boolean
     */
    private $is_pub_restricted = false;

    /**
     * @var boolean
     */
    private $is_live = true;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $GalleryMedia;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->GalleryMedia = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return Gallery
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
     * Set category
     *
     * @param string $category
     *
     * @return Gallery
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Gallery
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
     * Set description
     *
     * @param string $description
     *
     * @return Gallery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set galleryType
     *
     * @param string $galleryType
     *
     * @return Gallery
     */
    public function setGalleryType($galleryType)
    {
        $this->gallery_type = $galleryType;

        return $this;
    }

    /**
     * Get galleryType
     *
     * @return string
     */
    public function getGalleryType()
    {
        return $this->gallery_type;
    }

    /**
     * Set autoQuery
     *
     * @param string $autoQuery
     *
     * @return Gallery
     */
    public function setAutoQuery($autoQuery)
    {
        $this->auto_query = $autoQuery;

        return $this;
    }

    /**
     * Get autoQuery
     *
     * @return string
     */
    public function getAutoQuery()
    {
        return $this->auto_query;
    }

    /**
     * Set isPubRestricted
     *
     * @param boolean $isPubRestricted
     *
     * @return Gallery
     */
    public function setIsPubRestricted($isPubRestricted)
    {
        $this->is_pub_restricted = $isPubRestricted;

        return $this;
    }

    /**
     * Get isPubRestricted
     *
     * @return boolean
     */
    public function getIsPubRestricted()
    {
        return $this->is_pub_restricted;
    }

    /**
     * Set isLive
     *
     * @param boolean $isLive
     *
     * @return Gallery
     */
    public function setIsLive($isLive)
    {
        $this->is_live = $isLive;

        return $this;
    }

    /**
     * Get isLive
     *
     * @return boolean
     */
    public function getIsLive()
    {
        return $this->is_live;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Gallery
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
     * @return Gallery
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
     * Add galleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     *
     * @return Gallery
     */
    public function addGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia[] = $galleryMedia;

        return $this;
    }

    /**
     * Remove galleryMedia
     *
     * @param \Entity\Medialibrary\GalleryMedia $galleryMedia
     */
    public function removeGalleryMedia(\Entity\Medialibrary\GalleryMedia $galleryMedia)
    {
        $this->GalleryMedia->removeElement($galleryMedia);
    }

    /**
     * Get galleryMedia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleryMedia()
    {
        return $this->GalleryMedia;
    }
}

