<?php

namespace Entity\Proxy\__CG__\Entity\Admin;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class AclRolePrivilege extends \Entity\Admin\AclRolePrivilege implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_role_privilege_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_role_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_resource_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'privilege', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'mode', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'created_at', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'AclRole', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'AclResource');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_role_privilege_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_role_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'acl_resource_id', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'privilege', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'mode', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'created_at', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'AclRole', '' . "\0" . 'Entity\\Admin\\AclRolePrivilege' . "\0" . 'AclResource');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (AclRolePrivilege $proxy) {
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
    public function getAclRolePrivilegeId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAclRolePrivilegeId', array());

        return parent::getAclRolePrivilegeId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAclRoleId($aclRoleId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAclRoleId', array($aclRoleId));

        return parent::setAclRoleId($aclRoleId);
    }

    /**
     * {@inheritDoc}
     */
    public function getAclRoleId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAclRoleId', array());

        return parent::getAclRoleId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAclResourceId($aclResourceId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAclResourceId', array($aclResourceId));

        return parent::setAclResourceId($aclResourceId);
    }

    /**
     * {@inheritDoc}
     */
    public function getAclResourceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAclResourceId', array());

        return parent::getAclResourceId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrivilege($privilege)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrivilege', array($privilege));

        return parent::setPrivilege($privilege);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrivilege()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrivilege', array());

        return parent::getPrivilege();
    }

    /**
     * {@inheritDoc}
     */
    public function setMode($mode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMode', array($mode));

        return parent::setMode($mode);
    }

    /**
     * {@inheritDoc}
     */
    public function getMode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMode', array());

        return parent::getMode();
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
    public function setAclRole(\Entity\Admin\AclRole $aclRole = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAclRole', array($aclRole));

        return parent::setAclRole($aclRole);
    }

    /**
     * {@inheritDoc}
     */
    public function getAclRole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAclRole', array());

        return parent::getAclRole();
    }

    /**
     * {@inheritDoc}
     */
    public function setAclResource(\Entity\Admin\AclResource $aclResource = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAclResource', array($aclResource));

        return parent::setAclResource($aclResource);
    }

    /**
     * {@inheritDoc}
     */
    public function getAclResource()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAclResource', array());

        return parent::getAclResource();
    }

}
