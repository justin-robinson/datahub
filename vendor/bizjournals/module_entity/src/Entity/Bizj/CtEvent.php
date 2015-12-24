<?php

namespace Entity\Bizj;

/**
 * CtEvent
 */
class CtEvent extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $event_type;

    /**
     * @var integer
     */
    private $campaign_id;

    /**
     * @var integer
     */
    private $click_id;

    /**
     * @var \DateTime
     */
    private $c_time = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    private $remote_ip;

    /**
     * @var string
     */
    private $uin;

    /**
     * @var string
     */
    private $user_agent;

    /**
     * @var string
     */
    private $source_url;

    /**
     * @var string
     */
    private $dest_url;

    /**
     * @var string
     */
    private $referer;


    /**
     * Set eventType
     *
     * @param string $eventType
     *
     * @return CtEvent
     */
    public function setEventType($eventType)
    {
        $this->event_type = $eventType;

        return $this;
    }

    /**
     * Get eventType
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Set campaignId
     *
     * @param integer $campaignId
     *
     * @return CtEvent
     */
    public function setCampaignId($campaignId)
    {
        $this->campaign_id = $campaignId;

        return $this;
    }

    /**
     * Get campaignId
     *
     * @return integer
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Set clickId
     *
     * @param integer $clickId
     *
     * @return CtEvent
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
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return CtEvent
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set remoteIp
     *
     * @param string $remoteIp
     *
     * @return CtEvent
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
     * Set uin
     *
     * @param string $uin
     *
     * @return CtEvent
     */
    public function setUin($uin)
    {
        $this->uin = $uin;

        return $this;
    }

    /**
     * Get uin
     *
     * @return string
     */
    public function getUin()
    {
        return $this->uin;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return CtEvent
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set sourceUrl
     *
     * @param string $sourceUrl
     *
     * @return CtEvent
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->source_url = $sourceUrl;

        return $this;
    }

    /**
     * Get sourceUrl
     *
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * Set destUrl
     *
     * @param string $destUrl
     *
     * @return CtEvent
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
     * Set referer
     *
     * @param string $referer
     *
     * @return CtEvent
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }
}

