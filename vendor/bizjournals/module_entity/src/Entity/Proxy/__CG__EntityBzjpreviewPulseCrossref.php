<?php

namespace Entity\Proxy\__CG__\Entity\Bzjpreview;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PulseCrossref extends \Entity\Bzjpreview\PulseCrossref implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_type', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_key', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_value', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_weight', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'Pulse'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'pulse_id', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_type', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_key', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_value', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'ref_weight', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Bzjpreview\\PulseCrossref' . "\0" . 'Pulse'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PulseCrossref $proxy) {
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
    public function getRefId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefId', []);

        return parent::getRefId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPulseId($pulseId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPulseId', [$pulseId]);

        return parent::setPulseId($pulseId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulseId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulseId', []);

        return parent::getPulseId();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefType($refType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefType', [$refType]);

        return parent::setRefType($refType);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefType', []);

        return parent::getRefType();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefKey($refKey)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefKey', [$refKey]);

        return parent::setRefKey($refKey);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefKey', []);

        return parent::getRefKey();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefValue($refValue)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefValue', [$refValue]);

        return parent::setRefValue($refValue);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefValue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefValue', []);

        return parent::getRefValue();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefWeight($refWeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefWeight', [$refWeight]);

        return parent::setRefWeight($refWeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefWeight', []);

        return parent::getRefWeight();
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
    public function setDeletedAt($deletedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deletedAt]);

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setPulse(\Entity\Bzjpreview\Pulse $pulse = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPulse', [$pulse]);

        return parent::setPulse($pulse);
    }

    /**
     * {@inheritDoc}
     */
    public function getPulse()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPulse', []);

        return parent::getPulse();
    }

}
