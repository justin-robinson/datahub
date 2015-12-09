<?php

namespace Entity\Medialibrary;

/**
 * MediaTag
 */
class MediaTag extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $tag_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Medialibrary\Media
     */
    private $Media;

    /**
     * @var \Entity\Medialibrary\Tag
     */
    private $Tag;


    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return MediaTag
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
     * Set tagId
     *
     * @param integer $tagId
     *
     * @return MediaTag
     */
    public function setTagId($tagId)
    {
        $this->tag_id = $tagId;

        return $this;
    }

    /**
     * Get tagId
     *
     * @return integer
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MediaTag
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
     * Set media
     *
     * @param \Entity\Medialibrary\Media $media
     *
     * @return MediaTag
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

    /**
     * Set tag
     *
     * @param \Entity\Medialibrary\Tag $tag
     *
     * @return MediaTag
     */
    public function setTag(\Entity\Medialibrary\Tag $tag = null)
    {
        $this->Tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Entity\Medialibrary\Tag
     */
    public function getTag()
    {
        return $this->Tag;
    }
}

