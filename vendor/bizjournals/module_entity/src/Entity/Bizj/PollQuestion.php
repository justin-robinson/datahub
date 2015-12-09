<?php

namespace Entity\Bizj;

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
     * @var \Entity\Bizj\Poll
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
     * Get pollQuestionId
     *
     * @return integer
     */
    public function getPollQuestionId()
    {
        return $this->poll_question_id;
    }

    /**
     * Set pollId
     *
     * @param integer $pollId
     *
     * @return PollQuestion
     */
    public function setPollId($pollId)
    {
        $this->poll_id = $pollId;

        return $this;
    }

    /**
     * Get pollId
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
     *
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
     *
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
     *
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
     *
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
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return PollQuestion
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Add answer
     *
     * @param \Entity\Bizj\PollQuestionData $answer
     *
     * @return PollQuestion
     */
    public function addAnswer(\Entity\Bizj\PollQuestionData $answer)
    {
        $this->Answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \Entity\Bizj\PollQuestionData $answer
     */
    public function removeAnswer(\Entity\Bizj\PollQuestionData $answer)
    {
        $this->Answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->Answers;
    }

    /**
     * Set poll
     *
     * @param \Entity\Bizj\Poll $poll
     *
     * @return PollQuestion
     */
    public function setPoll(\Entity\Bizj\Poll $poll = null)
    {
        $this->Poll = $poll;

        return $this;
    }

    /**
     * Get poll
     *
     * @return \Entity\Bizj\Poll
     */
    public function getPoll()
    {
        return $this->Poll;
    }
}

