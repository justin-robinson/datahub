<?php

namespace Entity\Datahub;

/**
 * UsState
 */
class UsState extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $state_long;

    /**
     * @var string
     */
    private $state_postal;

    /**
     * @var string
     */
    private $state_ap_style;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var integer
     */
    private $ord = 0;


    /**
     * Set stateLong
     *
     * @param string $stateLong
     *
     * @return UsState
     */
    public function setStateLong($stateLong)
    {
        $this->state_long = $stateLong;

        return $this;
    }

    /**
     * Get stateLong
     *
     * @return string
     */
    public function getStateLong()
    {
        return $this->state_long;
    }

    /**
     * Set statePostal
     *
     * @param string $statePostal
     *
     * @return UsState
     */
    public function setStatePostal($statePostal)
    {
        $this->state_postal = $statePostal;

        return $this;
    }

    /**
     * Get statePostal
     *
     * @return string
     */
    public function getStatePostal()
    {
        return $this->state_postal;
    }

    /**
     * Set stateApStyle
     *
     * @param string $stateApStyle
     *
     * @return UsState
     */
    public function setStateApStyle($stateApStyle)
    {
        $this->state_ap_style = $stateApStyle;

        return $this;
    }

    /**
     * Get stateApStyle
     *
     * @return string
     */
    public function getStateApStyle()
    {
        return $this->state_ap_style;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return UsState
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
     * @return UsState
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

