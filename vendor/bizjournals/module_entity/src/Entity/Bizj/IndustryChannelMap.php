<?php

namespace Entity\Bizj;

/**
 * IndustryChannelMap
 */
class IndustryChannelMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $industry_id;

    /**
     * @var integer
     */
    private $channel_id;

    /**
     * @var \Entity\Bizj\Industry
     */
    private $Industry;

    /**
     * @var \Entity\Bizj\Channel
     */
    private $Channel;


    /**
     * Set industryId
     *
     * @param integer $industryId
     *
     * @return IndustryChannelMap
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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return IndustryChannelMap
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

    /**
     * Set industry
     *
     * @param \Entity\Bizj\Industry $industry
     *
     * @return IndustryChannelMap
     */
    public function setIndustry(\Entity\Bizj\Industry $industry = null)
    {
        $this->Industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return \Entity\Bizj\Industry
     */
    public function getIndustry()
    {
        return $this->Industry;
    }

    /**
     * Set channel
     *
     * @param \Entity\Bizj\Channel $channel
     *
     * @return IndustryChannelMap
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

