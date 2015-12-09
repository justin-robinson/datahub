<?php

namespace Entity\Proxy\__CG__\Entity\Cms;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class AuditLog extends \Entity\Cms\AuditLog implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'id', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'content_id', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'version', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'action', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'detail', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'updated_by', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'created_at', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'Content', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'ContentVersion');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'id', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'content_id', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'version', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'action', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'detail', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'updated_by', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'created_at', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'Content', '' . "\0" . 'Entity\\Cms\\AuditLog' . "\0" . 'ContentVersion');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (AuditLog $proxy) {
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
    public function setContentId($contentId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContentId', array($contentId));

        return parent::setContentId($contentId);
    }

    /**
     * {@inheritDoc}
     */
    public function getContentId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContentId', array());

        return parent::getContentId();
    }

    /**
     * {@inheritDoc}
     */
    public function setVersion($version)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVersion', array($version));

        return parent::setVersion($version);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVersion', array());

        return parent::getVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setAction($action)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAction', array($action));

        return parent::setAction($action);
    }

    /**
     * {@inheritDoc}
     */
    public function getAction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAction', array());

        return parent::getAction();
    }

    /**
     * {@inheritDoc}
     */
    public function setDetail($detail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDetail', array($detail));

        return parent::setDetail($detail);
    }

    /**
     * {@inheritDoc}
     */
    public function getDetail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDetail', array());

        return parent::getDetail();
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
    public function setContent(\Entity\Cms\Content $content = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContent', array($content));

        return parent::setContent($content);
    }

    /**
     * {@inheritDoc}
     */
    public function getContent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContent', array());

        return parent::getContent();
    }

    /**
     * {@inheritDoc}
     */
    public function setContentVersion(\Entity\Cms\ContentVersion $contentVersion = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContentVersion', array($contentVersion));

        return parent::setContentVersion($contentVersion);
    }

    /**
     * {@inheritDoc}
     */
    public function getContentVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContentVersion', array());

        return parent::getContentVersion();
    }

}
