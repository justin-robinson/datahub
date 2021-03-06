<?php

namespace Entity\Proxy\__CG__\Entity\Datahub;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MarketMsaPmsaMap extends \Entity\Datahub\MarketMsaPmsaMap implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'market_id', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'sa_code', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'Markets', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'MsaPmsas'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'market_id', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'sa_code', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'Markets', '' . "\0" . 'Entity\\Datahub\\MarketMsaPmsaMap' . "\0" . 'MsaPmsas'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MarketMsaPmsaMap $proxy) {
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
    public function setSaCode($saCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSaCode', [$saCode]);

        return parent::setSaCode($saCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getSaCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSaCode', []);

        return parent::getSaCode();
    }

    /**
     * {@inheritDoc}
     */
    public function addMarket(\Entity\Datahub\Market $market)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMarket', [$market]);

        return parent::addMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMarket(\Entity\Datahub\Market $market)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMarket', [$market]);

        return parent::removeMarket($market);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarkets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarkets', []);

        return parent::getMarkets();
    }

    /**
     * {@inheritDoc}
     */
    public function addMsaPmsa(\Entity\Datahub\MsaPmsa $msaPmsa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMsaPmsa', [$msaPmsa]);

        return parent::addMsaPmsa($msaPmsa);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMsaPmsa(\Entity\Datahub\MsaPmsa $msaPmsa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMsaPmsa', [$msaPmsa]);

        return parent::removeMsaPmsa($msaPmsa);
    }

    /**
     * {@inheritDoc}
     */
    public function getMsaPmsas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMsaPmsas', []);

        return parent::getMsaPmsas();
    }

}
