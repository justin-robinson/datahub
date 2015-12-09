<?php

namespace Entity\Bizj;

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
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseMedia
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulseId
     *
     * @return integer
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set questionId
     *
     * @param integer $questionId
     *
     * @return PulseMedia
     */
    public function setQuestionId($questionId)
    {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return integer
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set mediaType
     *
     * @param string $mediaType
     *
     * @return PulseMedia
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
     * Set optionId
     *
     * @param integer $optionId
     *
     * @return PulseMedia
     */
    public function setOptionId($optionId)
    {
        $this->option_id = $optionId;

        return $this;
    }

    /**
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->option_id;
    }

    /**
     * Set mediaHost
     *
     * @param string $mediaHost
     *
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set altText
     *
     * @param string $altText
     *
     * @return PulseMedia
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
     * Set artCredit
     *
     * @param string $artCredit
     *
     * @return PulseMedia
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
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set additionalData
     *
     * @param string $additionalData
     *
     * @return PulseMedia
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseMedia
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
     * @return PulseMedia
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return PulseMedia
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     *
     * @return PulseMedia
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bizj\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}

