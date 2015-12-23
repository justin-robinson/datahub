<?php

namespace Entity\Bizj;

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
     * Get mediaId
     *
     * @return integer
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * Set locationUrl
     *
     * @param string $locationUrl
     *
     * @return LegacyMedia
     */
    public function setLocationUrl($locationUrl)
    {
        $this->location_url = $locationUrl;

        return $this;
    }

    /**
     * Get locationUrl
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
     *
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
     * Set mediaType
     *
     * @param string $mediaType
     *
     * @return LegacyMedia
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
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return LegacyMedia
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set revNumber
     *
     * @param integer $revNumber
     *
     * @return LegacyMedia
     */
    public function setRevNumber($revNumber)
    {
        $this->rev_number = $revNumber;

        return $this;
    }

    /**
     * Get revNumber
     *
     * @return integer
     */
    public function getRevNumber()
    {
        return $this->rev_number;
    }

    /**
     * Set defaultHeight
     *
     * @param integer $defaultHeight
     *
     * @return LegacyMedia
     */
    public function setDefaultHeight($defaultHeight)
    {
        $this->default_height = $defaultHeight;

        return $this;
    }

    /**
     * Get defaultHeight
     *
     * @return integer
     */
    public function getDefaultHeight()
    {
        return $this->default_height;
    }

    /**
     * Set defaultWidth
     *
     * @param integer $defaultWidth
     *
     * @return LegacyMedia
     */
    public function setDefaultWidth($defaultWidth)
    {
        $this->default_width = $defaultWidth;

        return $this;
    }

    /**
     * Get defaultWidth
     *
     * @return integer
     */
    public function getDefaultWidth()
    {
        return $this->default_width;
    }

    /**
     * Set defaultCaption
     *
     * @param string $defaultCaption
     *
     * @return LegacyMedia
     */
    public function setDefaultCaption($defaultCaption)
    {
        $this->default_caption = $defaultCaption;

        return $this;
    }

    /**
     * Get defaultCaption
     *
     * @return string
     */
    public function getDefaultCaption()
    {
        return $this->default_caption;
    }

    /**
     * Set defaultCopyright
     *
     * @param string $defaultCopyright
     *
     * @return LegacyMedia
     */
    public function setDefaultCopyright($defaultCopyright)
    {
        $this->default_copyright = $defaultCopyright;

        return $this;
    }

    /**
     * Get defaultCopyright
     *
     * @return string
     */
    public function getDefaultCopyright()
    {
        return $this->default_copyright;
    }

    /**
     * Set defaultAltText
     *
     * @param string $defaultAltText
     *
     * @return LegacyMedia
     */
    public function setDefaultAltText($defaultAltText)
    {
        $this->default_alt_text = $defaultAltText;

        return $this;
    }

    /**
     * Get defaultAltText
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
     *
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
     *
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return LegacyMedia
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
     * @return LegacyMedia
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
     * Add pageLegacyMediaMap
     *
     * @param \Entity\Bizj\PageLegacyMediaMap $pageLegacyMediaMap
     *
     * @return LegacyMedia
     */
    public function addPageLegacyMediaMap(\Entity\Bizj\PageLegacyMediaMap $pageLegacyMediaMap)
    {
        $this->PageLegacyMediaMap[] = $pageLegacyMediaMap;

        return $this;
    }

    /**
     * Remove pageLegacyMediaMap
     *
     * @param \Entity\Bizj\PageLegacyMediaMap $pageLegacyMediaMap
     */
    public function removePageLegacyMediaMap(\Entity\Bizj\PageLegacyMediaMap $pageLegacyMediaMap)
    {
        $this->PageLegacyMediaMap->removeElement($pageLegacyMediaMap);
    }

    /**
     * Get pageLegacyMediaMap
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPageLegacyMediaMap()
    {
        return $this->PageLegacyMediaMap;
    }
}

