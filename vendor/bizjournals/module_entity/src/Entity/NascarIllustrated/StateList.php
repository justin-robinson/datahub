<?php

namespace Entity\NascarIllustrated;

/**
 * StateList
 */
class StateList extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $state_code;

    /**
     * @var string
     */
    private $state_name;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var integer
     */
    private $ord = 0;


    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return StateList
     */
    public function setStateCode($stateCode)
    {
        $this->state_code = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return string
     */
    public function getStateCode()
    {
        return $this->state_code;
    }

    /**
     * Set stateName
     *
     * @param string $stateName
     *
     * @return StateList
     */
    public function setStateName($stateName)
    {
        $this->state_name = $stateName;

        return $this;
    }

    /**
     * Get stateName
     *
     * @return string
     */
    public function getStateName()
    {
        return $this->state_name;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return StateList
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return StateList
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
}

