<?php

namespace Entity\Bizj;

/**
 * Channel
 */
class Channel extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $channel_id;

    /**
     * @var string
     */
    private $channel_name;

    /**
     * @var boolean
     */
    private $is_active = '1';

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $industries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->industries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get channelId
     *
     * @return integer
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * Set channelName
     *
     * @param string $channelName
     *
     * @return Channel
     */
    public function setChannelName($channelName)
    {
        $this->channel_name = $channelName;

        return $this;
    }

    /**
     * Get channelName
     *
     * @return string
     */
    public function getChannelName()
    {
        return $this->channel_name;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Channel
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
     * Add industry
     *
     * @param \Entity\Bizj\Industry $industry
     *
     * @return Channel
     */
    public function addIndustry(\Entity\Bizj\Industry $industry)
    {
        $this->industries[] = $industry;

        return $this;
    }

    /**
     * Remove industry
     *
     * @param \Entity\Bizj\Industry $industry
     */
    public function removeIndustry(\Entity\Bizj\Industry $industry)
    {
        $this->industries->removeElement($industry);
    }

    /**
     * Get industries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndustries()
    {
        return $this->industries;
    }
}

