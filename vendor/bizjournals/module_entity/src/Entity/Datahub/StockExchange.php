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
    private $exchange_abbrev;

    /**
     * @var string
     */
    private $yahoo_code = '';


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return StockExchange
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set exchangeAbbrev
     *
     * @param string $exchangeAbbrev
     *
     * @return StockExchange
     */
    public function setExchangeAbbrev($exchangeAbbrev)
    {
        $this->exchange_abbrev = $exchangeAbbrev;

        return $this;
    }

    /**
     * Get exchangeAbbrev
     *
     * @return string
     */
    public function getExchangeAbbrev()
    {
        return $this->exchange_abbrev;
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

