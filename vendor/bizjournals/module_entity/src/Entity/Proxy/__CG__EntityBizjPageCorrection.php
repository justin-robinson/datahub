<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PageCorrection extends \Entity\Bizj\PageCorrection implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'id', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'market_code', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'correction', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'is_daily', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'Page');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'id', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'page_id', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'market_code', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'correction', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'is_daily', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\PageCorrection' . "\0" . 'Page');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PageCorrection $proxy) {
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
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPageId($pageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageId', array($pageId));

        return parent::setPageId($pageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageId', array());

        return parent::getPageId();
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
    public function setCorrection($correction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCorrection', array($correction));

        return parent::setCorrection($correction);
    }

    /**
     * {@inheritDoc}
     */
    public function getCorrection()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCorrection', array());

        return parent::getCorrection();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsDaily($isDaily)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsDaily', array($isDaily));

        return parent::setIsDaily($isDaily);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsDaily()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsDaily', array());

        return parent::getIsDaily();
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
    public function setPage(\Entity\Bizj\Page $page = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPage', array($page));

        return parent::setPage($page);
    }

    /**
     * {@inheritDoc}
     */
    public function getPage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPage', array());

        return parent::getPage();
    }

}