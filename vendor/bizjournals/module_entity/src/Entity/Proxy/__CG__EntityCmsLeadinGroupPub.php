<?php

namespace Entity\Proxy\__CG__\Entity\Cms;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class LeadinGroupPub extends \Entity\Cms\LeadinGroupPub implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'group_id', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'pub_id', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'LeadinGroup', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'Publication'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'group_id', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'pub_id', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'LeadinGroup', '' . "\0" . 'Entity\\Cms\\LeadinGroupPub' . "\0" . 'Publication'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (LeadinGroupPub $proxy) {
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
    public function setGroupId($groupId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGroupId', [$groupId]);

        return parent::setGroupId($groupId);
    }

    /**
     * {@inheritDoc}
     */
    public function getGroupId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGroupId', []);

        return parent::getGroupId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPubId($pubId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPubId', [$pubId]);

        return parent::setPubId($pubId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPubId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPubId', []);

        return parent::getPubId();
    }

    /**
     * {@inheritDoc}
     */
    public function setLeadinGroup(\Entity\Cms\LeadinGroup $leadinGroup = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLeadinGroup', [$leadinGroup]);

        return parent::setLeadinGroup($leadinGroup);
    }

    /**
     * {@inheritDoc}
     */
    public function getLeadinGroup()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLeadinGroup', []);

        return parent::getLeadinGroup();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublication(\Entity\Cms\Publication $publication = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublication', [$publication]);

        return parent::setPublication($publication);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublication()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublication', []);

        return parent::getPublication();
    }

}
