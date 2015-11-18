<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Set bizj_media_id
     *
     * @param integer $bizjMediaId
     * @return KrangMediaIdMap
     */
    public function setBizjMediaId($bizjMediaId)
    {
        $this->bizj_media_id = $bizjMediaId;

        return $this;
    }

    /**
     * Get bizj_media_id
     *
     * @return integer 
     */
    public function getBizjMediaId()
    {
        return $this->bizj_media_id;
    }

    /**
     * Set krang_media_id
     *
     * @param integer $krangMediaId
     * @return KrangMediaIdMap
     */
    public function setKrangMediaId($krangMediaId)
    {
        $this->krang_media_id = $krangMediaId;

        return $this;
    }

    /**
     * Get krang_media_id
     *
     * @return integer 
     */
    public function getKrangMediaId()
    {
        return $this->krang_media_id;
    }

    /**
     * Set frontend_type
     *
     * @param string $frontendType
     * @return KrangMediaIdMap
     */
    public function setFrontendType($frontendType)
    {
        $this->frontend_type = $frontendType;

        return $this;
    }

    /**
     * Get frontend_type
     *
     * @return string 
     */
    public function getFrontendType()
    {
        return $this->frontend_type;
    }

    /**
     * Set crop_data
     *
     * @param string $cropData
     * @return KrangMediaIdMap
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
     * Set KrangMedia
     *
     * @param \Entity\Medialibrary\KrangMediaExport $krangMedia
     * @return KrangMediaIdMap
     */
    public function setKrangMedia(\Entity\Medialibrary\KrangMediaExport $krangMedia = null)
    {
        $this->KrangMedia = $krangMedia;

        return $this;
    }

    /**
     * Get KrangMedia
     *
     * @return \Entity\Medialibrary\KrangMediaExport 
     */
    public function getKrangMedia()
    {
        return $this->KrangMedia;
    }
}
