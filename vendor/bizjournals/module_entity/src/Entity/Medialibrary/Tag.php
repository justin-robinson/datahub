<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Get tag_id
     *
     * @return integer 
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * Set tag_name
     *
     * @param string $tagName
     * @return Tag
     */
    public function setTagName($tagName)
    {
        $this->tag_name = $tagName;

        return $this;
    }

    /**
     * Get tag_name
     *
     * @return string 
     */
    public function getTagName()
    {
        return $this->tag_name;
    }

    /**
     * Set tag_type
     *
     * @param string $tagType
     * @return Tag
     */
    public function setTagType($tagType)
    {
        $this->tag_type = $tagType;

        return $this;
    }

    /**
     * Get tag_type
     *
     * @return string 
     */
    public function getTagType()
    {
        return $this->tag_type;
    }

    /**
     * Set pub_id
     *
     * @param integer $pubId
     * @return Tag
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
     * @return Tag
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
     * Add MediaTags
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTags
     * @return Tag
     */
    public function addMediaTag(\Entity\Medialibrary\MediaTag $mediaTags)
    {
        $this->MediaTags[] = $mediaTags;

        return $this;
    }

    /**
     * Remove MediaTags
     *
     * @param \Entity\Medialibrary\MediaTag $mediaTags
     */
    public function removeMediaTag(\Entity\Medialibrary\MediaTag $mediaTags)
    {
        $this->MediaTags->removeElement($mediaTags);
    }

    /**
     * Get MediaTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaTags()
    {
        return $this->MediaTags;
    }

    /**
     * Set Publication
     *
     * @param \Entity\Medialibrary\Publication $publication
     * @return Tag
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
