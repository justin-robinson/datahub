<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaCacheQueue
 */
class MediaCacheQueue extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $akamai_sent_at;

    /**
     * @var \DateTime
     */
    private $akamai_cleared_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set media_id
     *
     * @param integer $mediaId
     * @return MediaCacheQueue
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MediaCacheQueue
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
     * Set akamai_sent_at
     *
     * @param \DateTime $akamaiSentAt
     * @return MediaCacheQueue
     */
    public function setAkamaiSentAt($akamaiSentAt)
    {
        $this->akamai_sent_at = $akamaiSentAt;

        return $this;
    }

    /**
     * Get akamai_sent_at
     *
     * @return \DateTime 
     */
    public function getAkamaiSentAt()
    {
        return $this->akamai_sent_at;
    }

    /**
     * Set akamai_cleared_at
     *
     * @param \DateTime $akamaiClearedAt
     * @return MediaCacheQueue
     */
    public function setAkamaiClearedAt($akamaiClearedAt)
    {
        $this->akamai_cleared_at = $akamaiClearedAt;

        return $this;
    }

    /**
     * Get akamai_cleared_at
     *
     * @return \DateTime 
     */
    public function getAkamaiClearedAt()
    {
        return $this->akamai_cleared_at;
    }
}
