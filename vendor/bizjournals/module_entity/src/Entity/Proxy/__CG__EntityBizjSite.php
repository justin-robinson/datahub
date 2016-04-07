<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Site extends \Entity\Bizj\Site implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_id', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_host', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_name', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'product_name', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'Sections'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_id', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_host', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'site_name', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'product_name', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\Site' . "\0" . 'Sections'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Site $proxy) {
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
    public function getSiteId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteId', []);

        return parent::getSiteId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteHost($siteHost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiteHost', [$siteHost]);

        return parent::setSiteHost($siteHost);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteHost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteHost', []);

        return parent::getSiteHost();
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteName($siteName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiteName', [$siteName]);

        return parent::setSiteName($siteName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteName', []);

        return parent::getSiteName();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductName($productName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductName', [$productName]);

        return parent::setProductName($productName);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductName', []);

        return parent::getProductName();
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
    public function addSection(\Entity\Bizj\SiteSection $section)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSection', [$section]);

        return parent::addSection($section);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSection(\Entity\Bizj\SiteSection $section)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSection', [$section]);

        return parent::removeSection($section);
    }

    /**
     * {@inheritDoc}
     */
    public function getSections()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSections', []);

        return parent::getSections();
    }

}
