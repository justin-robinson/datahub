<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseQuestion
 */
class PulseQuestion extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $question_id;

    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var string
     */
    private $question;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $option_type = 'radio';

    /**
     * @var boolean
     */
    private $is_required = true;

    /**
     * @var string
     */
    private $results_cache;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Options;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ResponseData;

    /**
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ResponseData = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return PulseQuestion
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
     * Set question
     *
     * @param string $question
     * @return PulseQuestion
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return PulseQuestion
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
     * Set option_type
     *
     * @param string $optionType
     * @return PulseQuestion
     */
    public function setOptionType($optionType)
    {
        $this->option_type = $optionType;

        return $this;
    }

    /**
     * Get option_type
     *
     * @return string 
     */
    public function getOptionType()
    {
        return $this->option_type;
    }

    /**
     * Set is_required
     *
     * @param boolean $isRequired
     * @return PulseQuestion
     */
    public function setIsRequired($isRequired)
    {
        $this->is_required = $isRequired;

        return $this;
    }

    /**
     * Get is_required
     *
     * @return boolean 
     */
    public function getIsRequired()
    {
        return $this->is_required;
    }

    /**
     * Set results_cache
     *
     * @param string $resultsCache
     * @return PulseQuestion
     */
    public function setResultsCache($resultsCache)
    {
        $this->results_cache = $resultsCache;

        return $this;
    }

    /**
     * Get results_cache
     *
     * @return string 
     */
    public function getResultsCache()
    {
        return $this->results_cache;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseQuestion
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
     * @return PulseQuestion
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
     * @return PulseQuestion
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
     * Add Options
     *
     * @param \Entity\Bizj\PulseQuestionOption $options
     * @return PulseQuestion
     */
    public function addOption(\Entity\Bizj\PulseQuestionOption $options)
    {
        $this->Options[] = $options;

        return $this;
    }

    /**
     * Remove Options
     *
     * @param \Entity\Bizj\PulseQuestionOption $options
     */
    public function removeOption(\Entity\Bizj\PulseQuestionOption $options)
    {
        $this->Options->removeElement($options);
    }

    /**
     * Get Options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->Options;
    }

    /**
     * Add ResponseData
     *
     * @param \Entity\Bizj\PulseResponseData $responseData
     * @return PulseQuestion
     */
    public function addResponseDatum(\Entity\Bizj\PulseResponseData $responseData)
    {
        $this->ResponseData[] = $responseData;

        return $this;
    }

    /**
     * Remove ResponseData
     *
     * @param \Entity\Bizj\PulseResponseData $responseData
     */
    public function removeResponseDatum(\Entity\Bizj\PulseResponseData $responseData)
    {
        $this->ResponseData->removeElement($responseData);
    }

    /**
     * Get ResponseData
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponseData()
    {
        return $this->ResponseData;
    }

    /**
     * Set Pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     * @return PulseQuestion
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
