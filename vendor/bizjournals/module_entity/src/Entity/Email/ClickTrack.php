<?php

namespace Entity\Email;

/**
 * ClickTrack
 */
class ClickTrack extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $track_id;

    /**
     * @var integer
     */
    private $click_id;

    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $remote_ip;

    /**
     * @var \DateTime
     */
    private $created_at;


    /**
     * Get trackId
     *
     * @return integer
     */
    public function getTrackId()
    {
        return $this->track_id;
    }

    /**
     * Set clickId
     *
     * @param integer $clickId
     *
     * @return ClickTrack
     */
    public function setClickId($clickId)
    {
        $this->click_id = $clickId;

        return $this;
    }

    /**
     * Get clickId
     *
     * @return integer
     */
    public function getClickId()
    {
        return $this->click_id;
    }

    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return ClickTrack
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
     * Set userId
     *
     * @param integer $userId
     *
     * @return ClickTrack
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
     * Set remoteIp
     *
     * @param string $remoteIp
     *
     * @return ClickTrack
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ClickTrack
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
}

