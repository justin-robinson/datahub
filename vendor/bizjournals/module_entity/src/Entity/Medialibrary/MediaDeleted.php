<?php

namespace Entity\Medialibrary;

/**
 * MediaDeleted
 */
class MediaDeleted extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $relative_path;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;


    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return MediaDeleted
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
     * Set relativePath
     *
     * @param string $relativePath
     *
     * @return MediaDeleted
     */
    public function setRelativePath($relativePath)
    {
        $this->relative_path = $relativePath;

        return $this;
    }

    /**
     * Get relativePath
     *
     * @return string
     */
    public function getRelativePath()
    {
        return $this->relative_path;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return MediaDeleted
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MediaDeleted
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return MediaDeleted
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}

