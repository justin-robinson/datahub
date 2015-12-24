<?php

namespace Entity\Datahub;

/**
 * Market
 */
class Market extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $market_id;

    /**
     * @var string
     */
    private $market_code;

    /**
     * @var string
     */
    private $market_name;

    /**
     * @var string
     */
    private $market_abbrev;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $region_objective;

    /**
     * @var string
     */
    private $analytics_code;

    /**
     * @var string
     */
    private $local_sales_tax;

    /**
     * @var string
     */
    private $primary_zip_code;

    /**
     * @var string
     */
    private $center_latitude;

    /**
     * @var string
     */
    private $center_longitude;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var integer
     */
    private $utc_std_offset;

    /**
     * @var integer
     */
    private $utc_dst_offset;

    /**
     * @var integer
     */
    private $payment_contact_id;

    /**
     * @var string
     */
    private $nomination_faq;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


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
     * Set marketCode
     *
     * @param string $marketCode
     *
     * @return Market
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get marketCode
     *
     * @return string
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set marketName
     *
     * @param string $marketName
     *
     * @return Market
     */
    public function setMarketName($marketName)
    {
        $this->market_name = $marketName;

        return $this;
    }

    /**
     * Get marketName
     *
     * @return string
     */
    public function getMarketName()
    {
        return $this->market_name;
    }

    /**
     * Set marketAbbrev
     *
     * @param string $marketAbbrev
     *
     * @return Market
     */
    public function setMarketAbbrev($marketAbbrev)
    {
        $this->market_abbrev = $marketAbbrev;

        return $this;
    }

    /**
     * Get marketAbbrev
     *
     * @return string
     */
    public function getMarketAbbrev()
    {
        return $this->market_abbrev;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Market
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Market
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Market
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set regionObjective
     *
     * @param string $regionObjective
     *
     * @return Market
     */
    public function setRegionObjective($regionObjective)
    {
        $this->region_objective = $regionObjective;

        return $this;
    }

    /**
     * Get regionObjective
     *
     * @return string
     */
    public function getRegionObjective()
    {
        return $this->region_objective;
    }

    /**
     * Set analyticsCode
     *
     * @param string $analyticsCode
     *
     * @return Market
     */
    public function setAnalyticsCode($analyticsCode)
    {
        $this->analytics_code = $analyticsCode;

        return $this;
    }

    /**
     * Get analyticsCode
     *
     * @return string
     */
    public function getAnalyticsCode()
    {
        return $this->analytics_code;
    }

    /**
     * Set localSalesTax
     *
     * @param string $localSalesTax
     *
     * @return Market
     */
    public function setLocalSalesTax($localSalesTax)
    {
        $this->local_sales_tax = $localSalesTax;

        return $this;
    }

    /**
     * Get localSalesTax
     *
     * @return string
     */
    public function getLocalSalesTax()
    {
        return $this->local_sales_tax;
    }

    /**
     * Set primaryZipCode
     *
     * @param string $primaryZipCode
     *
     * @return Market
     */
    public function setPrimaryZipCode($primaryZipCode)
    {
        $this->primary_zip_code = $primaryZipCode;

        return $this;
    }

    /**
     * Get primaryZipCode
     *
     * @return string
     */
    public function getPrimaryZipCode()
    {
        return $this->primary_zip_code;
    }

    /**
     * Set centerLatitude
     *
     * @param string $centerLatitude
     *
     * @return Market
     */
    public function setCenterLatitude($centerLatitude)
    {
        $this->center_latitude = $centerLatitude;

        return $this;
    }

    /**
     * Get centerLatitude
     *
     * @return string
     */
    public function getCenterLatitude()
    {
        return $this->center_latitude;
    }

    /**
     * Set centerLongitude
     *
     * @param string $centerLongitude
     *
     * @return Market
     */
    public function setCenterLongitude($centerLongitude)
    {
        $this->center_longitude = $centerLongitude;

        return $this;
    }

    /**
     * Get centerLongitude
     *
     * @return string
     */
    public function getCenterLongitude()
    {
        return $this->center_longitude;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     *
     * @return Market
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set utcStdOffset
     *
     * @param integer $utcStdOffset
     *
     * @return Market
     */
    public function setUtcStdOffset($utcStdOffset)
    {
        $this->utc_std_offset = $utcStdOffset;

        return $this;
    }

    /**
     * Get utcStdOffset
     *
     * @return integer
     */
    public function getUtcStdOffset()
    {
        return $this->utc_std_offset;
    }

    /**
     * Set utcDstOffset
     *
     * @param integer $utcDstOffset
     *
     * @return Market
     */
    public function setUtcDstOffset($utcDstOffset)
    {
        $this->utc_dst_offset = $utcDstOffset;

        return $this;
    }

    /**
     * Get utcDstOffset
     *
     * @return integer
     */
    public function getUtcDstOffset()
    {
        return $this->utc_dst_offset;
    }

    /**
     * Set paymentContactId
     *
     * @param integer $paymentContactId
     *
     * @return Market
     */
    public function setPaymentContactId($paymentContactId)
    {
        $this->payment_contact_id = $paymentContactId;

        return $this;
    }

    /**
     * Get paymentContactId
     *
     * @return integer
     */
    public function getPaymentContactId()
    {
        return $this->payment_contact_id;
    }

    /**
     * Set nominationFaq
     *
     * @param string $nominationFaq
     *
     * @return Market
     */
    public function setNominationFaq($nominationFaq)
    {
        $this->nomination_faq = $nominationFaq;

        return $this;
    }

    /**
     * Get nominationFaq
     *
     * @return string
     */
    public function getNominationFaq()
    {
        return $this->nomination_faq;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Market
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
     * @return Market
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
}

