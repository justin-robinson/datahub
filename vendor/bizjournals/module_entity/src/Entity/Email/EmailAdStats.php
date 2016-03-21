<?php

namespace Entity\Email;

/**
 * EmailAdStats
 */
class EmailAdStats extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $ad_id;

    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var integer
     */
    private $click_id;

    /**
     * @var integer
     */
    private $click_unique;

    /**
     * @var string
     */
    private $click_unique_rate;

    /**
     * @var integer
     */
    private $click_cumulative;

    /**
     * @var string
     */
    private $click_cumulative_rate;

    /**
     * @var \Entity\Email\EmailAds
     */
    private $Ad;


    /**
     * Set adId
     *
     * @param integer $adId
     *
     * @return EmailAdStats
     */
    public function setAdId($adId)
    {
        $this->ad_id = $adId;

        return $this;
    }

    /**
     * Get adId
     *
     * @return integer
     */
    public function getAdId()
    {
        return $this->ad_id;
    }

    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return EmailAdStats
     */
    public function setJobId($jobId)
    {
        $this->job_id = $jobId;

        return $this;
    }

    /**
     * Get jobId
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->job_id;
    }

    /**
     * Set clickId
     *
     * @param integer $clickId
     *
     * @return EmailAdStats
     */
    public function setClickId($clickId)
    {
        $this->click_id = $clickId;

        return $this;
    }

    /**
     * Get clickId
     *
     * @return integer
     */
    public function getClickId()
    {
        return $this->click_id;
    }

    /**
     * Set clickUnique
     *
     * @param integer $clickUnique
     *
     * @return EmailAdStats
     */
    public function setClickUnique($clickUnique)
    {
        $this->click_unique = $clickUnique;

        return $this;
    }

    /**
     * Get clickUnique
     *
     * @return integer
     */
    public function getClickUnique()
    {
        return $this->click_unique;
    }

    /**
     * Set clickUniqueRate
     *
     * @param string $clickUniqueRate
     *
     * @return EmailAdStats
     */
    public function setClickUniqueRate($clickUniqueRate)
    {
        $this->click_unique_rate = $clickUniqueRate;

        return $this;
    }

    /**
     * Get clickUniqueRate
     *
     * @return string
     */
    public function getClickUniqueRate()
    {
        return $this->click_unique_rate;
    }

    /**
     * Set clickCumulative
     *
     * @param integer $clickCumulative
     *
     * @return EmailAdStats
     */
    public function setClickCumulative($clickCumulative)
    {
        $this->click_cumulative = $clickCumulative;

        return $this;
    }

    /**
     * Get clickCumulative
     *
     * @return integer
     */
    public function getClickCumulative()
    {
        return $this->click_cumulative;
    }

    /**
     * Set clickCumulativeRate
     *
     * @param string $clickCumulativeRate
     *
     * @return EmailAdStats
     */
    public function setClickCumulativeRate($clickCumulativeRate)
    {
        $this->click_cumulative_rate = $clickCumulativeRate;

        return $this;
    }

    /**
     * Get clickCumulativeRate
     *
     * @return string
     */
    public function getClickCumulativeRate()
    {
        return $this->click_cumulative_rate;
    }

    /**
     * Set ad
     *
     * @param \Entity\Email\EmailAds $ad
     *
     * @return EmailAdStats
     */
    public function setAd(\Entity\Email\EmailAds $ad = null)
    {
        $this->Ad = $ad;

        return $this;
    }

    /**
     * Get ad
     *
     * @return \Entity\Email\EmailAds
     */
    public function getAd()
    {
        return $this->Ad;
    }
}

