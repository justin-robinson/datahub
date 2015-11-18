<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * BatchMedia
 */
class BatchMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $batch_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Medialibrary\BatchUpload
     */
    private $BatchUpload;

    /**
     * @var \Entity\Medialibrary\Media
     */
    private $Media;


    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return BatchMedia
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
     * Set batch_id
     *
     * @param integer $batchId
     * @return BatchMedia
     */
    public function setBatchId($batchId)
    {
        $this->batch_id = $batchId;

        return $this;
    }

    /**
     * Get batch_id
     *
     * @return integer 
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return BatchMedia
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
     * Set BatchUpload
     *
     * @param \Entity\Medialibrary\BatchUpload $batchUpload
     * @return BatchMedia
     */
    public function setBatchUpload(\Entity\Medialibrary\BatchUpload $batchUpload = null)
    {
        $this->BatchUpload = $batchUpload;

        return $this;
    }

    /**
     * Get BatchUpload
     *
     * @return \Entity\Medialibrary\BatchUpload 
     */
    public function getBatchUpload()
    {
        return $this->BatchUpload;
    }

    /**
     * Set Media
     *
     * @param \Entity\Medialibrary\Media $media
     * @return BatchMedia
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
