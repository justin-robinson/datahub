<?php

namespace Entity\Proxy\__CG__\Entity\Email;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Subscriptions extends \Entity\Email\Subscriptions implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'subscription_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'user_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'uin', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'email', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'first_name', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'last_name', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'source_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'is_active', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'created_at', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'updated_at'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'subscription_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'product_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'user_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'uin', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'email', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'first_name', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'last_name', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'source_id', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'is_active', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'created_at', '' . "\0" . 'Entity\\Email\\Subscriptions' . "\0" . 'updated_at'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Subscriptions $proxy) {
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
    public function getSubscriptionId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubscriptionId', []);

        return parent::getSubscriptionId();
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
    public function setUserId($userId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserId', [$userId]);

        return parent::setUserId($userId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserId', []);

        return parent::getUserId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUin($uin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUin', [$uin]);

        return parent::setUin($uin);
    }

    /**
     * {@inheritDoc}
     */
    public function getUin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUin', []);

        return parent::getUin();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', [$firstName]);

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', []);

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', [$lastName]);

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', []);

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSourceId($sourceId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSourceId', [$sourceId]);

        return parent::setSourceId($sourceId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSourceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSourceId', []);

        return parent::getSourceId();
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

}
