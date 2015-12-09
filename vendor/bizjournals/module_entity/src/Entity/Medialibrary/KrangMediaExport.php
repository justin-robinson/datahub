<?php

namespace Entity\Medialibrary;

/**
 * KrangMediaExport
 */
class KrangMediaExport extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $media_id;

    /**
     * @var integer
     */
    private $media_type_id;

    /**
     * @var string
     */
    private $mime_type;

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
    private $title;

    /**
     * @var string
     */
    private $caption;

    /**
     * @var string
     */
    private $copyright;

    /**
     * @var \DateTime
     */
    private $publish_date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $IdMap;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->IdMap = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set mediaId
     *
     * @param integer $mediaId
     *
     * @return KrangMediaExport
     */
    public function setMediaId($mediaId)
    {
        $this->media_id = $mediaId;

        return $this;
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
     * Set mediaTypeId
     *
     * @param integer $mediaTypeId
     *
     * @return KrangMediaExport
     */
    public function setMediaTypeId($mediaTypeId)
    {
        $this->media_type_id = $mediaTypeId;

        return $this;
    }

    /**
     * Get mediaTypeId
     *
     * @return integer
     */
    public function getMediaTypeId()
    {
        return $this->media_type_id;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return KrangMediaExport
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
     * Set locationUrl
     *
     * @param string $locationUrl
     *
     * @return KrangMediaExport
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
     * @return KrangMediaExport
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
     * Set title
     *
     * @param string $title
     *
     * @return KrangMediaExport
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
     * @return KrangMediaExport
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
     * Set copyright
     *
     * @param string $copyright
     *
     * @return KrangMediaExport
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * Get copyright
     *
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return KrangMediaExport
     */
    public function setPublishDate($publishDate)
    {
        $this->publish_date = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * Add idMap
     *
     * @param \Entity\Medialibrary\KrangMediaIdMap $idMap
     *
     * @return KrangMediaExport
     */
    public function addIdMap(\Entity\Medialibrary\KrangMediaIdMap $idMap)
    {
        $this->IdMap[] = $idMap;

        return $this;
    }

    /**
     * Remove idMap
     *
     * @param \Entity\Medialibrary\KrangMediaIdMap $idMap
     */
    public function removeIdMap(\Entity\Medialibrary\KrangMediaIdMap $idMap)
    {
        $this->IdMap->removeElement($idMap);
    }

    /**
     * Get idMap
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdMap()
    {
        return $this->IdMap;
    }
}

