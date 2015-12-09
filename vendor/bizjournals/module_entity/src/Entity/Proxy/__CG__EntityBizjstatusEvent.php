<?php

namespace Entity\Proxy\__CG__\Entity\Bizjstatus;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Event extends \Entity\Bizjstatus\Event implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'event_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'parent_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'grandparent_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'has_child', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'code_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'allow_syndication', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'is_resolved', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'title', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'details', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'created_by', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'updated_by', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'expires_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'ProductMap', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'Status');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'event_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'parent_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'grandparent_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'has_child', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'code_id', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'allow_syndication', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'is_resolved', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'title', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'details', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'created_by', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'updated_by', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'expires_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'ProductMap', '' . "\0" . 'Entity\\Bizjstatus\\Event' . "\0" . 'Status');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Event $proxy) {
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
    public function getEventId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEventId', array());

        return parent::getEventId();
    }

    /**
     * {@inheritDoc}
     */
    public function setParentId($parentId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParentId', array($parentId));

        return parent::setParentId($parentId);
    }

    /**
     * {@inheritDoc}
     */
    public function getParentId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParentId', array());

        return parent::getParentId();
    }

    /**
     * {@inheritDoc}
     */
    public function setGrandparentId($grandparentId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGrandparentId', array($grandparentId));

        return parent::setGrandparentId($grandparentId);
    }

    /**
     * {@inheritDoc}
     */
    public function getGrandparentId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGrandparentId', array());

        return parent::getGrandparentId();
    }

    /**
     * {@inheritDoc}
     */
    public function setHasChild($hasChild)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHasChild', array($hasChild));

        return parent::setHasChild($hasChild);
    }

    /**
     * {@inheritDoc}
     */
    public function getHasChild()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHasChild', array());

        return parent::getHasChild();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodeId($codeId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodeId', array($codeId));

        return parent::setCodeId($codeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodeId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodeId', array());

        return parent::getCodeId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAllowSyndication($allowSyndication)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAllowSyndication', array($allowSyndication));

        return parent::setAllowSyndication($allowSyndication);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllowSyndication()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllowSyndication', array());

        return parent::getAllowSyndication();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsResolved($isResolved)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsResolved', array($isResolved));

        return parent::setIsResolved($isResolved);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsResolved()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsResolved', array());

        return parent::getIsResolved();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setDetails($details)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDetails', array($details));

        return parent::setDetails($details);
    }

    /**
     * {@inheritDoc}
     */
    public function getDetails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDetails', array());

        return parent::getDetails();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy($createdBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedBy($updatedBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', array($updatedBy));

        return parent::setUpdatedBy($updatedBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedBy', array());

        return parent::getUpdatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setExpiresAt($expiresAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExpiresAt', array($expiresAt));

        return parent::setExpiresAt($expiresAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getExpiresAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExpiresAt', array());

        return parent::getExpiresAt();
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
    public function addProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProductMap', array($productMap));

        return parent::addProductMap($productMap);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProductMap(\Entity\Bizjstatus\ProductEventMap $productMap)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProductMap', array($productMap));

        return parent::removeProductMap($productMap);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductMap()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductMap', array());

        return parent::getProductMap();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(\Entity\Bizjstatus\StatusCode $status = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

}
