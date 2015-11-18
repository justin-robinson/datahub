<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \Entity\Bzjpreview\Page
     */
    private $Page;


    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageMedia
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get page_id
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
     * Set media_host
     *
     * @param string $mediaHost
     * @return PageMedia
     */
    public function setMediaHost($mediaHost)
    {
        $this->media_host = $mediaHost;

        return $this;
    }

    /**
     * Get media_host
     *
     * @return string 
     */
    public function getMediaHost()
    {
        return $this->media_host;
    }

    /**
     * Set media_uri
     *
     * @param string $mediaUri
     * @return PageMedia
     */
    public function setMediaUri($mediaUri)
    {
        $this->media_uri = $mediaUri;

        return $this;
    }

    /**
     * Get media_uri
     *
     * @return string 
     */
    public function getMediaUri()
    {
        return $this->media_uri;
    }

    /**
     * Set crop_data
     *
     * @param string $cropData
     * @return PageMedia
     */
    public function setCropData($cropData)
    {
        $this->crop_data = $cropData;

        return $this;
    }

    /**
     * Get crop_data
     *
     * @return string 
     */
    public function getCropData()
    {
        return $this->crop_data;
    }

    /**
     * Set media_source
     *
     * @param string $mediaSource
     * @return PageMedia
     */
    public function setMediaSource($mediaSource)
    {
        $this->media_source = $mediaSource;

        return $this;
    }

    /**
     * Get media_source
     *
     * @return string 
     */
    public function getMediaSource()
    {
        return $this->media_source;
    }

    /**
     * Set external_id
     *
     * @param integer $externalId
     * @return PageMedia
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;

        return $this;
    }

    /**
     * Get external_id
     *
     * @return integer 
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * Set media_type
     *
     * @param string $mediaType
     * @return PageMedia
     */
    public function setMediaType($mediaType)
    {
        $this->media_type = $mediaType;

        return $this;
    }

    /**
     * Get media_type
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
     * Set alt_text
     *
     * @param string $altText
     * @return PageMedia
     */
    public function setAltText($altText)
    {
        $this->alt_text = $altText;

        return $this;
    }

    /**
     * Get alt_text
     *
     * @return string 
     */
    public function getAltText()
    {
        return $this->alt_text;
    }

    /**
     * Set link_url
     *
     * @param string $linkUrl
     * @return PageMedia
     */
    public function setLinkUrl($linkUrl)
    {
        $this->link_url = $linkUrl;

        return $this;
    }

    /**
     * Get link_url
     *
     * @return string 
     */
    public function getLinkUrl()
    {
        return $this->link_url;
    }

    /**
     * Set art_credit
     *
     * @param string $artCredit
     * @return PageMedia
     */
    public function setArtCredit($artCredit)
    {
        $this->art_credit = $artCredit;

        return $this;
    }

    /**
     * Get art_credit
     *
     * @return string 
     */
    public function getArtCredit()
    {
        return $this->art_credit;
    }

    /**
     * Set orig_height
     *
     * @param integer $origHeight
     * @return PageMedia
     */
    public function setOrigHeight($origHeight)
    {
        $this->orig_height = $origHeight;

        return $this;
    }

    /**
     * Get orig_height
     *
     * @return integer 
     */
    public function getOrigHeight()
    {
        return $this->orig_height;
    }

    /**
     * Set orig_width
     *
     * @param integer $origWidth
     * @return PageMedia
     */
    public function setOrigWidth($origWidth)
    {
        $this->orig_width = $origWidth;

        return $this;
    }

    /**
     * Get orig_width
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
     * Set additional_data
     *
     * @param string $additionalData
     * @return PageMedia
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
     * Set Page
     *
     * @param \Entity\Bzjpreview\Page $page
     * @return PageMedia
     */
    public function setPage(\Entity\Bzjpreview\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get Page
     *
     * @return \Entity\Bzjpreview\Page 
     */
    public function getPage()
    {
        return $this->Page;
    }
}
