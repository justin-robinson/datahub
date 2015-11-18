<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PulseMarketMap
 */
class PulseMarketMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $pulse_id;

    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @var \Entity\Bizj\Pulse
     */
    private $Pulse;

    /**
     * @var \Entity\Bizj\Market
     */
    private $Market;


    /**
     * Set pulse_id
     *
     * @param integer $pulseId
     * @return PulseMarketMap
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulse_id
     *
     * @return integer 
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set market_id
     *
     * @param integer $marketId
     * @return PulseMarketMap
     */
    public function setMarketId($marketId)
    {
        $this->market_id = $marketId;

        return $this;
    }

    /**
     * Get market_id
     *
     * @return integer 
     */
    public function getMarketId()
    {
        return $this->market_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PulseMarketMap
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return PulseMarketMap
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return PulseMarketMap
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set Pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     * @return PulseMarketMap
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get Pulse
     *
     * @return \Entity\Bizj\Pulse 
     */
    public function getPulse()
    {
        return $this->Pulse;
    }

    /**
     * Set Market
     *
     * @param \Entity\Bizj\Market $market
     * @return PulseMarketMap
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get Market
     *
     * @return \Entity\Bizj\Market 
     */
    public function getMarket()
    {
        return $this->Market;
    }
}
