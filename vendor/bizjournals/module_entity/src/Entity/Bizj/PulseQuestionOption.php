<?php

namespace Entity\Bizj;

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
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->option_id;
    }

    /**
     * Set questionId
     *
     * @param integer $questionId
     *
     * @return PulseQuestionOption
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
     * Set ord
     *
     * @param integer $ord
     *
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
     *
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
     * Set isCorrect
     *
     * @param boolean $isCorrect
     *
     * @return PulseQuestionOption
     */
    public function setIsCorrect($isCorrect)
    {
        $this->is_correct = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean
     */
    public function getIsCorrect()
    {
        return $this->is_correct;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseQuestionOption
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
     * @return PulseQuestionOption
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
     * @return PulseQuestionOption
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
     * Set question
     *
     * @param \Entity\Bizj\PulseQuestion $question
     *
     * @return PulseQuestionOption
     */
    public function setQuestion(\Entity\Bizj\PulseQuestion $question = null)
    {
        $this->Question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Entity\Bizj\PulseQuestion
     */
    public function getQuestion()
    {
        return $this->Question;
    }
}

