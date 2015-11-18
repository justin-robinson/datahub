<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseMedia
 */
class PulseMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var integer
     */
    private $question_id = 0;

    /**
     * @var string
     */
    private $media_type = 'image';

    /**
     * @var integer
     */
    private $option_id = 0;

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
    private $alt_text;

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
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;


    /**
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return PulseMedia
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulse_id
     *
     * @return integer 
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set question_id
     *
     * @param integer $questionId
     * @return PulseMedia
     */
    public function setQuestionId($questionId)
    {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set media_type
     *
     * @param string $mediaType
     * @return PulseMedia
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
     * Set option_id
     *
     * @param integer $optionId
     * @return PulseMedia
     */
    public function setOptionId($optionId)
    {
        $this->option_id = $optionId;

        return $this;
    }

    /**
     * Get option_id
     *
     * @return integer 
     */
    public function getOptionId()
    {
        return $this->option_id;
    }

    /**
     * Set media_host
     *
     * @param string $mediaHost
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set alt_text
     *
     * @param string $altText
     * @return PulseMedia
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
     * Set art_credit
     *
     * @param string $artCredit
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set additional_data
     *
     * @param string $additionalData
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set Pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     * @return PulseMedia
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get Pulse
     *
     * @return \Entity\Bizj\Pulse 
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}
