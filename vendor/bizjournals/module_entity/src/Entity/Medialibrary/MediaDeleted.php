<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Set media_id
     *
     * @param integer $mediaId
     * @return MediaDeleted
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
     * Set relative_path
     *
     * @param string $relativePath
     * @return MediaDeleted
     */
    public function setRelativePath($relativePath)
    {
        $this->relative_path = $relativePath;

        return $this;
    }

    /**
     * Get relative_path
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MediaDeleted
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
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return MediaDeleted
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}
