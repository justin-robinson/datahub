<?php

namespace Entity\Bizj;

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
     * Set pulseId
     *
     * @param integer $pulseId
     *
     * @return PulseMarketMap
     */
    public function setPulseId($pulseId)
    {
        $this->pulse_id = $pulseId;

        return $this;
    }

    /**
     * Get pulseId
     *
     * @return integer
     */
    public function getPulseId()
    {
        return $this->pulse_id;
    }

    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return PulseMarketMap
     */
    public function setMarketId($marketId)
    {
        $this->market_id = $marketId;

        return $this;
    }

    /**
     * Get marketId
     *
     * @return integer
     */
    public function getMarketId()
    {
        return $this->market_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PulseMarketMap
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return PulseMarketMap
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return PulseMarketMap
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set pulse
     *
     * @param \Entity\Bizj\Pulse $pulse
     *
     * @return PulseMarketMap
     */
    public function setPulse(\Entity\Bizj\Pulse $pulse = null)
    {
        $this->Pulse = $pulse;

        return $this;
    }

    /**
     * Get pulse
     *
     * @return \Entity\Bizj\Pulse
     */
    public function getPulse()
    {
        return $this->Pulse;
    }

    /**
     * Set market
     *
     * @param \Entity\Bizj\Market $market
     *
     * @return PulseMarketMap
     */
    public function setMarket(\Entity\Bizj\Market $market = null)
    {
        $this->Market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Entity\Bizj\Market
     */
    public function getMarket()
    {
        return $this->Market;
    }
}

