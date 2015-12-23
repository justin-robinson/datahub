<?php

namespace Entity\Proxy\__CG__\Entity\Email;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EmailType extends \Entity\Email\EmailType implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_name', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_title', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_type', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'classification', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'site', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'market', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'skin', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'tracking_code', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_host', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_subject', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_sender', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'reply_address', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'send_days', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'send_time', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'message_expiration', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'content_id', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'managed', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'active', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'manual_send', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'homepage_promo', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'promo_text', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_recommendations', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'created_at', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'updated_at');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_name', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_title', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_type', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'classification', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'site', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'market', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'skin', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'tracking_code', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_host', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_subject', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'default_sender', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'reply_address', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'send_days', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'send_time', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'message_expiration', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'content_id', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'managed', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'active', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'manual_send', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'homepage_promo', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'promo_text', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'product_recommendations', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'created_at', '' . "\0" . 'Entity\\Email\\EmailType' . "\0" . 'updated_at');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EmailType $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getProductId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductId', array());

        return parent::getProductId();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductName($productName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductName', array($productName));

        return parent::setProductName($productName);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductName', array());

        return parent::getProductName();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductTitle($productTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductTitle', array($productTitle));

        return parent::setProductTitle($productTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductTitle', array());

        return parent::getProductTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductType($productType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductType', array($productType));

        return parent::setProductType($productType);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductType', array());

        return parent::getProductType();
    }

    /**
     * {@inheritDoc}
     */
    public function setClassification($classification)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClassification', array($classification));

        return parent::setClassification($classification);
    }

    /**
     * {@inheritDoc}
     */
    public function getClassification()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClassification', array());

        return parent::getClassification();
    }

    /**
     * {@inheritDoc}
     */
    public function setSite($site)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSite', array($site));

        return parent::setSite($site);
    }

    /**
     * {@inheritDoc}
     */
    public function getSite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSite', array());

        return parent::getSite();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarket($market)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarket', array($market));

        return parent::setMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarket', array());

        return parent::getMarket();
    }

    /**
     * {@inheritDoc}
     */
    public function setSkin($skin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSkin', array($skin));

        return parent::setSkin($skin);
    }

    /**
     * {@inheritDoc}
     */
    public function getSkin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSkin', array());

        return parent::getSkin();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackingCode($trackingCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackingCode', array($trackingCode));

        return parent::setTrackingCode($trackingCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackingCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackingCode', array());

        return parent::getTrackingCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultHost($defaultHost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefaultHost', array($defaultHost));

        return parent::setDefaultHost($defaultHost);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultHost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefaultHost', array());

        return parent::getDefaultHost();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultSubject($defaultSubject)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefaultSubject', array($defaultSubject));

        return parent::setDefaultSubject($defaultSubject);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultSubject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefaultSubject', array());

        return parent::getDefaultSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultSender($defaultSender)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefaultSender', array($defaultSender));

        return parent::setDefaultSender($defaultSender);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultSender()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefaultSender', array());

        return parent::getDefaultSender();
    }

    /**
     * {@inheritDoc}
     */
    public function setReplyAddress($replyAddress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReplyAddress', array($replyAddress));

        return parent::setReplyAddress($replyAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getReplyAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReplyAddress', array());

        return parent::getReplyAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setSendDays($sendDays)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSendDays', array($sendDays));

        return parent::setSendDays($sendDays);
    }

    /**
     * {@inheritDoc}
     */
    public function getSendDays()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSendDays', array());

        return parent::getSendDays();
    }

    /**
     * {@inheritDoc}
     */
    public function setSendTime($sendTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSendTime', array($sendTime));

        return parent::setSendTime($sendTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getSendTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSendTime', array());

        return parent::getSendTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setMessageExpiration($messageExpiration)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessageExpiration', array($messageExpiration));

        return parent::setMessageExpiration($messageExpiration);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessageExpiration()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessageExpiration', array());

        return parent::getMessageExpiration();
    }

    /**
     * {@inheritDoc}
     */
    public function setContentId($contentId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContentId', array($contentId));

        return parent::setContentId($contentId);
    }

    /**
     * {@inheritDoc}
     */
    public function getContentId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContentId', array());

        return parent::getContentId();
    }

    /**
     * {@inheritDoc}
     */
    public function setManaged($managed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setManaged', array($managed));

        return parent::setManaged($managed);
    }

    /**
     * {@inheritDoc}
     */
    public function getManaged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManaged', array());

        return parent::getManaged();
    }

    /**
     * {@inheritDoc}
     */
    public function setActive($active)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActive', array($active));

        return parent::setActive($active);
    }

    /**
     * {@inheritDoc}
     */
    public function getActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActive', array());

        return parent::getActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setManualSend($manualSend)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setManualSend', array($manualSend));

        return parent::setManualSend($manualSend);
    }

    /**
     * {@inheritDoc}
     */
    public function getManualSend()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManualSend', array());

        return parent::getManualSend();
    }

    /**
     * {@inheritDoc}
     */
    public function setHomepagePromo($homepagePromo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHomepagePromo', array($homepagePromo));

        return parent::setHomepagePromo($homepagePromo);
    }

    /**
     * {@inheritDoc}
     */
    public function getHomepagePromo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHomepagePromo', array());

        return parent::getHomepagePromo();
    }

    /**
     * {@inheritDoc}
     */
    public function setPromoText($promoText)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPromoText', array($promoText));

        return parent::setPromoText($promoText);
    }

    /**
     * {@inheritDoc}
     */
    public function getPromoText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPromoText', array());

        return parent::getPromoText();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductRecommendations($productRecommendations)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductRecommendations', array($productRecommendations));

        return parent::setProductRecommendations($productRecommendations);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductRecommendations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductRecommendations', array());

        return parent::getProductRecommendations();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

}
