<?php

namespace Entity\Email;

/**
 * EmailAds
 */
class EmailAds extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $ad_id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var integer
     */
    private $placement = 0;

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
    private $sponsor_name;

    /**
     * @var string
     */
    private $sponsor_link;

    /**
     * @var string
     */
    private $tracking_pixel;

    /**
     * @var string
     */
    private $image_url;

    /**
     * @var string
     */
    private $ad_headline;

    /**
     * @var string
     */
    private $ad_text;

    /**
     * @var string
     */
    private $call_to_action;

    /**
     * @var boolean
     */
    private $approval = false;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var \Entity\Email\EmailType
     */
    private $Products;


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
     * Set productId
     *
     * @param integer $productId
     *
     * @return EmailAds
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set placement
     *
     * @param integer $placement
     *
     * @return EmailAds
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return integer
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return EmailAds
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
     * @return EmailAds
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
     * Set sponsorName
     *
     * @param string $sponsorName
     *
     * @return EmailAds
     */
    public function setSponsorName($sponsorName)
    {
        $this->sponsor_name = $sponsorName;

        return $this;
    }

    /**
     * Get sponsorName
     *
     * @return string
     */
    public function getSponsorName()
    {
        return $this->sponsor_name;
    }

    /**
     * Set sponsorLink
     *
     * @param string $sponsorLink
     *
     * @return EmailAds
     */
    public function setSponsorLink($sponsorLink)
    {
        $this->sponsor_link = $sponsorLink;

        return $this;
    }

    /**
     * Get sponsorLink
     *
     * @return string
     */
    public function getSponsorLink()
    {
        return $this->sponsor_link;
    }

    /**
     * Set trackingPixel
     *
     * @param string $trackingPixel
     *
     * @return EmailAds
     */
    public function setTrackingPixel($trackingPixel)
    {
        $this->tracking_pixel = $trackingPixel;

        return $this;
    }

    /**
     * Get trackingPixel
     *
     * @return string
     */
    public function getTrackingPixel()
    {
        return $this->tracking_pixel;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return EmailAds
     */
    public function setImageUrl($imageUrl)
    {
        $this->image_url = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Set adHeadline
     *
     * @param string $adHeadline
     *
     * @return EmailAds
     */
    public function setAdHeadline($adHeadline)
    {
        $this->ad_headline = $adHeadline;

        return $this;
    }

    /**
     * Get adHeadline
     *
     * @return string
     */
    public function getAdHeadline()
    {
        return $this->ad_headline;
    }

    /**
     * Set adText
     *
     * @param string $adText
     *
     * @return EmailAds
     */
    public function setAdText($adText)
    {
        $this->ad_text = $adText;

        return $this;
    }

    /**
     * Get adText
     *
     * @return string
     */
    public function getAdText()
    {
        return $this->ad_text;
    }

    /**
     * Set callToAction
     *
     * @param string $callToAction
     *
     * @return EmailAds
     */
    public function setCallToAction($callToAction)
    {
        $this->call_to_action = $callToAction;

        return $this;
    }

    /**
     * Get callToAction
     *
     * @return string
     */
    public function getCallToAction()
    {
        return $this->call_to_action;
    }

    /**
     * Set approval
     *
     * @param boolean $approval
     *
     * @return EmailAds
     */
    public function setApproval($approval)
    {
        $this->approval = $approval;

        return $this;
    }

    /**
     * Get approval
     *
     * @return boolean
     */
    public function getApproval()
    {
        return $this->approval;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return EmailAds
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set products
     *
     * @param \Entity\Email\EmailType $products
     *
     * @return EmailAds
     */
    public function setProducts(\Entity\Email\EmailType $products = null)
    {
        $this->Products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \Entity\Email\EmailType
     */
    public function getProducts()
    {
        return $this->Products;
    }
}

