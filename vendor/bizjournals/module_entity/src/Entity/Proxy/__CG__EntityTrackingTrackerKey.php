<?php

namespace Entity\Proxy\__CG__\Entity\Tracking;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TrackerKey extends \Entity\Tracking\TrackerKey implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_key_id', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_key', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'client_id', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_type', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_subtype', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'url', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'campaign_ref', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_properties', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'is_active', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'created_at', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'updated_at');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_key_id', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_key', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'client_id', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_type', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_subtype', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'url', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'campaign_ref', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'tracker_properties', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'is_active', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'created_at', '' . "\0" . 'Entity\\Tracking\\TrackerKey' . "\0" . 'updated_at');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TrackerKey $proxy) {
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
    public function getTrackerKeyId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackerKeyId', array());

        return parent::getTrackerKeyId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackerKey($trackerKey)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackerKey', array($trackerKey));

        return parent::setTrackerKey($trackerKey);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackerKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackerKey', array());

        return parent::getTrackerKey();
    }

    /**
     * {@inheritDoc}
     */
    public function setClientId($clientId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClientId', array($clientId));

        return parent::setClientId($clientId);
    }

    /**
     * {@inheritDoc}
     */
    public function getClientId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClientId', array());

        return parent::getClientId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackerType($trackerType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackerType', array($trackerType));

        return parent::setTrackerType($trackerType);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackerType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackerType', array());

        return parent::getTrackerType();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackerSubtype($trackerSubtype)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackerSubtype', array($trackerSubtype));

        return parent::setTrackerSubtype($trackerSubtype);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackerSubtype()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackerSubtype', array());

        return parent::getTrackerSubtype();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl($url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrl', array($url));

        return parent::setUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrl', array());

        return parent::getUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setCampaignRef($campaignRef)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCampaignRef', array($campaignRef));

        return parent::setCampaignRef($campaignRef);
    }

    /**
     * {@inheritDoc}
     */
    public function getCampaignRef()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCampaignRef', array());

        return parent::getCampaignRef();
    }

    /**
     * {@inheritDoc}
     */
    public function setTrackerProperties($trackerProperties)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrackerProperties', array($trackerProperties));

        return parent::setTrackerProperties($trackerProperties);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrackerProperties()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackerProperties', array());

        return parent::getTrackerProperties();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', array($isActive));

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', array());

        return parent::getIsActive();
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
