<?php

namespace Entity\Proxy\__CG__\Entity\Datahub;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UsState extends \Entity\Datahub\UsState implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_long', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_postal', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_ap_style', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'is_active', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'ord'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_long', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_postal', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'state_ap_style', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'is_active', '' . "\0" . 'Entity\\Datahub\\UsState' . "\0" . 'ord'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UsState $proxy) {
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
    public function setStateLong($stateLong)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStateLong', [$stateLong]);

        return parent::setStateLong($stateLong);
    }

    /**
     * {@inheritDoc}
     */
    public function getStateLong()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStateLong', []);

        return parent::getStateLong();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatePostal($statePostal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatePostal', [$statePostal]);

        return parent::setStatePostal($statePostal);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatePostal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatePostal', []);

        return parent::getStatePostal();
    }

    /**
     * {@inheritDoc}
     */
    public function setStateApStyle($stateApStyle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStateApStyle', [$stateApStyle]);

        return parent::setStateApStyle($stateApStyle);
    }

    /**
     * {@inheritDoc}
     */
    public function getStateApStyle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStateApStyle', []);

        return parent::getStateApStyle();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrd($ord)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrd', [$ord]);

        return parent::setOrd($ord);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrd()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrd', []);

        return parent::getOrd();
    }

}
