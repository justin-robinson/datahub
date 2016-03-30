<?php

namespace Entity\Datahub;

/**
 * Company
 */
class Company extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $hub_id;

    /**
     * @var integer
     */
    private $refinery_id;

    /**
     * @var integer
     */
    private $meroveus_id;

    /**
     * @var string
     */
    private $generate_code;

    /**
     * @var string
     */
    private $record_source;

    /**
     * @var string
     */
    private $company_name;

    /**
     * @var string
     */
    private $public_ticker;

    /**
     * @var string
     */
    private $ticker_exchange;

    /**
     * @var \DateTime
     */
    private $source_modified_at;

    /**
     * @var string
     */
    private $address1;

    /**
     * @var string
     */
    private $address2;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $website;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var string
     */
    private $sic_code;

    /**
     * @var integer
     */
    private $employee_count;

    /**
     * @var string
     */
    private $universal_revenue_volume_static;

    /**
     * @var string
     */
    private $universal_employee_count_static;

    /**
     * @var string
     */
    private $universal_employee_local_static;

    /**
     * @var string
     */
    private $universal_established_year_static;

    /**
     * @var string
     */
    private $universal_profile_blob_static;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Contacts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $CompanyMeroveusIndustries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->CompanyMeroveusIndustries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get hubId
     *
     * @return integer
     */
    public function getHubId()
    {
        return $this->hub_id;
    }

    /**
     * Set refineryId
     *
     * @param integer $refineryId
     *
     * @return Company
     */
    public function setRefineryId($refineryId)
    {
        $this->refinery_id = $refineryId;

        return $this;
    }

    /**
     * Get refineryId
     *
     * @return integer
     */
    public function getRefineryId()
    {
        return $this->refinery_id;
    }

    /**
     * Set meroveusId
     *
     * @param integer $meroveusId
     *
     * @return Company
     */
    public function setMeroveusId($meroveusId)
    {
        $this->meroveus_id = $meroveusId;

        return $this;
    }

    /**
     * Get meroveusId
     *
     * @return integer
     */
    public function getMeroveusId()
    {
        return $this->meroveus_id;
    }

    /**
     * Set generateCode
     *
     * @param string $generateCode
     *
     * @return Company
     */
    public function setGenerateCode($generateCode)
    {
        $this->generate_code = $generateCode;

        return $this;
    }

    /**
     * Get generateCode
     *
     * @return string
     */
    public function getGenerateCode()
    {
        return $this->generate_code;
    }

    /**
     * Set recordSource
     *
     * @param string $recordSource
     *
     * @return Company
     */
    public function setRecordSource($recordSource)
    {
        $this->record_source = $recordSource;

        return $this;
    }

    /**
     * Get recordSource
     *
     * @return string
     */
    public function getRecordSource()
    {
        return $this->record_source;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Company
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set publicTicker
     *
     * @param string $publicTicker
     *
     * @return Company
     */
    public function setPublicTicker($publicTicker)
    {
        $this->public_ticker = $publicTicker;

        return $this;
    }

    /**
     * Get publicTicker
     *
     * @return string
     */
    public function getPublicTicker()
    {
        return $this->public_ticker;
    }

    /**
     * Set tickerExchange
     *
     * @param string $tickerExchange
     *
     * @return Company
     */
    public function setTickerExchange($tickerExchange)
    {
        $this->ticker_exchange = $tickerExchange;

        return $this;
    }

    /**
     * Get tickerExchange
     *
     * @return string
     */
    public function getTickerExchange()
    {
        return $this->ticker_exchange;
    }

    /**
     * Set sourceModifiedAt
     *
     * @param \DateTime $sourceModifiedAt
     *
     * @return Company
     */
    public function setSourceModifiedAt($sourceModifiedAt)
    {
        $this->source_modified_at = $sourceModifiedAt;

        return $this;
    }

    /**
     * Get sourceModifiedAt
     *
     * @return \DateTime
     */
    public function getSourceModifiedAt()
    {
        return $this->source_modified_at;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Company
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Company
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Company
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Company
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Company
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Company
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Company
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Company
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set sicCode
     *
     * @param string $sicCode
     *
     * @return Company
     */
    public function setSicCode($sicCode)
    {
        $this->sic_code = $sicCode;

        return $this;
    }

    /**
     * Get sicCode
     *
     * @return string
     */
    public function getSicCode()
    {
        return $this->sic_code;
    }

    /**
     * Set employeeCount
     *
     * @param integer $employeeCount
     *
     * @return Company
     */
    public function setEmployeeCount($employeeCount)
    {
        $this->employee_count = $employeeCount;

        return $this;
    }

    /**
     * Get employeeCount
     *
     * @return integer
     */
    public function getEmployeeCount()
    {
        return $this->employee_count;
    }

    /**
     * Set universalRevenueVolumeStatic
     *
     * @param string $universalRevenueVolumeStatic
     *
     * @return Company
     */
    public function setUniversalRevenueVolumeStatic($universalRevenueVolumeStatic)
    {
        $this->universal_revenue_volume_static = $universalRevenueVolumeStatic;

        return $this;
    }

    /**
     * Get universalRevenueVolumeStatic
     *
     * @return string
     */
    public function getUniversalRevenueVolumeStatic()
    {
        return $this->universal_revenue_volume_static;
    }

    /**
     * Set universalEmployeeCountStatic
     *
     * @param string $universalEmployeeCountStatic
     *
     * @return Company
     */
    public function setUniversalEmployeeCountStatic($universalEmployeeCountStatic)
    {
        $this->universal_employee_count_static = $universalEmployeeCountStatic;

        return $this;
    }

    /**
     * Get universalEmployeeCountStatic
     *
     * @return string
     */
    public function getUniversalEmployeeCountStatic()
    {
        return $this->universal_employee_count_static;
    }

    /**
     * Set universalEmployeeLocalStatic
     *
     * @param string $universalEmployeeLocalStatic
     *
     * @return Company
     */
    public function setUniversalEmployeeLocalStatic($universalEmployeeLocalStatic)
    {
        $this->universal_employee_local_static = $universalEmployeeLocalStatic;

        return $this;
    }

    /**
     * Get universalEmployeeLocalStatic
     *
     * @return string
     */
    public function getUniversalEmployeeLocalStatic()
    {
        return $this->universal_employee_local_static;
    }

    /**
     * Set universalEstablishedYearStatic
     *
     * @param string $universalEstablishedYearStatic
     *
     * @return Company
     */
    public function setUniversalEstablishedYearStatic($universalEstablishedYearStatic)
    {
        $this->universal_established_year_static = $universalEstablishedYearStatic;

        return $this;
    }

    /**
     * Get universalEstablishedYearStatic
     *
     * @return string
     */
    public function getUniversalEstablishedYearStatic()
    {
        return $this->universal_established_year_static;
    }

    /**
     * Set universalProfileBlobStatic
     *
     * @param string $universalProfileBlobStatic
     *
     * @return Company
     */
    public function setUniversalProfileBlobStatic($universalProfileBlobStatic)
    {
        $this->universal_profile_blob_static = $universalProfileBlobStatic;

        return $this;
    }

    /**
     * Get universalProfileBlobStatic
     *
     * @return string
     */
    public function getUniversalProfileBlobStatic()
    {
        return $this->universal_profile_blob_static;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Company
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Company
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Company
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Add contact
     *
     * @param \Entity\Datahub\Contact $contact
     *
     * @return Company
     */
    public function addContact(\Entity\Datahub\Contact $contact)
    {
        $this->Contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \Entity\Datahub\Contact $contact
     */
    public function removeContact(\Entity\Datahub\Contact $contact)
    {
        $this->Contacts->removeElement($contact);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->Contacts;
    }

    /**
     * Add companyMeroveusIndustry
     *
     * @param \Entity\Datahub\CompanyMeroveusIndustry $companyMeroveusIndustry
     *
     * @return Company
     */
    public function addCompanyMeroveusIndustry(\Entity\Datahub\CompanyMeroveusIndustry $companyMeroveusIndustry)
    {
        $this->CompanyMeroveusIndustries[] = $companyMeroveusIndustry;

        return $this;
    }

    /**
     * Remove companyMeroveusIndustry
     *
     * @param \Entity\Datahub\CompanyMeroveusIndustry $companyMeroveusIndustry
     */
    public function removeCompanyMeroveusIndustry(\Entity\Datahub\CompanyMeroveusIndustry $companyMeroveusIndustry)
    {
        $this->CompanyMeroveusIndustries->removeElement($companyMeroveusIndustry);
    }

    /**
     * Get companyMeroveusIndustries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyMeroveusIndustries()
    {
        return $this->CompanyMeroveusIndustries;
    }
}

