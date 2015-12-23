<?php

namespace Entity\Medialibrary;

/**
 * Publication
 */
class Publication extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var string
     */
    private $pub_name;

    /**
     * @var string
     */
    private $short_name;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var string
     */
    private $default_copyright_notice;

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
    private $MediaPubs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MediaLinks;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MediaPubs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MediaLinks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pubName
     *
     * @param string $pubName
     *
     * @return Publication
     */
    public function setPubName($pubName)
    {
        $this->pub_name = $pubName;

        return $this;
    }

    /**
     * Get pubName
     *
     * @return string
     */
    public function getPubName()
    {
        return $this->pub_name;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Publication
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     *
     * @return Publication
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set defaultCopyrightNotice
     *
     * @param string $defaultCopyrightNotice
     *
     * @return Publication
     */
    public function setDefaultCopyrightNotice($defaultCopyrightNotice)
    {
        $this->default_copyright_notice = $defaultCopyrightNotice;

        return $this;
    }

    /**
     * Get defaultCopyrightNotice
     *
     * @return string
     */
    public function getDefaultCopyrightNotice()
    {
        return $this->default_copyright_notice;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Publication
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
     * @return Publication
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
     * Add mediaPub
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPub
     *
     * @return Publication
     */
    public function addMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {
        $this->MediaPubs[] = $mediaPub;

        return $this;
    }

    /**
     * Remove mediaPub
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPub
     */
    public function removeMediaPub(\Entity\Medialibrary\MediaPub $mediaPub)
    {
        $this->MediaPubs->removeElement($mediaPub);
    }

    /**
     * Get mediaPubs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaPubs()
    {
        return $this->MediaPubs;
    }

    /**
     * Add tag
     *
     * @param \Entity\Medialibrary\Tag $tag
     *
     * @return Publication
     */
    public function addTag(\Entity\Medialibrary\Tag $tag)
    {
        $this->Tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Entity\Medialibrary\Tag $tag
     */
    public function removeTag(\Entity\Medialibrary\Tag $tag)
    {
        $this->Tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     * Add mediaLink
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLink
     *
     * @return Publication
     */
    public function addMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {
        $this->MediaLinks[] = $mediaLink;

        return $this;
    }

    /**
     * Remove mediaLink
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLink
     */
    public function removeMediaLink(\Entity\Medialibrary\MediaLink $mediaLink)
    {
        $this->MediaLinks->removeElement($mediaLink);
    }

    /**
     * Get mediaLinks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMediaLinks()
    {
        return $this->MediaLinks;
    }
}

