<?php

namespace Entity\Proxy\__CG__\Entity\Datahub;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Company extends \Entity\Datahub\Company implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'hub_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'refinery_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'meroveus_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'generate_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'record_source', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'company_name', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'public_ticker', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'ticker_exchange', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'source_modified_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'address1', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'address2', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'city', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'state', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'postal_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'country', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'latitude', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'longitude', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'phone', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'website', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'is_active', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'sic_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'employee_count', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_revenue_volume_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_employee_count_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_employee_local_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_established_year_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_profile_blob_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'created_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'Contacts');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'hub_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'refinery_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'meroveus_id', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'generate_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'record_source', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'company_name', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'public_ticker', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'ticker_exchange', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'source_modified_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'address1', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'address2', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'city', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'state', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'postal_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'country', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'latitude', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'longitude', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'phone', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'website', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'is_active', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'sic_code', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'employee_count', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_revenue_volume_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_employee_count_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_employee_local_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_established_year_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'universal_profile_blob_static', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'created_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'deleted_at', '' . "\0" . 'Entity\\Datahub\\Company' . "\0" . 'Contacts');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Company $proxy) {
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
    public function getHubId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHubId', array());

        return parent::getHubId();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefineryId($refineryId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefineryId', array($refineryId));

        return parent::setRefineryId($refineryId);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefineryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefineryId', array());

        return parent::getRefineryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMeroveusId($meroveusId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMeroveusId', array($meroveusId));

        return parent::setMeroveusId($meroveusId);
    }

    /**
     * {@inheritDoc}
     */
    public function getMeroveusId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMeroveusId', array());

        return parent::getMeroveusId();
    }

    /**
     * {@inheritDoc}
     */
    public function setGenerateCode($generateCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGenerateCode', array($generateCode));

        return parent::setGenerateCode($generateCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getGenerateCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGenerateCode', array());

        return parent::getGenerateCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setRecordSource($recordSource)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRecordSource', array($recordSource));

        return parent::setRecordSource($recordSource);
    }

    /**
     * {@inheritDoc}
     */
    public function getRecordSource()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRecordSource', array());

        return parent::getRecordSource();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyName($companyName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyName', array($companyName));

        return parent::setCompanyName($companyName);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyName', array());

        return parent::getCompanyName();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublicTicker($publicTicker)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublicTicker', array($publicTicker));

        return parent::setPublicTicker($publicTicker);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublicTicker()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublicTicker', array());

        return parent::getPublicTicker();
    }

    /**
     * {@inheritDoc}
     */
    public function setTickerExchange($tickerExchange)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTickerExchange', array($tickerExchange));

        return parent::setTickerExchange($tickerExchange);
    }

    /**
     * {@inheritDoc}
     */
    public function getTickerExchange()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTickerExchange', array());

        return parent::getTickerExchange();
    }

    /**
     * {@inheritDoc}
     */
    public function setSourceModifiedAt($sourceModifiedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSourceModifiedAt', array($sourceModifiedAt));

        return parent::setSourceModifiedAt($sourceModifiedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getSourceModifiedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSourceModifiedAt', array());

        return parent::getSourceModifiedAt();
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
    public function setCity($city)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', array());

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', array($state));

        return parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', array());

        return parent::getState();
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
    public function setLatitude($latitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', array($latitude));

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', array());

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', array($longitude));

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', array());

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setWebsite($website)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWebsite', array($website));

        return parent::setWebsite($website);
    }

    /**
     * {@inheritDoc}
     */
    public function getWebsite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebsite', array());

        return parent::getWebsite();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', array($isActive));

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', array());

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setSicCode($sicCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSicCode', array($sicCode));

        return parent::setSicCode($sicCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getSicCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSicCode', array());

        return parent::getSicCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmployeeCount($employeeCount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmployeeCount', array($employeeCount));

        return parent::setEmployeeCount($employeeCount);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmployeeCount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmployeeCount', array());

        return parent::getEmployeeCount();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniversalRevenueVolumeStatic($universalRevenueVolumeStatic)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniversalRevenueVolumeStatic', array($universalRevenueVolumeStatic));

        return parent::setUniversalRevenueVolumeStatic($universalRevenueVolumeStatic);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniversalRevenueVolumeStatic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniversalRevenueVolumeStatic', array());

        return parent::getUniversalRevenueVolumeStatic();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniversalEmployeeCountStatic($universalEmployeeCountStatic)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniversalEmployeeCountStatic', array($universalEmployeeCountStatic));

        return parent::setUniversalEmployeeCountStatic($universalEmployeeCountStatic);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniversalEmployeeCountStatic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniversalEmployeeCountStatic', array());

        return parent::getUniversalEmployeeCountStatic();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniversalEmployeeLocalStatic($universalEmployeeLocalStatic)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniversalEmployeeLocalStatic', array($universalEmployeeLocalStatic));

        return parent::setUniversalEmployeeLocalStatic($universalEmployeeLocalStatic);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniversalEmployeeLocalStatic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniversalEmployeeLocalStatic', array());

        return parent::getUniversalEmployeeLocalStatic();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniversalEstablishedYearStatic($universalEstablishedYearStatic)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniversalEstablishedYearStatic', array($universalEstablishedYearStatic));

        return parent::setUniversalEstablishedYearStatic($universalEstablishedYearStatic);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniversalEstablishedYearStatic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniversalEstablishedYearStatic', array());

        return parent::getUniversalEstablishedYearStatic();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniversalProfileBlobStatic($universalProfileBlobStatic)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniversalProfileBlobStatic', array($universalProfileBlobStatic));

        return parent::setUniversalProfileBlobStatic($universalProfileBlobStatic);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniversalProfileBlobStatic()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniversalProfileBlobStatic', array());

        return parent::getUniversalProfileBlobStatic();
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
    public function setDeletedAt($deletedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', array($deletedAt));

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', array());

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function addContact(\Entity\Datahub\Contact $contact)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addContact', array($contact));

        return parent::addContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function removeContact(\Entity\Datahub\Contact $contact)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeContact', array($contact));

        return parent::removeContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function getContacts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContacts', array());

        return parent::getContacts();
    }

}
