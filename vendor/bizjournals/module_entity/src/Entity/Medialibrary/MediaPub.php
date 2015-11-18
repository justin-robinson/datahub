<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaPub
 */
class MediaPub extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Medialibrary\Media
     */
    private $Media;

    /**
     * @var \Entity\Medialibrary\Publication
     */
    private $Publication;


    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return MediaPub
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
     * @return MediaPub
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MediaPub
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
     * Set Media
     *
     * @param \Entity\Medialibrary\Media $media
     * @return MediaPub
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
     * @return MediaPub
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
