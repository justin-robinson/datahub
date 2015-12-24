<?php

namespace Entity\Datahub;

/**
 * Contact
 */
class Contact extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $contact_id;

    /**
     * @var integer
     */
    private $hub_id;

    /**
     * @var integer
     */
    private $meroveus_id;

    /**
     * @var integer
     */
    private $relevate_id;

    /**
     * @var boolean
     */
    private $is_duplicate = false;

    /**
     * @var boolean
     */
    private $is_current_employee = true;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $middle_initial;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $suffix;

    /**
     * @var string
     */
    private $honorific;

    /**
     * @var string
     */
    private $job_title;

    /**
     * @var integer
     */
    private $job_position_id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

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
     * @var \Entity\Datahub\Company
     */
    private $Company;


    /**
     * Get contactId
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set hubId
     *
     * @param integer $hubId
     *
     * @return Contact
     */
    public function setHubId($hubId)
    {
        $this->hub_id = $hubId;

        return $this;
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
     * Set meroveusId
     *
     * @param integer $meroveusId
     *
     * @return Contact
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
     * Set relevateId
     *
     * @param integer $relevateId
     *
     * @return Contact
     */
    public function setRelevateId($relevateId)
    {
        $this->relevate_id = $relevateId;

        return $this;
    }

    /**
     * Get relevateId
     *
     * @return integer
     */
    public function getRelevateId()
    {
        return $this->relevate_id;
    }

    /**
     * Set isDuplicate
     *
     * @param boolean $isDuplicate
     *
     * @return Contact
     */
    public function setIsDuplicate($isDuplicate)
    {
        $this->is_duplicate = $isDuplicate;

        return $this;
    }

    /**
     * Get isDuplicate
     *
     * @return boolean
     */
    public function getIsDuplicate()
    {
        return $this->is_duplicate;
    }

    /**
     * Set isCurrentEmployee
     *
     * @param boolean $isCurrentEmployee
     *
     * @return Contact
     */
    public function setIsCurrentEmployee($isCurrentEmployee)
    {
        $this->is_current_employee = $isCurrentEmployee;

        return $this;
    }

    /**
     * Get isCurrentEmployee
     *
     * @return boolean
     */
    public function getIsCurrentEmployee()
    {
        return $this->is_current_employee;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set middleInitial
     *
     * @param string $middleInitial
     *
     * @return Contact
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->middle_initial = $middleInitial;

        return $this;
    }

    /**
     * Get middleInitial
     *
     * @return string
     */
    public function getMiddleInitial()
    {
        return $this->middle_initial;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set suffix
     *
     * @param string $suffix
     *
     * @return Contact
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Set honorific
     *
     * @param string $honorific
     *
     * @return Contact
     */
    public function setHonorific($honorific)
    {
        $this->honorific = $honorific;

        return $this;
    }

    /**
     * Get honorific
     *
     * @return string
     */
    public function getHonorific()
    {
        return $this->honorific;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Contact
     */
    public function setJobTitle($jobTitle)
    {
        $this->job_title = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * Set jobPositionId
     *
     * @param integer $jobPositionId
     *
     * @return Contact
     */
    public function setJobPositionId($jobPositionId)
    {
        $this->job_position_id = $jobPositionId;

        return $this;
    }

    /**
     * Get jobPositionId
     *
     * @return integer
     */
    public function getJobPositionId()
    {
        return $this->job_position_id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Contact
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
     * Set address1
     *
     * @param string $address1
     *
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set company
     *
     * @param \Entity\Datahub\Company $company
     *
     * @return Contact
     */
    public function setCompany(\Entity\Datahub\Company $company = null)
    {
        $this->Company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Entity\Datahub\Company
     */
    public function getCompany()
    {
        return $this->Company;
    }
}

