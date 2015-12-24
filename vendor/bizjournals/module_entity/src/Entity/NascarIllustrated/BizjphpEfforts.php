<?php

namespace Entity\NascarIllustrated;

/**
 * BizjphpEfforts
 */
class BizjphpEfforts extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $market_code;

    /**
     * @var integer
     */
    private $subscription_number;

    /**
     * @var string
     */
    private $source_code;

    /**
     * @var integer
     */
    private $effort_number;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $billing_data;

    /**
     * @var string
     */
    private $rate_data;

    /**
     * @var string
     */
    private $premium_code;

    /**
     * @var integer
     */
    private $copies;

    /**
     * @var string
     */
    private $finder;


    /**
     * Set marketCode
     *
     * @param string $marketCode
     *
     * @return BizjphpEfforts
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
     * Set subscriptionNumber
     *
     * @param integer $subscriptionNumber
     *
     * @return BizjphpEfforts
     */
    public function setSubscriptionNumber($subscriptionNumber)
    {
        $this->subscription_number = $subscriptionNumber;

        return $this;
    }

    /**
     * Get subscriptionNumber
     *
     * @return integer
     */
    public function getSubscriptionNumber()
    {
        return $this->subscription_number;
    }

    /**
     * Set sourceCode
     *
     * @param string $sourceCode
     *
     * @return BizjphpEfforts
     */
    public function setSourceCode($sourceCode)
    {
        $this->source_code = $sourceCode;

        return $this;
    }

    /**
     * Get sourceCode
     *
     * @return string
     */
    public function getSourceCode()
    {
        return $this->source_code;
    }

    /**
     * Set effortNumber
     *
     * @param integer $effortNumber
     *
     * @return BizjphpEfforts
     */
    public function setEffortNumber($effortNumber)
    {
        $this->effort_number = $effortNumber;

        return $this;
    }

    /**
     * Get effortNumber
     *
     * @return integer
     */
    public function getEffortNumber()
    {
        return $this->effort_number;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return BizjphpEfforts
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return BizjphpEfforts
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return BizjphpEfforts
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set billingData
     *
     * @param string $billingData
     *
     * @return BizjphpEfforts
     */
    public function setBillingData($billingData)
    {
        $this->billing_data = $billingData;

        return $this;
    }

    /**
     * Get billingData
     *
     * @return string
     */
    public function getBillingData()
    {
        return $this->billing_data;
    }

    /**
     * Set rateData
     *
     * @param string $rateData
     *
     * @return BizjphpEfforts
     */
    public function setRateData($rateData)
    {
        $this->rate_data = $rateData;

        return $this;
    }

    /**
     * Get rateData
     *
     * @return string
     */
    public function getRateData()
    {
        return $this->rate_data;
    }

    /**
     * Set premiumCode
     *
     * @param string $premiumCode
     *
     * @return BizjphpEfforts
     */
    public function setPremiumCode($premiumCode)
    {
        $this->premium_code = $premiumCode;

        return $this;
    }

    /**
     * Get premiumCode
     *
     * @return string
     */
    public function getPremiumCode()
    {
        return $this->premium_code;
    }

    /**
     * Set copies
     *
     * @param integer $copies
     *
     * @return BizjphpEfforts
     */
    public function setCopies($copies)
    {
        $this->copies = $copies;

        return $this;
    }

    /**
     * Get copies
     *
     * @return integer
     */
    public function getCopies()
    {
        return $this->copies;
    }

    /**
     * Set finder
     *
     * @param string $finder
     *
     * @return BizjphpEfforts
     */
    public function setFinder($finder)
    {
        $this->finder = $finder;

        return $this;
    }

    /**
     * Get finder
     *
     * @return string
     */
    public function getFinder()
    {
        return $this->finder;
    }
}

