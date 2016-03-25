<?php

namespace Entity\Proxy\__CG__\Entity\Email;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ClickTrack extends \Entity\Email\ClickTrack implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'track_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'click_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'job_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'user_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'remote_ip', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'created_at');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'track_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'click_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'job_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'user_id', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'remote_ip', '' . "\0" . 'Entity\\Email\\ClickTrack' . "\0" . 'created_at');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ClickTrack $proxy) {
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
    public function getTrackId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrackId', array());

        return parent::getTrackId();
    }

    /**
     * {@inheritDoc}
     */
    public function setClickId($clickId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClickId', array($clickId));

        return parent::setClickId($clickId);
    }

    /**
     * {@inheritDoc}
     */
    public function getClickId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClickId', array());

        return parent::getClickId();
    }

    /**
     * {@inheritDoc}
     */
    public function setJobId($jobId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJobId', array($jobId));

        return parent::setJobId($jobId);
    }

    /**
     * {@inheritDoc}
     */
    public function getJobId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJobId', array());

        return parent::getJobId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserId($userId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserId', array($userId));

        return parent::setUserId($userId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserId', array());

        return parent::getUserId();
    }

    /**
     * {@inheritDoc}
     */
    public function setRemoteIp($remoteIp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRemoteIp', array($remoteIp));

        return parent::setRemoteIp($remoteIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemoteIp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemoteIp', array());

        return parent::getRemoteIp();
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

}
