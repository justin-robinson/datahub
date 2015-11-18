<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * LegacyMedia
 */
class LegacyMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var string
     */
    private $location_url;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $media_type = 'image';

    /**
     * @var string
     */
    private $mime_type;

    /**
     * @var integer
     */
    private $rev_number = 0;

    /**
     * @var integer
     */
    private $default_height = 0;

    /**
     * @var integer
     */
    private $default_width = 0;

    /**
     * @var string
     */
    private $default_caption;

    /**
     * @var string
     */
    private $default_copyright;

    /**
     * @var string
     */
    private $default_alt_text;

    /**
     * @var string
     */
    private $content;

    /**
     * @var integer
     */
    private $filesize = 0;

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
    private $PageLegacyMediaMap;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->PageLegacyMediaMap = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set location_url
     *
     * @param string $locationUrl
     * @return LegacyMedia
     */
    public function setLocationUrl($locationUrl)
    {
        $this->location_url = $locationUrl;

        return $this;
    }

    /**
     * Get location_url
     *
     * @return string 
     */
    public function getLocationUrl()
    {
        return $this->location_url;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return LegacyMedia
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set media_type
     *
     * @param string $mediaType
     * @return LegacyMedia
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
     * Set mime_type
     *
     * @param string $mimeType
     * @return LegacyMedia
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;

        return $this;
    }

    /**
     * Get mime_type
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set rev_number
     *
     * @param integer $revNumber
     * @return LegacyMedia
     */
    public function setRevNumber($revNumber)
    {
        $this->rev_number = $revNumber;

        return $this;
    }

    /**
     * Get rev_number
     *
     * @return integer 
     */
    public function getRevNumber()
    {
        return $this->rev_number;
    }

    /**
     * Set default_height
     *
     * @param integer $defaultHeight
     * @return LegacyMedia
     */
    public function setDefaultHeight($defaultHeight)
    {
        $this->default_height = $defaultHeight;

        return $this;
    }

    /**
     * Get default_height
     *
     * @return integer 
     */
    public function getDefaultHeight()
    {
        return $this->default_height;
    }

    /**
     * Set default_width
     *
     * @param integer $defaultWidth
     * @return LegacyMedia
     */
    public function setDefaultWidth($defaultWidth)
    {
        $this->default_width = $defaultWidth;

        return $this;
    }

    /**
     * Get default_width
     *
     * @return integer 
     */
    public function getDefaultWidth()
    {
        return $this->default_width;
    }

    /**
     * Set default_caption
     *
     * @param string $defaultCaption
     * @return LegacyMedia
     */
    public function setDefaultCaption($defaultCaption)
    {
        $this->default_caption = $defaultCaption;

        return $this;
    }

    /**
     * Get default_caption
     *
     * @return string 
     */
    public function getDefaultCaption()
    {
        return $this->default_caption;
    }

    /**
     * Set default_copyright
     *
     * @param string $defaultCopyright
     * @return LegacyMedia
     */
    public function setDefaultCopyright($defaultCopyright)
    {
        $this->default_copyright = $defaultCopyright;

        return $this;
    }

    /**
     * Get default_copyright
     *
     * @return string 
     */
    public function getDefaultCopyright()
    {
        return $this->default_copyright;
    }

    /**
     * Set default_alt_text
     *
     * @param string $defaultAltText
     * @return LegacyMedia
     */
    public function setDefaultAltText($defaultAltText)
    {
        $this->default_alt_text = $defaultAltText;

        return $this;
    }

    /**
     * Get default_alt_text
     *
     * @return string 
     */
    public function getDefaultAltText()
    {
        return $this->default_alt_text;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return LegacyMedia
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set filesize
     *
     * @param integer $filesize
     * @return LegacyMedia
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;

        return $this;
    }

    /**
     * Get filesize
     *
     * @return integer 
     */
    public function getFilesize()
    {
        return $this->filesize;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return LegacyMedia
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
     * @return LegacyMedia
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
     * Add PageLegacyMediaMap
     *
     * @param \Entity\Bzjpreview\PageLegacyMediaMap $pageLegacyMediaMap
     * @return LegacyMedia
     */
    public function addPageLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $pageLegacyMediaMap)
    {
        $this->PageLegacyMediaMap[] = $pageLegacyMediaMap;

        return $this;
    }

    /**
     * Remove PageLegacyMediaMap
     *
     * @param \Entity\Bzjpreview\PageLegacyMediaMap $pageLegacyMediaMap
     */
    public function removePageLegacyMediaMap(\Entity\Bzjpreview\PageLegacyMediaMap $pageLegacyMediaMap)
    {
        $this->PageLegacyMediaMap->removeElement($pageLegacyMediaMap);
    }

    /**
     * Get PageLegacyMediaMap
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPageLegacyMediaMap()
    {
        return $this->PageLegacyMediaMap;
    }
}
