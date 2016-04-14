<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MarketStaff extends \Entity\Bizj\MarketStaff implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'staff_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'market_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'contact_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_writer', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_former_staff', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_contributor', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'Market', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'ContactData'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'staff_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'market_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'contact_id', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_writer', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_former_staff', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'is_contributor', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'Market', '' . "\0" . 'Entity\\Bizj\\MarketStaff' . "\0" . 'ContactData'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MarketStaff $proxy) {
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
    public function getStaffId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStaffId', []);

        return parent::getStaffId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarketId($marketId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarketId', [$marketId]);

        return parent::setMarketId($marketId);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarketId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarketId', []);

        return parent::getMarketId();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactId($contactId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactId', [$contactId]);

        return parent::setContactId($contactId);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactId', []);

        return parent::getContactId();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsWriter($isWriter)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsWriter', [$isWriter]);

        return parent::setIsWriter($isWriter);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsWriter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsWriter', []);

        return parent::getIsWriter();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsFormerStaff($isFormerStaff)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsFormerStaff', [$isFormerStaff]);

        return parent::setIsFormerStaff($isFormerStaff);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsFormerStaff()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsFormerStaff', []);

        return parent::getIsFormerStaff();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsContributor($isContributor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsContributor', [$isContributor]);

        return parent::setIsContributor($isContributor);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsContributor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsContributor', []);

        return parent::getIsContributor();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarket(\Entity\Bizj\Market $market = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarket', [$market]);

        return parent::setMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarket', []);

        return parent::getMarket();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactData(\Entity\Bizj\ContactData $contactData = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactData', [$contactData]);

        return parent::setContactData($contactData);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactData', []);

        return parent::getContactData();
    }

}
