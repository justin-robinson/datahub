<?php

namespace Entity\Bzjpreview;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollQuestion
 */
class PollQuestion extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $poll_question_id;

    /**
     * @var integer
     */
    private $poll_id;

    /**
     * @var string
     */
    private $question;

    /**
     * @var integer
     */
    private $position = '0';

    /**
     * @var string
     */
    private $type = 'radio';

    /**
     * @var boolean
     */
    private $required = false;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Answers;

    /**
     * @var \Entity\Bzjpreview\Poll
     */
    private $Poll;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set poll_id
     *
     * @param integer $pollId
     * @return PollQuestion
     */
    public function setPollId($pollId)
    {
        $this->poll_id = $pollId;

        return $this;
    }

    /**
     * Get poll_id
     *
     * @return integer 
     */
    public function getPollId()
    {
        return $this->poll_id;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return PollQuestion
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
     * Set position
     *
     * @param integer $position
     * @return PollQuestion
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
     * Set type
     *
     * @param string $type
     * @return PollQuestion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set required
     *
     * @param boolean $required
     * @return PollQuestion
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return PollQuestion
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
     * Add Answers
     *
     * @param \Entity\Bzjpreview\PollQuestionData $answers
     * @return PollQuestion
     */
    public function addAnswer(\Entity\Bzjpreview\PollQuestionData $answers)
    {
        $this->Answers[] = $answers;

        return $this;
    }

    /**
     * Remove Answers
     *
     * @param \Entity\Bzjpreview\PollQuestionData $answers
     */
    public function removeAnswer(\Entity\Bzjpreview\PollQuestionData $answers)
    {
        $this->Answers->removeElement($answers);
    }

    /**
     * Get Answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->Answers;
    }

    /**
     * Set Poll
     *
     * @param \Entity\Bzjpreview\Poll $poll
     * @return PollQuestion
     */
    public function setPoll(\Entity\Bzjpreview\Poll $poll = null)
    {
        $this->Poll = $poll;

        return $this;
    }

    /**
     * Get Poll
     *
     * @return \Entity\Bzjpreview\Poll 
     */
    public function getPoll()
    {
        return $this->Poll;
    }
}
