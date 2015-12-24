<?php

namespace Entity\Bzjpreview;

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
     * @var \Entity\Bzjpreview\Pulse
     */
    private $Pulse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Options = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseQuestion
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
     * Set question
     *
     * @param string $question
     *
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
     *
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
     * Set optionType
     *
     * @param string $optionType
     *
     * @return PulseQuestion
     */
    public function setOptionType($optionType)
    {
        $this->option_type = $optionType;

        return $this;
    }

    /**
     * Get optionType
     *
     * @return string
     */
    public function getOptionType()
    {
        return $this->option_type;
    }

    /**
     * Set isRequired
     *
     * @param boolean $isRequired
     *
     * @return PulseQuestion
     */
    public function setIsRequired($isRequired)
    {
        $this->is_required = $isRequired;

        return $this;
    }

    /**
     * Get isRequired
     *
     * @return boolean
     */
    public function getIsRequired()
    {
        return $this->is_required;
    }

    /**
     * Set resultsCache
     *
     * @param string $resultsCache
     *
     * @return PulseQuestion
     */
    public function setResultsCache($resultsCache)
    {
        $this->results_cache = $resultsCache;

        return $this;
    }

    /**
     * Get resultsCache
     *
     * @return string
     */
    public function getResultsCache()
    {
        return $this->results_cache;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseQuestion
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
     * @return PulseQuestion
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
     * @return PulseQuestion
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
     * Add option
     *
     * @param \Entity\Bzjpreview\PulseQuestionOption $option
     *
     * @return PulseQuestion
     */
    public function addOption(\Entity\Bzjpreview\PulseQuestionOption $option)
    {
        $this->Options[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \Entity\Bzjpreview\PulseQuestionOption $option
     */
    public function removeOption(\Entity\Bzjpreview\PulseQuestionOption $option)
    {
        $this->Options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->Options;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bzjpreview\Pulse $pulse
     *
     * @return PulseQuestion
     */
    public function setPulse(\Entity\Bzjpreview\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bzjpreview\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }
}

