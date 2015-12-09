<?php

namespace Entity\Proxy\__CG__\Entity\Bizj;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ContactData extends \Entity\Bizj\ContactData implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'backlink_class', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'backlink_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_name', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_title', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_description', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'community', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'state_province', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'country', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'postal_code', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'headshot_media_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'photo_headshot_url', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'photo_social_url', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_subtype', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'Staff');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'backlink_class', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'backlink_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_name', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_title', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_description', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'address3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'community', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'state_province', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'country', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'postal_code', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'phone3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'email3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social1_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social2_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3_type', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'social3_notes', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'headshot_media_id', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'photo_headshot_url', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'photo_social_url', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'contact_subtype', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'created_at', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Bizj\\ContactData' . "\0" . 'Staff');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ContactData $proxy) {
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
    public function getContactId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactId', array());

        return parent::getContactId();
    }

    /**
     * {@inheritDoc}
     */
    public function setBacklinkClass($backlinkClass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBacklinkClass', array($backlinkClass));

        return parent::setBacklinkClass($backlinkClass);
    }

    /**
     * {@inheritDoc}
     */
    public function getBacklinkClass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBacklinkClass', array());

        return parent::getBacklinkClass();
    }

    /**
     * {@inheritDoc}
     */
    public function setBacklinkId($backlinkId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBacklinkId', array($backlinkId));

        return parent::setBacklinkId($backlinkId);
    }

    /**
     * {@inheritDoc}
     */
    public function getBacklinkId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBacklinkId', array());

        return parent::getBacklinkId();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactType($contactType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactType', array($contactType));

        return parent::setContactType($contactType);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactType', array());

        return parent::getContactType();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactName($contactName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactName', array($contactName));

        return parent::setContactName($contactName);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactName', array());

        return parent::getContactName();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactTitle($contactTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactTitle', array($contactTitle));

        return parent::setContactTitle($contactTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactTitle', array());

        return parent::getContactTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactDescription($contactDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactDescription', array($contactDescription));

        return parent::setContactDescription($contactDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactDescription', array());

        return parent::getContactDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress1($address1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress1', array($address1));

        return parent::setAddress1($address1);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress1', array());

        return parent::getAddress1();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress2($address2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress2', array($address2));

        return parent::setAddress2($address2);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress2', array());

        return parent::getAddress2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress3($address3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress3', array($address3));

        return parent::setAddress3($address3);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress3', array());

        return parent::getAddress3();
    }

    /**
     * {@inheritDoc}
     */
    public function setCommunity($community)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommunity', array($community));

        return parent::setCommunity($community);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommunity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommunity', array());

        return parent::getCommunity();
    }

    /**
     * {@inheritDoc}
     */
    public function setStateProvince($stateProvince)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStateProvince', array($stateProvince));

        return parent::setStateProvince($stateProvince);
    }

    /**
     * {@inheritDoc}
     */
    public function getStateProvince()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStateProvince', array());

        return parent::getStateProvince();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry($country)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', array($country));

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', array());

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostalCode($postalCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostalCode', array($postalCode));

        return parent::setPostalCode($postalCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostalCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostalCode', array());

        return parent::getPostalCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone1($phone1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone1', array($phone1));

        return parent::setPhone1($phone1);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone1', array());

        return parent::getPhone1();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone1Type($phone1Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone1Type', array($phone1Type));

        return parent::setPhone1Type($phone1Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone1Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone1Type', array());

        return parent::getPhone1Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone1Notes($phone1Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone1Notes', array($phone1Notes));

        return parent::setPhone1Notes($phone1Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone1Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone1Notes', array());

        return parent::getPhone1Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone2($phone2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone2', array($phone2));

        return parent::setPhone2($phone2);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone2', array());

        return parent::getPhone2();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone2Type($phone2Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone2Type', array($phone2Type));

        return parent::setPhone2Type($phone2Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone2Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone2Type', array());

        return parent::getPhone2Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone2Notes($phone2Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone2Notes', array($phone2Notes));

        return parent::setPhone2Notes($phone2Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone2Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone2Notes', array());

        return parent::getPhone2Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone3($phone3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone3', array($phone3));

        return parent::setPhone3($phone3);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone3', array());

        return parent::getPhone3();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone3Type($phone3Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone3Type', array($phone3Type));

        return parent::setPhone3Type($phone3Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone3Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone3Type', array());

        return parent::getPhone3Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone3Notes($phone3Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone3Notes', array($phone3Notes));

        return parent::setPhone3Notes($phone3Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone3Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone3Notes', array());

        return parent::getPhone3Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail1($email1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail1', array($email1));

        return parent::setEmail1($email1);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail1', array());

        return parent::getEmail1();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail1Notes($email1Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail1Notes', array($email1Notes));

        return parent::setEmail1Notes($email1Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail1Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail1Notes', array());

        return parent::getEmail1Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail2($email2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail2', array($email2));

        return parent::setEmail2($email2);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail2', array());

        return parent::getEmail2();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail2Notes($email2Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail2Notes', array($email2Notes));

        return parent::setEmail2Notes($email2Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail2Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail2Notes', array());

        return parent::getEmail2Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail3($email3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail3', array($email3));

        return parent::setEmail3($email3);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail3', array());

        return parent::getEmail3();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail3Notes($email3Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail3Notes', array($email3Notes));

        return parent::setEmail3Notes($email3Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail3Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail3Notes', array());

        return parent::getEmail3Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial1($social1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial1', array($social1));

        return parent::setSocial1($social1);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial1', array());

        return parent::getSocial1();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial1Type($social1Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial1Type', array($social1Type));

        return parent::setSocial1Type($social1Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial1Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial1Type', array());

        return parent::getSocial1Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial1Notes($social1Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial1Notes', array($social1Notes));

        return parent::setSocial1Notes($social1Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial1Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial1Notes', array());

        return parent::getSocial1Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial2($social2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial2', array($social2));

        return parent::setSocial2($social2);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial2', array());

        return parent::getSocial2();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial2Type($social2Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial2Type', array($social2Type));

        return parent::setSocial2Type($social2Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial2Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial2Type', array());

        return parent::getSocial2Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial2Notes($social2Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial2Notes', array($social2Notes));

        return parent::setSocial2Notes($social2Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial2Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial2Notes', array());

        return parent::getSocial2Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial3($social3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial3', array($social3));

        return parent::setSocial3($social3);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial3', array());

        return parent::getSocial3();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial3Type($social3Type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial3Type', array($social3Type));

        return parent::setSocial3Type($social3Type);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial3Type()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial3Type', array());

        return parent::getSocial3Type();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocial3Notes($social3Notes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocial3Notes', array($social3Notes));

        return parent::setSocial3Notes($social3Notes);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocial3Notes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocial3Notes', array());

        return parent::getSocial3Notes();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeadshotMediaId($headshotMediaId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeadshotMediaId', array($headshotMediaId));

        return parent::setHeadshotMediaId($headshotMediaId);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeadshotMediaId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeadshotMediaId', array());

        return parent::getHeadshotMediaId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhotoHeadshotUrl($photoHeadshotUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhotoHeadshotUrl', array($photoHeadshotUrl));

        return parent::setPhotoHeadshotUrl($photoHeadshotUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhotoHeadshotUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhotoHeadshotUrl', array());

        return parent::getPhotoHeadshotUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhotoSocialUrl($photoSocialUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhotoSocialUrl', array($photoSocialUrl));

        return parent::setPhotoSocialUrl($photoSocialUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhotoSocialUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhotoSocialUrl', array());

        return parent::getPhotoSocialUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactSubtype($contactSubtype)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactSubtype', array($contactSubtype));

        return parent::setContactSubtype($contactSubtype);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactSubtype()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactSubtype', array());

        return parent::getContactSubtype();
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
    public function addStaff(\Entity\Bizj\MarketStaff $staff)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStaff', array($staff));

        return parent::addStaff($staff);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStaff(\Entity\Bizj\MarketStaff $staff)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStaff', array($staff));

        return parent::removeStaff($staff);
    }

    /**
     * {@inheritDoc}
     */
    public function getStaff()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStaff', array());

        return parent::getStaff();
    }

}
