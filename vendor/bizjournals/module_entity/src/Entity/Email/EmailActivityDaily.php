<?php

namespace Entity\Email;

/**
 * EmailActivityDaily
 */
class EmailActivityDaily extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $activity_id;

    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $activity;

    /**
     * @var string
     */
    private $remote_ip;

    /**
     * @var integer
     */
    private $user_agent;

    /**
     * @var string
     */
    private $referer;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * Get activityId
     *
     * @return integer
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return EmailActivityDaily
     */
    public function setJobId($jobId)
    {
        $this->job_id = $jobId;

        return $this;
    }

    /**
     * Get jobId
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->job_id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return EmailActivityDaily
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return EmailActivityDaily
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set activity
     *
     * @param string $activity
     *
     * @return EmailActivityDaily
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set remoteIp
     *
     * @param string $remoteIp
     *
     * @return EmailActivityDaily
     */
    public function setRemoteIp($remoteIp)
    {
        $this->remote_ip = $remoteIp;

        return $this;
    }

    /**
     * Get remoteIp
     *
     * @return string
     */
    public function getRemoteIp()
    {
        return $this->remote_ip;
    }

    /**
     * Set userAgent
     *
     * @param integer $userAgent
     *
     * @return EmailActivityDaily
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return integer
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set referer
     *
     * @param string $referer
     *
     * @return EmailActivityDaily
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return EmailActivityDaily
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
     * @return EmailActivityDaily
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
}

