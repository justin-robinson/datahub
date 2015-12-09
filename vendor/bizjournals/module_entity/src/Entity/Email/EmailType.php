<?php

namespace Entity\Email;

/**
 * EmailType
 */
class EmailType extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var string
     */
    private $product_title;

    /**
     * @var string
     */
    private $product_type;

    /**
     * @var string
     */
    private $classification;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $market;

    /**
     * @var string
     */
    private $skin;

    /**
     * @var string
     */
    private $tracking_code;

    /**
     * @var string
     */
    private $default_host;

    /**
     * @var string
     */
    private $default_subject;

    /**
     * @var string
     */
    private $default_sender;

    /**
     * @var string
     */
    private $reply_address;

    /**
     * @var string
     */
    private $send_days;

    /**
     * @var string
     */
    private $send_time;

    /**
     * @var integer
     */
    private $message_expiration = 30;

    /**
     * @var integer
     */
    private $content_id;

    /**
     * @var boolean
     */
    private $managed = false;

    /**
     * @var boolean
     */
    private $active = true;

    /**
     * @var boolean
     */
    private $manual_send = false;

    /**
     * @var boolean
     */
    private $homepage_promo = false;

    /**
     * @var string
     */
    private $promo_text;

    /**
     * @var string
     */
    private $product_recommendations;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


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
     * Set productName
     *
     * @param string $productName
     *
     * @return EmailType
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set productTitle
     *
     * @param string $productTitle
     *
     * @return EmailType
     */
    public function setProductTitle($productTitle)
    {
        $this->product_title = $productTitle;

        return $this;
    }

    /**
     * Get productTitle
     *
     * @return string
     */
    public function getProductTitle()
    {
        return $this->product_title;
    }

    /**
     * Set productType
     *
     * @param string $productType
     *
     * @return EmailType
     */
    public function setProductType($productType)
    {
        $this->product_type = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * Set classification
     *
     * @param string $classification
     *
     * @return EmailType
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get classification
     *
     * @return string
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return EmailType
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set market
     *
     * @param string $market
     *
     * @return EmailType
     */
    public function setMarket($market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return string
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * Set skin
     *
     * @param string $skin
     *
     * @return EmailType
     */
    public function setSkin($skin)
    {
        $this->skin = $skin;

        return $this;
    }

    /**
     * Get skin
     *
     * @return string
     */
    public function getSkin()
    {
        return $this->skin;
    }

    /**
     * Set trackingCode
     *
     * @param string $trackingCode
     *
     * @return EmailType
     */
    public function setTrackingCode($trackingCode)
    {
        $this->tracking_code = $trackingCode;

        return $this;
    }

    /**
     * Get trackingCode
     *
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * Set defaultHost
     *
     * @param string $defaultHost
     *
     * @return EmailType
     */
    public function setDefaultHost($defaultHost)
    {
        $this->default_host = $defaultHost;

        return $this;
    }

    /**
     * Get defaultHost
     *
     * @return string
     */
    public function getDefaultHost()
    {
        return $this->default_host;
    }

    /**
     * Set defaultSubject
     *
     * @param string $defaultSubject
     *
     * @return EmailType
     */
    public function setDefaultSubject($defaultSubject)
    {
        $this->default_subject = $defaultSubject;

        return $this;
    }

    /**
     * Get defaultSubject
     *
     * @return string
     */
    public function getDefaultSubject()
    {
        return $this->default_subject;
    }

    /**
     * Set defaultSender
     *
     * @param string $defaultSender
     *
     * @return EmailType
     */
    public function setDefaultSender($defaultSender)
    {
        $this->default_sender = $defaultSender;

        return $this;
    }

    /**
     * Get defaultSender
     *
     * @return string
     */
    public function getDefaultSender()
    {
        return $this->default_sender;
    }

    /**
     * Set replyAddress
     *
     * @param string $replyAddress
     *
     * @return EmailType
     */
    public function setReplyAddress($replyAddress)
    {
        $this->reply_address = $replyAddress;

        return $this;
    }

    /**
     * Get replyAddress
     *
     * @return string
     */
    public function getReplyAddress()
    {
        return $this->reply_address;
    }

    /**
     * Set sendDays
     *
     * @param string $sendDays
     *
     * @return EmailType
     */
    public function setSendDays($sendDays)
    {
        $this->send_days = $sendDays;

        return $this;
    }

    /**
     * Get sendDays
     *
     * @return string
     */
    public function getSendDays()
    {
        return $this->send_days;
    }

    /**
     * Set sendTime
     *
     * @param string $sendTime
     *
     * @return EmailType
     */
    public function setSendTime($sendTime)
    {
        $this->send_time = $sendTime;

        return $this;
    }

    /**
     * Get sendTime
     *
     * @return string
     */
    public function getSendTime()
    {
        return $this->send_time;
    }

    /**
     * Set messageExpiration
     *
     * @param integer $messageExpiration
     *
     * @return EmailType
     */
    public function setMessageExpiration($messageExpiration)
    {
        $this->message_expiration = $messageExpiration;

        return $this;
    }

    /**
     * Get messageExpiration
     *
     * @return integer
     */
    public function getMessageExpiration()
    {
        return $this->message_expiration;
    }

    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return EmailType
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return integer
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * Set managed
     *
     * @param boolean $managed
     *
     * @return EmailType
     */
    public function setManaged($managed)
    {
        $this->managed = $managed;

        return $this;
    }

    /**
     * Get managed
     *
     * @return boolean
     */
    public function getManaged()
    {
        return $this->managed;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return EmailType
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set manualSend
     *
     * @param boolean $manualSend
     *
     * @return EmailType
     */
    public function setManualSend($manualSend)
    {
        $this->manual_send = $manualSend;

        return $this;
    }

    /**
     * Get manualSend
     *
     * @return boolean
     */
    public function getManualSend()
    {
        return $this->manual_send;
    }

    /**
     * Set homepagePromo
     *
     * @param boolean $homepagePromo
     *
     * @return EmailType
     */
    public function setHomepagePromo($homepagePromo)
    {
        $this->homepage_promo = $homepagePromo;

        return $this;
    }

    /**
     * Get homepagePromo
     *
     * @return boolean
     */
    public function getHomepagePromo()
    {
        return $this->homepage_promo;
    }

    /**
     * Set promoText
     *
     * @param string $promoText
     *
     * @return EmailType
     */
    public function setPromoText($promoText)
    {
        $this->promo_text = $promoText;

        return $this;
    }

    /**
     * Get promoText
     *
     * @return string
     */
    public function getPromoText()
    {
        return $this->promo_text;
    }

    /**
     * Set productRecommendations
     *
     * @param string $productRecommendations
     *
     * @return EmailType
     */
    public function setProductRecommendations($productRecommendations)
    {
        $this->product_recommendations = $productRecommendations;

        return $this;
    }

    /**
     * Get productRecommendations
     *
     * @return string
     */
    public function getProductRecommendations()
    {
        return $this->product_recommendations;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return EmailType
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
     * @return EmailType
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

