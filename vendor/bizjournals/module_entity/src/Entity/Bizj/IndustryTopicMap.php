<?php

namespace Entity\Bizj;

/**
 * IndustryTopicMap
 */
class IndustryTopicMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $industry_id;

    /**
     * @var integer
     */
    private $topic_id;

    /**
     * @var \Entity\Bizj\Topic
     */
    private $Topic;

    /**
     * @var \Entity\Bizj\Channel
     */
    private $Channel;


    /**
     * Set industryId
     *
     * @param integer $industryId
     *
     * @return IndustryTopicMap
     */
    public function setIndustryId($industryId)
    {
        $this->industry_id = $industryId;

        return $this;
    }

    /**
     * Get industryId
     *
     * @return integer
     */
    public function getIndustryId()
    {
        return $this->industry_id;
    }

    /**
     * Set topicId
     *
     * @param integer $topicId
     *
     * @return IndustryTopicMap
     */
    public function setTopicId($topicId)
    {
        $this->topic_id = $topicId;

        return $this;
    }

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
     * Set topic
     *
     * @param \Entity\Bizj\Topic $topic
     *
     * @return IndustryTopicMap
     */
    public function setTopic(\Entity\Bizj\Topic $topic = null)
    {
        $this->Topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Entity\Bizj\Topic
     */
    public function getTopic()
    {
        return $this->Topic;
    }

    /**
     * Set channel
     *
     * @param \Entity\Bizj\Channel $channel
     *
     * @return IndustryTopicMap
     */
    public function setChannel(\Entity\Bizj\Channel $channel = null)
    {
        $this->Channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return \Entity\Bizj\Channel
     */
    public function getChannel()
    {
        return $this->Channel;
    }
}

