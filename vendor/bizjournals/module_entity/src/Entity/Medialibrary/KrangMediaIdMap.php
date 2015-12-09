<?php

namespace Entity\Medialibrary;

/**
 * KrangMediaIdMap
 */
class KrangMediaIdMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $bizj_media_id;

    /**
     * @var integer
     */
    private $krang_media_id;

    /**
     * @var string
     */
    private $frontend_type = 'media';

    /**
     * @var string
     */
    private $crop_data;

    /**
     * @var \Entity\Medialibrary\KrangMediaExport
     */
    private $KrangMedia;


    /**
     * Set bizjMediaId
     *
     * @param integer $bizjMediaId
     *
     * @return KrangMediaIdMap
     */
    public function setBizjMediaId($bizjMediaId)
    {
        $this->bizj_media_id = $bizjMediaId;

        return $this;
    }

    /**
     * Get bizjMediaId
     *
     * @return integer
     */
    public function getBizjMediaId()
    {
        return $this->bizj_media_id;
    }

    /**
     * Set krangMediaId
     *
     * @param integer $krangMediaId
     *
     * @return KrangMediaIdMap
     */
    public function setKrangMediaId($krangMediaId)
    {
        $this->krang_media_id = $krangMediaId;

        return $this;
    }

    /**
     * Get krangMediaId
     *
     * @return integer
     */
    public function getKrangMediaId()
    {
        return $this->krang_media_id;
    }

    /**
     * Set frontendType
     *
     * @param string $frontendType
     *
     * @return KrangMediaIdMap
     */
    public function setFrontendType($frontendType)
    {
        $this->frontend_type = $frontendType;

        return $this;
    }

    /**
     * Get frontendType
     *
     * @return string
     */
    public function getFrontendType()
    {
        return $this->frontend_type;
    }

    /**
     * Set cropData
     *
     * @param string $cropData
     *
     * @return KrangMediaIdMap
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
     * Set krangMedia
     *
     * @param \Entity\Medialibrary\KrangMediaExport $krangMedia
     *
     * @return KrangMediaIdMap
     */
    public function setKrangMedia(\Entity\Medialibrary\KrangMediaExport $krangMedia = null)
    {
        $this->KrangMedia = $krangMedia;

        return $this;
    }

    /**
     * Get krangMedia
     *
     * @return \Entity\Medialibrary\KrangMediaExport
     */
    public function getKrangMedia()
    {
        return $this->KrangMedia;
    }
}

