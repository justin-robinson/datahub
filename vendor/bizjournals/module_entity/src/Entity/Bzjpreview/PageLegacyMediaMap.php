<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageLegacyMediaMap
 */
class PageLegacyMediaMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $media_type = 'image';

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
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $title;

    /**
     * @var boolean
     */
    private $flag = false;

    /**
     * @var \Entity\Bzjpreview\Page
     */
    private $Page;

    /**
     * @var \Entity\Bzjpreview\LegacyMedia
     */
    private $Media;


    /**
     * Set page_id
     *
     * @param integer $pageId
     * @return PageLegacyMediaMap
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
     * Set media_id
     *
     * @param integer $mediaId
     * @return PageLegacyMediaMap
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
     * Set media_type
     *
     * @param string $mediaType
     * @return PageLegacyMediaMap
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
     * Set caption
     *
     * @param string $caption
     * @return PageLegacyMediaMap
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
     * @return PageLegacyMediaMap
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
     * @return PageLegacyMediaMap
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
     * Set ord
     *
     * @param integer $ord
     * @return PageLegacyMediaMap
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
     * Set title
     *
     * @param string $title
     * @return PageLegacyMediaMap
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
     * Set flag
     *
     * @param boolean $flag
     * @return PageLegacyMediaMap
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
     * Set Page
     *
     * @param \Entity\Bzjpreview\Page $page
     * @return PageLegacyMediaMap
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

    /**
     * Set Media
     *
     * @param \Entity\Bzjpreview\LegacyMedia $media
     * @return PageLegacyMediaMap
     */
    public function setMedia(\Entity\Bzjpreview\LegacyMedia $media = null)
    {
        $this->Media = $media;

        return $this;
    }

    /**
     * Get Media
     *
     * @return \Entity\Bzjpreview\LegacyMedia 
     */
    public function getMedia()
    {
        return $this->Media;
    }
}
