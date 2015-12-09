<?php

namespace Entity\Medialibrary;

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
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return BatchMedia
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
     * Set batchId
     *
     * @param integer $batchId
     *
     * @return BatchMedia
     */
    public function setBatchId($batchId)
    {
        $this->batch_id = $batchId;

        return $this;
    }

    /**
     * Get batchId
     *
     * @return integer
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BatchMedia
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
     * Set batchUpload
     *
     * @param \Entity\Medialibrary\BatchUpload $batchUpload
     *
     * @return BatchMedia
     */
    public function setBatchUpload(\Entity\Medialibrary\BatchUpload $batchUpload = null)
    {
        $this->BatchUpload = $batchUpload;

        return $this;
    }

    /**
     * Get batchUpload
     *
     * @return \Entity\Medialibrary\BatchUpload
     */
    public function getBatchUpload()
    {
        return $this->BatchUpload;
    }

    /**
     * Set media
     *
     * @param \Entity\Medialibrary\Media $media
     *
     * @return BatchMedia
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

