<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseResponseData
 */
class PulseResponseData extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $response_id;

    /**
     * @var integer
     */
    private $question_id;

    /**
     * @var integer
     */
    private $option_id = 0;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var string
     */
    private $response;

    /**
     * @var \Entity\Bizj\PulseResponse
     */
    private $Response;

    /**
     * @var \Entity\Bizj\PulseQuestion
     */
    private $Question;


    /**
     * Set response_id
     *
     * @param integer $responseId
     * @return PulseResponseData
     */
    public function setResponseId($responseId)
    {
        $this->response_id = $responseId;

        return $this;
    }

    /**
     * Get response_id
     *
     * @return integer 
     */
    public function getResponseId()
    {
        return $this->response_id;
    }

    /**
     * Set question_id
     *
     * @param integer $questionId
     * @return PulseResponseData
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
     * Set option_id
     *
     * @param integer $optionId
     * @return PulseResponseData
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseResponseData
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
     * Set response
     *
     * @param string $response
     * @return PulseResponseData
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set Question
     *
     * @param \Entity\Bizj\PulseQuestion $question
     * @return PulseResponseData
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
