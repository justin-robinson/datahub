<?php

namespace Entity\Proxy\__CG__\Entity\Email;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EmailAds extends \Entity\Email\EmailAds implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = [];



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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_id', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'placement', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'start_date', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'end_date', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'sponsor_name', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'sponsor_link', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'tracking_pixel', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'image_url', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_headline', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_text', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'call_to_action', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'approval', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'c_time', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'Products'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_id', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'placement', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'start_date', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'end_date', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'sponsor_name', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'sponsor_link', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'tracking_pixel', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'image_url', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_headline', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'ad_text', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'call_to_action', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'approval', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'c_time', '' . "\0" . 'Entity\\Email\\EmailAds' . "\0" . 'Products'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EmailAds $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
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
    public function getAdId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdId', []);

        return parent::getAdId();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductId($productId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductId', [$productId]);

        return parent::setProductId($productId);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductId', []);

        return parent::getProductId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlacement($placement)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlacement', [$placement]);

        return parent::setPlacement($placement);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlacement()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlacement', []);

        return parent::getPlacement();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartDate($startDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartDate', [$startDate]);

        return parent::setStartDate($startDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartDate', []);

        return parent::getStartDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndDate($endDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndDate', [$endDate]);

        return parent::setEndDate($endDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndDate', []);

        return parent::getEndDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setSponsorName($sponsorName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSponsorName', [$sponsorName]);

        return parent::setSponsorName($sponsorName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSponsorName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSponsorName', []);

        return parent::getSponsorName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSponsorLink($sponsorLink)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSponsorLink', [$sponsorLink]);

        return parent::setSponsorLink($sponsorLink);
    }

    /**
     * {@inheritDoc}
     */
    public function getSponsorLink()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSponsorLink', []);

        return parent::getSponsorLink();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackingPixel($trackingPixel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackingPixel', [$trackingPixel]);

        return parent::setTrackingPixel($trackingPixel);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackingPixel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackingPixel', []);

        return parent::getTrackingPixel();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageUrl($imageUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageUrl', [$imageUrl]);

        return parent::setImageUrl($imageUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageUrl', []);

        return parent::getImageUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdHeadline($adHeadline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdHeadline', [$adHeadline]);

        return parent::setAdHeadline($adHeadline);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdHeadline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdHeadline', []);

        return parent::getAdHeadline();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdText($adText)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdText', [$adText]);

        return parent::setAdText($adText);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdText', []);

        return parent::getAdText();
    }

    /**
     * {@inheritDoc}
     */
    public function setCallToAction($callToAction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCallToAction', [$callToAction]);

        return parent::setCallToAction($callToAction);
    }

    /**
     * {@inheritDoc}
     */
    public function getCallToAction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCallToAction', []);

        return parent::getCallToAction();
    }

    /**
     * {@inheritDoc}
     */
    public function setApproval($approval)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApproval', [$approval]);

        return parent::setApproval($approval);
    }

    /**
     * {@inheritDoc}
     */
    public function getApproval()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApproval', []);

        return parent::getApproval();
    }

    /**
     * {@inheritDoc}
     */
    public function setCTime($cTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCTime', [$cTime]);

        return parent::setCTime($cTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getCTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCTime', []);

        return parent::getCTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setProducts(\Entity\Email\EmailType $products = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProducts', [$products]);

        return parent::setProducts($products);
    }

    /**
     * {@inheritDoc}
     */
    public function getProducts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProducts', []);

        return parent::getProducts();
    }

}
