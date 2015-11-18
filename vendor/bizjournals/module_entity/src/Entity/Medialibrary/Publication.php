<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Get pub_id
     *
     * @return integer 
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set pub_name
     *
     * @param string $pubName
     * @return Publication
     */
    public function setPubName($pubName)
    {
        $this->pub_name = $pubName;

        return $this;
    }

    /**
     * Get pub_name
     *
     * @return string 
     */
    public function getPubName()
    {
        return $this->pub_name;
    }

    /**
     * Set short_name
     *
     * @param string $shortName
     * @return Publication
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;

        return $this;
    }

    /**
     * Get short_name
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
     * Set default_copyright_notice
     *
     * @param string $defaultCopyrightNotice
     * @return Publication
     */
    public function setDefaultCopyrightNotice($defaultCopyrightNotice)
    {
        $this->default_copyright_notice = $defaultCopyrightNotice;

        return $this;
    }

    /**
     * Get default_copyright_notice
     *
     * @return string 
     */
    public function getDefaultCopyrightNotice()
    {
        return $this->default_copyright_notice;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Publication
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
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Publication
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add MediaPubs
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPubs
     * @return Publication
     */
    public function addMediaPub(\Entity\Medialibrary\MediaPub $mediaPubs)
    {
        $this->MediaPubs[] = $mediaPubs;

        return $this;
    }

    /**
     * Remove MediaPubs
     *
     * @param \Entity\Medialibrary\MediaPub $mediaPubs
     */
    public function removeMediaPub(\Entity\Medialibrary\MediaPub $mediaPubs)
    {
        $this->MediaPubs->removeElement($mediaPubs);
    }

    /**
     * Get MediaPubs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaPubs()
    {
        return $this->MediaPubs;
    }

    /**
     * Add Tags
     *
     * @param \Entity\Medialibrary\Tag $tags
     * @return Publication
     */
    public function addTag(\Entity\Medialibrary\Tag $tags)
    {
        $this->Tags[] = $tags;

        return $this;
    }

    /**
     * Remove Tags
     *
     * @param \Entity\Medialibrary\Tag $tags
     */
    public function removeTag(\Entity\Medialibrary\Tag $tags)
    {
        $this->Tags->removeElement($tags);
    }

    /**
     * Get Tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->Tags;
    }

    /**
     * Add MediaLinks
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLinks
     * @return Publication
     */
    public function addMediaLink(\Entity\Medialibrary\MediaLink $mediaLinks)
    {
        $this->MediaLinks[] = $mediaLinks;

        return $this;
    }

    /**
     * Remove MediaLinks
     *
     * @param \Entity\Medialibrary\MediaLink $mediaLinks
     */
    public function removeMediaLink(\Entity\Medialibrary\MediaLink $mediaLinks)
    {
        $this->MediaLinks->removeElement($mediaLinks);
    }

    /**
     * Get MediaLinks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMediaLinks()
    {
        return $this->MediaLinks;
    }
}
