<?php

namespace Entity\Bizj;

/**
 * PageMedia
 */
class PageMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $media_host;

    /**
     * @var string
     */
    private $media_uri;

    /**
     * @var string
     */
    private $crop_data;

    /**
     * @var string
     */
    private $media_source = 'unknown';

    /**
     * @var integer
     */
    private $external_id;

    /**
     * @var string
     */
    private $media_type = 'image';

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $caption;

    /**
     * @var string
     */
    private $alt_text;

    /**
     * @var string
     */
    private $link_url;

    /**
     * @var string
     */
    private $art_credit;

    /**
     * @var integer
     */
    private $orig_height = 0;

    /**
     * @var integer
     */
    private $orig_width = 0;

    /**
     * @var boolean
     */
    private $flag = false;

    /**
     * @var string
     */
    private $additional_data;

    /**
     * @var \Entity\Bizj\Page
     */
    private $Page;


    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageMedia
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return PageMedia
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
     * Set mediaHost
     *
     * @param string $mediaHost
     *
     * @return PageMedia
     */
    public function setMediaHost($mediaHost)
    {
        $this->media_host = $mediaHost;

        return $this;
    }

    /**
     * Get mediaHost
     *
     * @return string
     */
    public function getMediaHost()
    {
        return $this->media_host;
    }

    /**
     * Set mediaUri
     *
     * @param string $mediaUri
     *
     * @return PageMedia
     */
    public function setMediaUri($mediaUri)
    {
        $this->media_uri = $mediaUri;

        return $this;
    }

    /**
     * Get mediaUri
     *
     * @return string
     */
    public function getMediaUri()
    {
        return $this->media_uri;
    }

    /**
     * Set cropData
     *
     * @param string $cropData
     *
     * @return PageMedia
     */
    public function setCropData($cropData)
    {
        $this->crop_data = $cropData;

        return $this;
    }

    /**
     * Get cropData
     *
     * @return string
     */
    public function getCropData()
    {
        return $this->crop_data;
    }

    /**
     * Set mediaSource
     *
     * @param string $mediaSource
     *
     * @return PageMedia
     */
    public function setMediaSource($mediaSource)
    {
        $this->media_source = $mediaSource;

        return $this;
    }

    /**
     * Get mediaSource
     *
     * @return string
     */
    public function getMediaSource()
    {
        return $this->media_source;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return PageMedia
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * Set mediaType
     *
     * @param string $mediaType
     *
     * @return PageMedia
     */
    public function setMediaType($mediaType)
    {
        $this->media_type = $mediaType;

        return $this;
    }

    /**
     * Get mediaType
     *
     * @return string
     */
    public function getMediaType()
    {
        return $this->media_type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return PageMedia
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set caption
     *
     * @param string $caption
     *
     * @return PageMedia
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set altText
     *
     * @param string $altText
     *
     * @return PageMedia
     */
    public function setAltText($altText)
    {
        $this->alt_text = $altText;

        return $this;
    }

    /**
     * Get altText
     *
     * @return string
     */
    public function getAltText()
    {
        return $this->alt_text;
    }

    /**
     * Set linkUrl
     *
     * @param string $linkUrl
     *
     * @return PageMedia
     */
    public function setLinkUrl($linkUrl)
    {
        $this->link_url = $linkUrl;

        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->link_url;
    }

    /**
     * Set artCredit
     *
     * @param string $artCredit
     *
     * @return PageMedia
     */
    public function setArtCredit($artCredit)
    {
        $this->art_credit = $artCredit;

        return $this;
    }

    /**
     * Get artCredit
     *
     * @return string
     */
    public function getArtCredit()
    {
        return $this->art_credit;
    }

    /**
     * Set origHeight
     *
     * @param integer $origHeight
     *
     * @return PageMedia
     */
    public function setOrigHeight($origHeight)
    {
        $this->orig_height = $origHeight;

        return $this;
    }

    /**
     * Get origHeight
     *
     * @return integer
     */
    public function getOrigHeight()
    {
        return $this->orig_height;
    }

    /**
     * Set origWidth
     *
     * @param integer $origWidth
     *
     * @return PageMedia
     */
    public function setOrigWidth($origWidth)
    {
        $this->orig_width = $origWidth;

        return $this;
    }

    /**
     * Get origWidth
     *
     * @return integer
     */
    public function getOrigWidth()
    {
        return $this->orig_width;
    }

    /**
     * Set flag
     *
     * @param boolean $flag
     *
     * @return PageMedia
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return boolean
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set additionalData
     *
     * @param string $additionalData
     *
     * @return PageMedia
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
     * Set page
     *
     * @param \Entity\Bizj\Page $page
     *
     * @return PageMedia
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Entity\Bizj\Page
     */
    public function getPage()
    {
        return $this->Page;
    }
}

