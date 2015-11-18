<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseQuestionOption
 */
class PulseQuestionOption extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $option_id;

    /**
     * @var integer
     */
    private $question_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $choice;

    /**
     * @var boolean
     */
    private $is_correct = false;

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
     * @var \Entity\Bizj\PulseQuestion
     */
    private $Question;


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
     * Set question_id
     *
     * @param integer $questionId
     * @return PulseQuestionOption
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
     * Set ord
     *
     * @param integer $ord
     * @return PulseQuestionOption
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
     * Set choice
     *
     * @param string $choice
     * @return PulseQuestionOption
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return string 
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * Set is_correct
     *
     * @param boolean $isCorrect
     * @return PulseQuestionOption
     */
    public function setIsCorrect($isCorrect)
    {
        $this->is_correct = $isCorrect;

        return $this;
    }

    /**
     * Get is_correct
     *
     * @return boolean 
     */
    public function getIsCorrect()
    {
        return $this->is_correct;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseQuestionOption
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
     * @return PulseQuestionOption
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
     * @return PulseQuestionOption
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
     * Set Question
     *
     * @param \Entity\Bizj\PulseQuestion $question
     * @return PulseQuestionOption
     */
    public function setQuestion(\Entity\Bizj\PulseQuestion $question = null)
    {
        $this->Question = $question;

        return $this;
    }

    /**
     * Get Question
     *
     * @return \Entity\Bizj\PulseQuestion 
     */
    public function getQuestion()
    {
        return $this->Question;
    }
}
