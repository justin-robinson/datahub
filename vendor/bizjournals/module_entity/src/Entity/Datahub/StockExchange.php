<?php

namespace Entity\Datahub;

/**
 * StockExchange
 */
class StockExchange extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $exchange_name;

    /**
     * @var string
     */
    private $echange_abbrev;

    /**
     * @var string
     */
    private $yahoo_code;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set exchangeName
     *
     * @param string $exchangeName
     *
     * @return StockExchange
     */
    public function setExchangeName($exchangeName)
    {
        $this->exchange_name = $exchangeName;

        return $this;
    }

    /**
     * Get exchangeName
     *
     * @return string
     */
    public function getExchangeName()
    {
        return $this->exchange_name;
    }

    /**
     * Set echangeAbbrev
     *
     * @param string $echangeAbbrev
     *
     * @return StockExchange
     */
    public function setEchangeAbbrev($echangeAbbrev)
    {
        $this->echange_abbrev = $echangeAbbrev;

        return $this;
    }

    /**
     * Get echangeAbbrev
     *
     * @return string
     */
    public function getEchangeAbbrev()
    {
        return $this->echange_abbrev;
    }

    /**
     * Set yahooCode
     *
     * @param string $yahooCode
     *
     * @return StockExchange
     */
    public function setYahooCode($yahooCode)
    {
        $this->yahoo_code = $yahooCode;

        return $this;
    }

    /**
     * Get yahooCode
     *
     * @return string
     */
    public function getYahooCode()
    {
        return $this->yahoo_code;
    }
}

