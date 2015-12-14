<?php

namespace Entity\Datahub;

/**
 * MarketMsaPmsaMap
 */
class MarketMsaPmsaMap extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var string
     */
    private $sa_code;


    /**
     * Set marketId
     *
     * @param integer $marketId
     *
     * @return MarketMsaPmsaMap
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
     * Set saCode
     *
     * @param string $saCode
     *
     * @return MarketMsaPmsaMap
     */
    public function setSaCode($saCode)
    {
        $this->sa_code = $saCode;

        return $this;
    }

    /**
     * Get saCode
     *
     * @return string
     */
    public function getSaCode()
    {
        return $this->sa_code;
    }
}

