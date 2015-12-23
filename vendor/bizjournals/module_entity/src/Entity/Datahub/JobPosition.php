<?php

namespace Entity\Datahub;

/**
 * JobPosition
 */
class JobPosition extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $job_position_id;

    /**
     * @var string
     */
    private $position;


    /**
     * Set jobPositionId
     *
     * @param integer $jobPositionId
     *
     * @return JobPosition
     */
    public function setJobPositionId($jobPositionId)
    {
        $this->job_position_id = $jobPositionId;

        return $this;
    }

    /**
     * Get jobPositionId
     *
     * @return integer
     */
    public function getJobPositionId()
    {
        return $this->job_position_id;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return JobPosition
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }
}

