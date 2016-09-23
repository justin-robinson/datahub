<?php

namespace Entity\Bizj;

/**
 * Topic
 */
class Topic extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $topic_id;

    /**
     * @var string
     */
    private $usage_market = 'global';

    /**
     * @var string
     */
    private $topic_code;

    /**
     * @var string
     */
    private $topic_name;

    /**
     * @var boolean
     */
    private $hidden = false;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var integer
     */
    private $channel_id;


    /**
     * Get topicId
     *
     * @return integer
     */
    public function getTopicId()
    {
        return $this->topic_id;
    }

    /**
     * Set usageMarket
     *
     * @param string $usageMarket
     *
     * @return Topic
     */
    public function setUsageMarket($usageMarket)
    {
        $this->usage_market = $usageMarket;

        return $this;
    }

    /**
     * Get usageMarket
     *
     * @return string
     */
    public function getUsageMarket()
    {
        return $this->usage_market;
    }

    /**
     * Set topicCode
     *
     * @param string $topicCode
     *
     * @return Topic
     */
    public function setTopicCode($topicCode)
    {
        $this->topic_code = $topicCode;

        return $this;
    }

    /**
     * Get topicCode
     *
     * @return string
     */
    public function getTopicCode()
    {
        return $this->topic_code;
    }

    /**
     * Set topicName
     *
     * @param string $topicName
     *
     * @return Topic
     */
    public function setTopicName($topicName)
    {
        $this->topic_name = $topicName;

        return $this;
    }

    /**
     * Get topicName
     *
     * @return string
     */
    public function getTopicName()
    {
        return $this->topic_name;
    }

    /**
     * Set hidden
     *
     * @param boolean $hidden
     *
     * @return Topic
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Topic
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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return Topic
     */
    public function setChannelId($channelId)
    {
        $this->channel_id = $channelId;

        return $this;
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
}

