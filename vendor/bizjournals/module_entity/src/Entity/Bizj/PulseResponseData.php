<?php

namespace Entity\Bizj;

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
     * Set responseId
     *
     * @param integer $responseId
     *
     * @return PulseResponseData
     */
    public function setResponseId($responseId)
    {
        $this->response_id = $responseId;

        return $this;
    }

    /**
     * Get responseId
     *
     * @return integer
     */
    public function getResponseId()
    {
        return $this->response_id;
    }

    /**
     * Set questionId
     *
     * @param integer $questionId
     *
     * @return PulseResponseData
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
     * Set optionId
     *
     * @param integer $optionId
     *
     * @return PulseResponseData
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseResponseData
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
     * Set response
     *
     * @param string $response
     *
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
     * Set question
     *
     * @param \Entity\Bizj\PulseQuestion $question
     *
     * @return PulseResponseData
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

