<?php

namespace Entity\Bizj;

/**
 * PageLeadinItem
 */
class PageLeadinItem extends \Entity\Entity\Base
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
     * @var string
     */
    private $additional_data;

    /**
     * @var \Entity\Bizj\PageLeadinGroup
     */
    private $PageLeadinGroup;


    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return PageLeadinItem
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get groupId
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
     *
     * @return PageLeadinItem
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
     * Set itemPageId
     *
     * @param integer $itemPageId
     *
     * @return PageLeadinItem
     */
    public function setItemPageId($itemPageId)
    {
        $this->item_page_id = $itemPageId;

        return $this;
    }

    /**
     * Get itemPageId
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
     *
     * @return PageLeadinItem
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
     *
     * @return PageLeadinItem
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
     *
     * @return PageLeadinItem
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
     * Set itemMediaId
     *
     * @param integer $itemMediaId
     *
     * @return PageLeadinItem
     */
    public function setItemMediaId($itemMediaId)
    {
        $this->item_media_id = $itemMediaId;

        return $this;
    }

    /**
     * Get itemMediaId
     *
     * @return integer
     */
    public function getItemMediaId()
    {
        return $this->item_media_id;
    }

    /**
     * Set itemMediaUrl
     *
     * @param string $itemMediaUrl
     *
     * @return PageLeadinItem
     */
    public function setItemMediaUrl($itemMediaUrl)
    {
        $this->item_media_url = $itemMediaUrl;

        return $this;
    }

    /**
     * Get itemMediaUrl
     *
     * @return string
     */
    public function getItemMediaUrl()
    {
        return $this->item_media_url;
    }

    /**
     * Set mediaCaption
     *
     * @param string $mediaCaption
     *
     * @return PageLeadinItem
     */
    public function setMediaCaption($mediaCaption)
    {
        $this->media_caption = $mediaCaption;

        return $this;
    }

    /**
     * Get mediaCaption
     *
     * @return string
     */
    public function getMediaCaption()
    {
        return $this->media_caption;
    }

    /**
     * Set mediaAltText
     *
     * @param string $mediaAltText
     *
     * @return PageLeadinItem
     */
    public function setMediaAltText($mediaAltText)
    {
        $this->media_alt_text = $mediaAltText;

        return $this;
    }

    /**
     * Get mediaAltText
     *
     * @return string
     */
    public function getMediaAltText()
    {
        return $this->media_alt_text;
    }

    /**
     * Set thumbMediaId
     *
     * @param integer $thumbMediaId
     *
     * @return PageLeadinItem
     */
    public function setThumbMediaId($thumbMediaId)
    {
        $this->thumb_media_id = $thumbMediaId;

        return $this;
    }

    /**
     * Get thumbMediaId
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
     *
     * @return PageLeadinItem
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
     * Set itemVideoId
     *
     * @param string $itemVideoId
     *
     * @return PageLeadinItem
     */
    public function setItemVideoId($itemVideoId)
    {
        $this->item_video_id = $itemVideoId;

        return $this;
    }

    /**
     * Get itemVideoId
     *
     * @return string
     */
    public function getItemVideoId()
    {
        return $this->item_video_id;
    }

    /**
     * Set additionalData
     *
     * @param string $additionalData
     *
     * @return PageLeadinItem
     */
    public function setAdditionalData($additionalData)
    {
        $this->additional_data = $additionalData;

        return $this;
    }

    /**
     * Get additionalData
     *
     * @return string
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    /**
     * Set pageLeadinGroup
     *
     * @param \Entity\Bizj\PageLeadinGroup $pageLeadinGroup
     *
     * @return PageLeadinItem
     */
    public function setPageLeadinGroup(\Entity\Bizj\PageLeadinGroup $pageLeadinGroup = null)
    {
        $this->PageLeadinGroup = $pageLeadinGroup;

        return $this;
    }

    /**
     * Get pageLeadinGroup
     *
     * @return \Entity\Bizj\PageLeadinGroup
     */
    public function getPageLeadinGroup()
    {
        return $this->PageLeadinGroup;
    }
}

