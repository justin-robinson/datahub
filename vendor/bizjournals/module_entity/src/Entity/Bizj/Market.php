<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Journals;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Pulses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $PulseMarkets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Journals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Pulses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->PulseMarkets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set market_code
     *
     * @param string $marketCode
     * @return Market
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set market_name
     *
     * @param string $marketName
     * @return Market
     */
    public function setMarketName($marketName)
    {
        $this->market_name = $marketName;

        return $this;
    }

    /**
     * Get market_name
     *
     * @return string 
     */
    public function getMarketName()
    {
        return $this->market_name;
    }

    /**
     * Set market_abbrev
     *
     * @param string $marketAbbrev
     * @return Market
     */
    public function setMarketAbbrev($marketAbbrev)
    {
        $this->market_abbrev = $marketAbbrev;

        return $this;
    }

    /**
     * Get market_abbrev
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
     * Set region_objective
     *
     * @param string $regionObjective
     * @return Market
     */
    public function setRegionObjective($regionObjective)
    {
        $this->region_objective = $regionObjective;

        return $this;
    }

    /**
     * Get region_objective
     *
     * @return string 
     */
    public function getRegionObjective()
    {
        return $this->region_objective;
    }

    /**
     * Set local_sales_tax
     *
     * @param string $localSalesTax
     * @return Market
     */
    public function setLocalSalesTax($localSalesTax)
    {
        $this->local_sales_tax = $localSalesTax;

        return $this;
    }

    /**
     * Get local_sales_tax
     *
     * @return string 
     */
    public function getLocalSalesTax()
    {
        return $this->local_sales_tax;
    }

    /**
     * Set primary_zip_code
     *
     * @param string $primaryZipCode
     * @return Market
     */
    public function setPrimaryZipCode($primaryZipCode)
    {
        $this->primary_zip_code = $primaryZipCode;

        return $this;
    }

    /**
     * Get primary_zip_code
     *
     * @return string 
     */
    public function getPrimaryZipCode()
    {
        return $this->primary_zip_code;
    }

    /**
     * Set center_latitude
     *
     * @param string $centerLatitude
     * @return Market
     */
    public function setCenterLatitude($centerLatitude)
    {
        $this->center_latitude = $centerLatitude;

        return $this;
    }

    /**
     * Get center_latitude
     *
     * @return string 
     */
    public function getCenterLatitude()
    {
        return $this->center_latitude;
    }

    /**
     * Set center_longitude
     *
     * @param string $centerLongitude
     * @return Market
     */
    public function setCenterLongitude($centerLongitude)
    {
        $this->center_longitude = $centerLongitude;

        return $this;
    }

    /**
     * Get center_longitude
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
     * Set utc_std_offset
     *
     * @param integer $utcStdOffset
     * @return Market
     */
    public function setUtcStdOffset($utcStdOffset)
    {
        $this->utc_std_offset = $utcStdOffset;

        return $this;
    }

    /**
     * Get utc_std_offset
     *
     * @return integer 
     */
    public function getUtcStdOffset()
    {
        return $this->utc_std_offset;
    }

    /**
     * Set utc_dst_offset
     *
     * @param integer $utcDstOffset
     * @return Market
     */
    public function setUtcDstOffset($utcDstOffset)
    {
        $this->utc_dst_offset = $utcDstOffset;

        return $this;
    }

    /**
     * Get utc_dst_offset
     *
     * @return integer 
     */
    public function getUtcDstOffset()
    {
        return $this->utc_dst_offset;
    }

    /**
     * Set payment_contact_id
     *
     * @param integer $paymentContactId
     * @return Market
     */
    public function setPaymentContactId($paymentContactId)
    {
        $this->payment_contact_id = $paymentContactId;

        return $this;
    }

    /**
     * Get payment_contact_id
     *
     * @return integer 
     */
    public function getPaymentContactId()
    {
        return $this->payment_contact_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Market
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
     * @return Market
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
     * Add Journals
     *
     * @param \Entity\Bizj\Journal $journals
     * @return Market
     */
    public function addJournal(\Entity\Bizj\Journal $journals)
    {
        $this->Journals[] = $journals;

        return $this;
    }

    /**
     * Remove Journals
     *
     * @param \Entity\Bizj\Journal $journals
     */
    public function removeJournal(\Entity\Bizj\Journal $journals)
    {
        $this->Journals->removeElement($journals);
    }

    /**
     * Get Journals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJournals()
    {
        return $this->Journals;
    }

    /**
     * Add Pulses
     *
     * @param \Entity\Bizj\Pulse $pulses
     * @return Market
     */
    public function addPulse(\Entity\Bizj\Pulse $pulses)
    {
        $this->Pulses[] = $pulses;

        return $this;
    }

    /**
     * Remove Pulses
     *
     * @param \Entity\Bizj\Pulse $pulses
     */
    public function removePulse(\Entity\Bizj\Pulse $pulses)
    {
        $this->Pulses->removeElement($pulses);
    }

    /**
     * Get Pulses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPulses()
    {
        return $this->Pulses;
    }

    /**
     * Add PulseMarkets
     *
     * @param \Entity\Bizj\PulseMarketMap $pulseMarkets
     * @return Market
     */
    public function addPulseMarket(\Entity\Bizj\PulseMarketMap $pulseMarkets)
    {
        $this->PulseMarkets[] = $pulseMarkets;

        return $this;
    }

    /**
     * Remove PulseMarkets
     *
     * @param \Entity\Bizj\PulseMarketMap $pulseMarkets
     */
    public function removePulseMarket(\Entity\Bizj\PulseMarketMap $pulseMarkets)
    {
        $this->PulseMarkets->removeElement($pulseMarkets);
    }

    /**
     * Get PulseMarkets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPulseMarkets()
    {
        return $this->PulseMarkets;
    }
}
