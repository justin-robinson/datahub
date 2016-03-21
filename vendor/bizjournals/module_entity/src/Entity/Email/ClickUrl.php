<?php

namespace Entity\Email;

/**
 * ClickUrl
 */
class ClickUrl extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $click_id;

    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var string
     */
    private $ref_type;

    /**
     * @var integer
     */
    private $ref_id;

    /**
     * @var string
     */
    private $dest_url;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $created_at;


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
     * @return ClickUrl
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
     * Set refType
     *
     * @param string $refType
     *
     * @return ClickUrl
     */
    public function setRefType($refType)
    {
        $this->ref_type = $refType;

        return $this;
    }

    /**
     * Get refType
     *
     * @return string
     */
    public function getRefType()
    {
        return $this->ref_type;
    }

    /**
     * Set refId
     *
     * @param integer $refId
     *
     * @return ClickUrl
     */
    public function setRefId($refId)
    {
        $this->ref_id = $refId;

        return $this;
    }

    /**
     * Get refId
     *
     * @return integer
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * Set destUrl
     *
     * @param string $destUrl
     *
     * @return ClickUrl
     */
    public function setDestUrl($destUrl)
    {
        $this->dest_url = $destUrl;

        return $this;
    }

    /**
     * Get destUrl
     *
     * @return string
     */
    public function getDestUrl()
    {
        return $this->dest_url;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ClickUrl
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ClickUrl
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

