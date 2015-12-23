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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Markets;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MsaPmsas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Markets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MsaPmsas = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    /**
     * Add market
     *
     * @param \Entity\Datahub\Market $market
     *
     * @return MarketMsaPmsaMap
     */
    public function addMarket(\Entity\Datahub\Market $market)
    {
        $this->Markets[] = $market;

        return $this;
    }

    /**
     * Remove market
     *
     * @param \Entity\Datahub\Market $market
     */
    public function removeMarket(\Entity\Datahub\Market $market)
    {
        $this->Markets->removeElement($market);
    }

    /**
     * Get markets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkets()
    {
        return $this->Markets;
    }

    /**
     * Add msaPmsa
     *
     * @param \Entity\Datahub\MsaPmsa $msaPmsa
     *
     * @return MarketMsaPmsaMap
     */
    public function addMsaPmsa(\Entity\Datahub\MsaPmsa $msaPmsa)
    {
        $this->MsaPmsas[] = $msaPmsa;

        return $this;
    }

    /**
     * Remove msaPmsa
     *
     * @param \Entity\Datahub\MsaPmsa $msaPmsa
     */
    public function removeMsaPmsa(\Entity\Datahub\MsaPmsa $msaPmsa)
    {
        $this->MsaPmsas->removeElement($msaPmsa);
    }

    /**
     * Get msaPmsas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMsaPmsas()
    {
        return $this->MsaPmsas;
    }
}

