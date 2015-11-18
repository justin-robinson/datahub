<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Market extends \Entity\Bizj\Market implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_id', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_code', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_name', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_abbrev', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'city', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'state', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'region', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'region_objective', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'local_sales_tax', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'primary_zip_code', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'center_latitude', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'center_longitude', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'timezone', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'utc_std_offset', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'utc_dst_offset', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'payment_contact_id', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'Journals', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'Pulses', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'PulseMarkets');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_id', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_code', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_name', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'market_abbrev', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'city', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'state', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'region', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'region_objective', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'local_sales_tax', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'primary_zip_code', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'center_latitude', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'center_longitude', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'timezone', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'utc_std_offset', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'utc_dst_offset', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'payment_contact_id', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'Journals', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'Pulses', '' . "\0" . 'Entity\\Bizj\\Market' . "\0" . 'PulseMarkets');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Market $proxy) {
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
    public function getMarketId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarketId', array());

        return parent::getMarketId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarketCode($marketCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarketCode', array($marketCode));

        return parent::setMarketCode($marketCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarketCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarketCode', array());

        return parent::getMarketCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarketName($marketName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarketName', array($marketName));

        return parent::setMarketName($marketName);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarketName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarketName', array());

        return parent::getMarketName();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarketAbbrev($marketAbbrev)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarketAbbrev', array($marketAbbrev));

        return parent::setMarketAbbrev($marketAbbrev);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarketAbbrev()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarketAbbrev', array());

        return parent::getMarketAbbrev();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity($city)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', array());

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', array($state));

        return parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', array());

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegion($region)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegion', array($region));

        return parent::setRegion($region);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegion', array());

        return parent::getRegion();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegionObjective($regionObjective)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegionObjective', array($regionObjective));

        return parent::setRegionObjective($regionObjective);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionObjective()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegionObjective', array());

        return parent::getRegionObjective();
    }

    /**
     * {@inheritDoc}
     */
    public function setLocalSalesTax($localSalesTax)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocalSalesTax', array($localSalesTax));

        return parent::setLocalSalesTax($localSalesTax);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocalSalesTax()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocalSalesTax', array());

        return parent::getLocalSalesTax();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrimaryZipCode($primaryZipCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrimaryZipCode', array($primaryZipCode));

        return parent::setPrimaryZipCode($primaryZipCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrimaryZipCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrimaryZipCode', array());

        return parent::getPrimaryZipCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setCenterLatitude($centerLatitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCenterLatitude', array($centerLatitude));

        return parent::setCenterLatitude($centerLatitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getCenterLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCenterLatitude', array());

        return parent::getCenterLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setCenterLongitude($centerLongitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCenterLongitude', array($centerLongitude));

        return parent::setCenterLongitude($centerLongitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getCenterLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCenterLongitude', array());

        return parent::getCenterLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setTimezone($timezone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTimezone', array($timezone));

        return parent::setTimezone($timezone);
    }

    /**
     * {@inheritDoc}
     */
    public function getTimezone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTimezone', array());

        return parent::getTimezone();
    }

    /**
     * {@inheritDoc}
     */
    public function setUtcStdOffset($utcStdOffset)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUtcStdOffset', array($utcStdOffset));

        return parent::setUtcStdOffset($utcStdOffset);
    }

    /**
     * {@inheritDoc}
     */
    public function getUtcStdOffset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUtcStdOffset', array());

        return parent::getUtcStdOffset();
    }

    /**
     * {@inheritDoc}
     */
    public function setUtcDstOffset($utcDstOffset)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUtcDstOffset', array($utcDstOffset));

        return parent::setUtcDstOffset($utcDstOffset);
    }

    /**
     * {@inheritDoc}
     */
    public function getUtcDstOffset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUtcDstOffset', array());

        return parent::getUtcDstOffset();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaymentContactId($paymentContactId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaymentContactId', array($paymentContactId));

        return parent::setPaymentContactId($paymentContactId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentContactId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaymentContactId', array());

        return parent::getPaymentContactId();
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

    /**
     * {@inheritDoc}
     */
    public function addJournal(\Entity\Bizj\Journal $journals)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addJournal', array($journals));

        return parent::addJournal($journals);
    }

    /**
     * {@inheritDoc}
     */
    public function removeJournal(\Entity\Bizj\Journal $journals)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeJournal', array($journals));

        return parent::removeJournal($journals);
    }

    /**
     * {@inheritDoc}
     */
    public function getJournals()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJournals', array());

        return parent::getJournals();
    }

    /**
     * {@inheritDoc}
     */
    public function addPulse(\Entity\Bizj\Pulse $pulses)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPulse', array($pulses));

        return parent::addPulse($pulses);
    }

    /**
     * {@inheritDoc}
     */
    public function removePulse(\Entity\Bizj\Pulse $pulses)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePulse', array($pulses));

        return parent::removePulse($pulses);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulses()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulses', array());

        return parent::getPulses();
    }

    /**
     * {@inheritDoc}
     */
    public function addPulseMarket(\Entity\Bizj\PulseMarketMap $pulseMarkets)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPulseMarket', array($pulseMarkets));

        return parent::addPulseMarket($pulseMarkets);
    }

    /**
     * {@inheritDoc}
     */
    public function removePulseMarket(\Entity\Bizj\PulseMarketMap $pulseMarkets)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePulseMarket', array($pulseMarkets));

        return parent::removePulseMarket($pulseMarkets);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulseMarkets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulseMarkets', array());

        return parent::getPulseMarkets();
    }

}
