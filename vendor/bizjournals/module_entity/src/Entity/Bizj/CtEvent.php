<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Set event_type
     *
     * @param string $eventType
     * @return CtEvent
     */
    public function setEventType($eventType)
    {
        $this->event_type = $eventType;

        return $this;
    }

    /**
     * Get event_type
     *
     * @return string 
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Set campaign_id
     *
     * @param integer $campaignId
     * @return CtEvent
     */
    public function setCampaignId($campaignId)
    {
        $this->campaign_id = $campaignId;

        return $this;
    }

    /**
     * Get campaign_id
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Set click_id
     *
     * @param integer $clickId
     * @return CtEvent
     */
    public function setClickId($clickId)
    {
        $this->click_id = $clickId;

        return $this;
    }

    /**
     * Get click_id
     *
     * @return integer 
     */
    public function getClickId()
    {
        return $this->click_id;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return CtEvent
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set remote_ip
     *
     * @param string $remoteIp
     * @return CtEvent
     */
    public function setRemoteIp($remoteIp)
    {
        $this->remote_ip = $remoteIp;

        return $this;
    }

    /**
     * Get remote_ip
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
     * Set user_agent
     *
     * @param string $userAgent
     * @return CtEvent
     */
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;

        return $this;
    }

    /**
     * Get user_agent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Set source_url
     *
     * @param string $sourceUrl
     * @return CtEvent
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->source_url = $sourceUrl;

        return $this;
    }

    /**
     * Get source_url
     *
     * @return string 
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * Set dest_url
     *
     * @param string $destUrl
     * @return CtEvent
     */
    public function setDestUrl($destUrl)
    {
        $this->dest_url = $destUrl;

        return $this;
    }

    /**
     * Get dest_url
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
