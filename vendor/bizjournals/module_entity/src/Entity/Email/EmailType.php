<?php

namespace Entity\Email;

use Doctrine\ORM\Mapping as ORM;

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
     * Get product_id
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set product_name
     *
     * @param string $productName
     * @return EmailType
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;

        return $this;
    }

    /**
     * Get product_name
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set product_title
     *
     * @param string $productTitle
     * @return EmailType
     */
    public function setProductTitle($productTitle)
    {
        $this->product_title = $productTitle;

        return $this;
    }

    /**
     * Get product_title
     *
     * @return string 
     */
    public function getProductTitle()
    {
        return $this->product_title;
    }

    /**
     * Set product_type
     *
     * @param string $productType
     * @return EmailType
     */
    public function setProductType($productType)
    {
        $this->product_type = $productType;

        return $this;
    }

    /**
     * Get product_type
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
     * Set tracking_code
     *
     * @param string $trackingCode
     * @return EmailType
     */
    public function setTrackingCode($trackingCode)
    {
        $this->tracking_code = $trackingCode;

        return $this;
    }

    /**
     * Get tracking_code
     *
     * @return string 
     */
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * Set default_host
     *
     * @param string $defaultHost
     * @return EmailType
     */
    public function setDefaultHost($defaultHost)
    {
        $this->default_host = $defaultHost;

        return $this;
    }

    /**
     * Get default_host
     *
     * @return string 
     */
    public function getDefaultHost()
    {
        return $this->default_host;
    }

    /**
     * Set default_subject
     *
     * @param string $defaultSubject
     * @return EmailType
     */
    public function setDefaultSubject($defaultSubject)
    {
        $this->default_subject = $defaultSubject;

        return $this;
    }

    /**
     * Get default_subject
     *
     * @return string 
     */
    public function getDefaultSubject()
    {
        return $this->default_subject;
    }

    /**
     * Set default_sender
     *
     * @param string $defaultSender
     * @return EmailType
     */
    public function setDefaultSender($defaultSender)
    {
        $this->default_sender = $defaultSender;

        return $this;
    }

    /**
     * Get default_sender
     *
     * @return string 
     */
    public function getDefaultSender()
    {
        return $this->default_sender;
    }

    /**
     * Set reply_address
     *
     * @param string $replyAddress
     * @return EmailType
     */
    public function setReplyAddress($replyAddress)
    {
        $this->reply_address = $replyAddress;

        return $this;
    }

    /**
     * Get reply_address
     *
     * @return string 
     */
    public function getReplyAddress()
    {
        return $this->reply_address;
    }

    /**
     * Set send_days
     *
     * @param string $sendDays
     * @return EmailType
     */
    public function setSendDays($sendDays)
    {
        $this->send_days = $sendDays;

        return $this;
    }

    /**
     * Get send_days
     *
     * @return string 
     */
    public function getSendDays()
    {
        return $this->send_days;
    }

    /**
     * Set send_time
     *
     * @param string $sendTime
     * @return EmailType
     */
    public function setSendTime($sendTime)
    {
        $this->send_time = $sendTime;

        return $this;
    }

    /**
     * Get send_time
     *
     * @return string 
     */
    public function getSendTime()
    {
        return $this->send_time;
    }

    /**
     * Set message_expiration
     *
     * @param integer $messageExpiration
     * @return EmailType
     */
    public function setMessageExpiration($messageExpiration)
    {
        $this->message_expiration = $messageExpiration;

        return $this;
    }

    /**
     * Get message_expiration
     *
     * @return integer 
     */
    public function getMessageExpiration()
    {
        return $this->message_expiration;
    }

    /**
     * Set content_id
     *
     * @param integer $contentId
     * @return EmailType
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get content_id
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
     * Set manual_send
     *
     * @param boolean $manualSend
     * @return EmailType
     */
    public function setManualSend($manualSend)
    {
        $this->manual_send = $manualSend;

        return $this;
    }

    /**
     * Get manual_send
     *
     * @return boolean 
     */
    public function getManualSend()
    {
        return $this->manual_send;
    }

    /**
     * Set homepage_promo
     *
     * @param boolean $homepagePromo
     * @return EmailType
     */
    public function setHomepagePromo($homepagePromo)
    {
        $this->homepage_promo = $homepagePromo;

        return $this;
    }

    /**
     * Get homepage_promo
     *
     * @return boolean 
     */
    public function getHomepagePromo()
    {
        return $this->homepage_promo;
    }

    /**
     * Set promo_text
     *
     * @param string $promoText
     * @return EmailType
     */
    public function setPromoText($promoText)
    {
        $this->promo_text = $promoText;

        return $this;
    }

    /**
     * Get promo_text
     *
     * @return string 
     */
    public function getPromoText()
    {
        return $this->promo_text;
    }

    /**
     * Set product_recommendations
     *
     * @param string $productRecommendations
     * @return EmailType
     */
    public function setProductRecommendations($productRecommendations)
    {
        $this->product_recommendations = $productRecommendations;

        return $this;
    }

    /**
     * Get product_recommendations
     *
     * @return string 
     */
    public function getProductRecommendations()
    {
        return $this->product_recommendations;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return EmailType
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
     * @return EmailType
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
}
