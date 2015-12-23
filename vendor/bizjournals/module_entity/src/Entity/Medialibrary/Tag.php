<?php

namespace Entity\Medialibrary;

/**
 * Tag
 */
class Tag extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $tag_id;

    /**
     * @var string
     */
    private $tag_name;

    /**
     * @var string
     */
    private $tag_type = 'folder';

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaTags;

    /**
     * @var \Entity\Medialibrary\Publication
     */
    private $Publication;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MediaTags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tagName
     *
     * @param string $tagName
     *
     * @return Tag
     */
    public function setTagName($tagName)
    {
        $this->tag_name = $tagName;

        return $this;
    }

    /**
     * Get tagName
     *
     * @return string
     */
    public function getTagName()
    {
        return $this->tag_name;
    }

    /**
     * Set tagType
     *
     * @param string $tagType
     *
     * @return Tag
     */
    public function setTagType($tagType)
    {
        $this->tag_type = $tagType;

        return $this;
    }

    /**
     * Get tagType
     *
     * @return string
     */
    public function getTagType()
    {
        return $this->tag_type;
    }

    /**
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return Tag
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tag
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
     * Add mediaTag
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTag
     *
     * @return Tag
     */
    public function addMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {
        $this->MediaTags[] = $mediaTag;

        return $this;
    }

    /**
     * Remove mediaTag
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTag
     */
    public function removeMediaTag(\Entity\Medialibrary\MediaTag $mediaTag)
    {
        $this->MediaTags->removeElement($mediaTag);
    }

    /**
     * Get mediaTags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaTags()
    {
        return $this->MediaTags;
    }

    /**
     * Set publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     *
     * @return Tag
     */
    public function setPublication(\Entity\Medialibrary\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \Entity\Medialibrary\Publication
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}

