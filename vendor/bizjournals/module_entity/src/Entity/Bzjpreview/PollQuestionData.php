<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollQuestionData
 */
class PollQuestionData extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $question_data_id;

    /**
     * @var integer
     */
    private $position = '0';

    /**
     * @var string
     */
    private $answer;

    /**
     * @var integer
     */
    private $poll_question_id;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var boolean
     */
    private $is_deleted = false;

    /**
     * @var \Entity\Bzjpreview\PollQuestion
     */
    private $PollQuestion;


    /**
     * Get question_data_id
     *
     * @return integer 
     */
    public function getQuestionDataId()
    {
        return $this->question_data_id;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return PollQuestionData
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return PollQuestionData
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set poll_question_id
     *
     * @param integer $pollQuestionId
     * @return PollQuestionData
     */
    public function setPollQuestionId($pollQuestionId)
    {
        $this->poll_question_id = $pollQuestionId;

        return $this;
    }

    /**
     * Get poll_question_id
     *
     * @return integer 
     */
    public function getPollQuestionId()
    {
        return $this->poll_question_id;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return PollQuestionData
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set is_deleted
     *
     * @param boolean $isDeleted
     * @return PollQuestionData
     */
    public function setIsDeleted($isDeleted)
    {
        $this->is_deleted = $isDeleted;

        return $this;
    }

    /**
     * Get is_deleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set PollQuestion
     *
     * @param \Entity\Bzjpreview\PollQuestion $pollQuestion
     * @return PollQuestionData
     */
    public function setPollQuestion(\Entity\Bzjpreview\PollQuestion $pollQuestion = null)
    {
        $this->PollQuestion = $pollQuestion;

        return $this;
    }

    /**
     * Get PollQuestion
     *
     * @return \Entity\Bzjpreview\PollQuestion 
     */
    public function getPollQuestion()
    {
        return $this->PollQuestion;
    }
}
