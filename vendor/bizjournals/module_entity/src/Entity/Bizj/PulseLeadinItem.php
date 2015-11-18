<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseLeadinItem
 */
class PulseLeadinItem extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $item_id;

    /**
     * @var integer
     */
    private $group_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var integer
     */
    private $item_page_id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $headline;

    /**
     * @var string
     */
    private $teaser;

    /**
     * @var integer
     */
    private $item_media_id;

    /**
     * @var string
     */
    private $item_media_url;

    /**
     * @var string
     */
    private $media_caption;

    /**
     * @var string
     */
    private $media_alt_text;

    /**
     * @var integer
     */
    private $thumb_media_id;

    /**
     * @var string
     */
    private $kicker;

    /**
     * @var string
     */
    private $item_video_id;

    /**
     * @var integer
     */
    private $item_pulse_id;

    /**
     * @var string
     */
    private $additional_data;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @var \Entity\Bizj\PulseLeadinGroup
     */
    private $LeadinGroup;


    /**
     * Get item_id
     *
     * @return integer 
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Set group_id
     *
     * @param integer $groupId
     * @return PulseLeadinItem
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return PulseLeadinItem
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer 
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set item_page_id
     *
     * @param integer $itemPageId
     * @return PulseLeadinItem
     */
    public function setItemPageId($itemPageId)
    {
        $this->item_page_id = $itemPageId;

        return $this;
    }

    /**
     * Get item_page_id
     *
     * @return integer 
     */
    public function getItemPageId()
    {
        return $this->item_page_id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return PulseLeadinItem
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set headline
     *
     * @param string $headline
     * @return PulseLeadinItem
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get headline
     *
     * @return string 
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     * @return PulseLeadinItem
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set item_media_id
     *
     * @param integer $itemMediaId
     * @return PulseLeadinItem
     */
    public function setItemMediaId($itemMediaId)
    {
        $this->item_media_id = $itemMediaId;

        return $this;
    }

    /**
     * Get item_media_id
     *
     * @return integer 
     */
    public function getItemMediaId()
    {
        return $this->item_media_id;
    }

    /**
     * Set item_media_url
     *
     * @param string $itemMediaUrl
     * @return PulseLeadinItem
     */
    public function setItemMediaUrl($itemMediaUrl)
    {
        $this->item_media_url = $itemMediaUrl;

        return $this;
    }

    /**
     * Get item_media_url
     *
     * @return string 
     */
    public function getItemMediaUrl()
    {
        return $this->item_media_url;
    }

    /**
     * Set media_caption
     *
     * @param string $mediaCaption
     * @return PulseLeadinItem
     */
    public function setMediaCaption($mediaCaption)
    {
        $this->media_caption = $mediaCaption;

        return $this;
    }

    /**
     * Get media_caption
     *
     * @return string 
     */
    public function getMediaCaption()
    {
        return $this->media_caption;
    }

    /**
     * Set media_alt_text
     *
     * @param string $mediaAltText
     * @return PulseLeadinItem
     */
    public function setMediaAltText($mediaAltText)
    {
        $this->media_alt_text = $mediaAltText;

        return $this;
    }

    /**
     * Get media_alt_text
     *
     * @return string 
     */
    public function getMediaAltText()
    {
        return $this->media_alt_text;
    }

    /**
     * Set thumb_media_id
     *
     * @param integer $thumbMediaId
     * @return PulseLeadinItem
     */
    public function setThumbMediaId($thumbMediaId)
    {
        $this->thumb_media_id = $thumbMediaId;

        return $this;
    }

    /**
     * Get thumb_media_id
     *
     * @return integer 
     */
    public function getThumbMediaId()
    {
        return $this->thumb_media_id;
    }

    /**
     * Set kicker
     *
     * @param string $kicker
     * @return PulseLeadinItem
     */
    public function setKicker($kicker)
    {
        $this->kicker = $kicker;

        return $this;
    }

    /**
     * Get kicker
     *
     * @return string 
     */
    public function getKicker()
    {
        return $this->kicker;
    }

    /**
     * Set item_video_id
     *
     * @param string $itemVideoId
     * @return PulseLeadinItem
     */
    public function setItemVideoId($itemVideoId)
    {
        $this->item_video_id = $itemVideoId;

        return $this;
    }

    /**
     * Get item_video_id
     *
     * @return string 
     */
    public function getItemVideoId()
    {
        return $this->item_video_id;
    }

    /**
     * Set item_pulse_id
     *
     * @param integer $itemPulseId
     * @return PulseLeadinItem
     */
    public function setItemPulseId($itemPulseId)
    {
        $this->item_pulse_id = $itemPulseId;

        return $this;
    }

    /**
     * Get item_pulse_id
     *
     * @return integer 
     */
    public function getItemPulseId()
    {
        return $this->item_pulse_id;
    }

    /**
     * Set additional_data
     *
     * @param string $additionalData
     * @return PulseLeadinItem
     */
    public function setAdditionalData($additionalData)
    {
        $this->additional_data = $additionalData;

        return $this;
    }

    /**
     * Get additional_data
     *
     * @return string 
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseLeadinItem
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
     * @return PulseLeadinItem
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
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return PulseLeadinItem
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

    /**
     * Set LeadinGroup
     *
     * @param \Entity\Bizj\PulseLeadinGroup $leadinGroup
     * @return PulseLeadinItem
     */
    public function setLeadinGroup(\Entity\Bizj\PulseLeadinGroup $leadinGroup = null)
    {
        $this->LeadinGroup = $leadinGroup;

        return $this;
    }

    /**
     * Get LeadinGroup
     *
     * @return \Entity\Bizj\PulseLeadinGroup 
     */
    public function getLeadinGroup()
    {
        return $this->LeadinGroup;
    }
}
