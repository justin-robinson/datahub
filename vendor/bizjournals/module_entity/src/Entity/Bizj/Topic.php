<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Get topic_id
     *
     * @return integer 
     */
    public function getTopicId()
    {
        return $this->topic_id;
    }

    /**
     * Set usage_market
     *
     * @param string $usageMarket
     * @return Topic
     */
    public function setUsageMarket($usageMarket)
    {
        $this->usage_market = $usageMarket;

        return $this;
    }

    /**
     * Get usage_market
     *
     * @return string 
     */
    public function getUsageMarket()
    {
        return $this->usage_market;
    }

    /**
     * Set topic_code
     *
     * @param string $topicCode
     * @return Topic
     */
    public function setTopicCode($topicCode)
    {
        $this->topic_code = $topicCode;

        return $this;
    }

    /**
     * Get topic_code
     *
     * @return string 
     */
    public function getTopicCode()
    {
        return $this->topic_code;
    }

    /**
     * Set topic_name
     *
     * @param string $topicName
     * @return Topic
     */
    public function setTopicName($topicName)
    {
        $this->topic_name = $topicName;

        return $this;
    }

    /**
     * Get topic_name
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Topic
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
}
