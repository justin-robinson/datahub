<?php

namespace Entity\Bizj;

/**
 * UAccount
 */
class UAccount extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $uin;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $country_code;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var integer
     */
    private $business_type_id;

    /**
     * @var string
     */
    private $employee_count;

    /**
     * @var string
     */
    private $may_email_features = '0';

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var \DateTime
     */
    private $c_time;

    /**
     * @var \DateTime
     */
    private $m_time;

    /**
     * @var string
     */
    private $has_undeliverable_email = '0';

    /**
     * @var integer
     */
    private $undeliverable_email_count = 0;

    /**
     * @var string
     */
    private $has_html_email = '1';

    /**
     * @var string
     */
    private $gender;

    /**
     * @var integer
     */
    private $job_title_id;

    /**
     * @var string
     */
    private $company_postal_code;

    /**
     * @var integer
     */
    private $subscriber_info_id;

    /**
     * @var integer
     */
    private $income_level_id;

    /**
     * @var string
     */
    private $has_confirmed_email = '1';

    /**
     * @var string
     */
    private $company_name;

    /**
     * @var string
     */
    private $company_address;

    /**
     * @var string
     */
    private $company_city;

    /**
     * @var string
     */
    private $company_state;

    /**
     * @var string
     */
    private $receive_partner_email = '0';

    /**
     * @var string
     */
    private $comp_access = '0';

    /**
     * @var integer
     */
    private $source_id = 0;

    /**
     * @var string
     */
    private $email_domain;

    /**
     * @var \DateTime
     */
    private $undeliverable_time;

    /**
     * @var boolean
     */
    private $use_external_auth = 0;

    /**
     * @var \DateTime
     */
    private $last_login;

    /**
     * @var boolean
     */
    private $is_archived = 0;

    /**
     * @var boolean
     */
    private $has_suppressed_email = 0;


    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set uin
     *
     * @param string $uin
     *
     * @return UAccount
     */
    public function setUin($uin)
    {
        $this->uin = $uin;

        return $this;
    }

    /**
     * Get uin
     *
     * @return string
     */
    public function getUin()
    {
        return $this->uin;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return UAccount
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
     * Set password
     *
     * @param string $password
     *
     * @return UAccount
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return UAccount
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return UAccount
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
     * Set businessTypeId
     *
     * @param integer $businessTypeId
     *
     * @return UAccount
     */
    public function setBusinessTypeId($businessTypeId)
    {
        $this->business_type_id = $businessTypeId;

        return $this;
    }

    /**
     * Get businessTypeId
     *
     * @return integer
     */
    public function getBusinessTypeId()
    {
        return $this->business_type_id;
    }

    /**
     * Set employeeCount
     *
     * @param string $employeeCount
     *
     * @return UAccount
     */
    public function setEmployeeCount($employeeCount)
    {
        $this->employee_count = $employeeCount;

        return $this;
    }

    /**
     * Get employeeCount
     *
     * @return string
     */
    public function getEmployeeCount()
    {
        return $this->employee_count;
    }

    /**
     * Set mayEmailFeatures
     *
     * @param string $mayEmailFeatures
     *
     * @return UAccount
     */
    public function setMayEmailFeatures($mayEmailFeatures)
    {
        $this->may_email_features = $mayEmailFeatures;

        return $this;
    }

    /**
     * Get mayEmailFeatures
     *
     * @return string
     */
    public function getMayEmailFeatures()
    {
        return $this->may_email_features;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return UAccount
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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return UAccount
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
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return UAccount
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set mTime
     *
     * @param \DateTime $mTime
     *
     * @return UAccount
     */
    public function setMTime($mTime)
    {
        $this->m_time = $mTime;

        return $this;
    }

    /**
     * Get mTime
     *
     * @return \DateTime
     */
    public function getMTime()
    {
        return $this->m_time;
    }

    /**
     * Set hasUndeliverableEmail
     *
     * @param string $hasUndeliverableEmail
     *
     * @return UAccount
     */
    public function setHasUndeliverableEmail($hasUndeliverableEmail)
    {
        $this->has_undeliverable_email = $hasUndeliverableEmail;

        return $this;
    }

    /**
     * Get hasUndeliverableEmail
     *
     * @return string
     */
    public function getHasUndeliverableEmail()
    {
        return $this->has_undeliverable_email;
    }

    /**
     * Set undeliverableEmailCount
     *
     * @param integer $undeliverableEmailCount
     *
     * @return UAccount
     */
    public function setUndeliverableEmailCount($undeliverableEmailCount)
    {
        $this->undeliverable_email_count = $undeliverableEmailCount;

        return $this;
    }

    /**
     * Get undeliverableEmailCount
     *
     * @return integer
     */
    public function getUndeliverableEmailCount()
    {
        return $this->undeliverable_email_count;
    }

    /**
     * Set hasHtmlEmail
     *
     * @param string $hasHtmlEmail
     *
     * @return UAccount
     */
    public function setHasHtmlEmail($hasHtmlEmail)
    {
        $this->has_html_email = $hasHtmlEmail;

        return $this;
    }

    /**
     * Get hasHtmlEmail
     *
     * @return string
     */
    public function getHasHtmlEmail()
    {
        return $this->has_html_email;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return UAccount
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set jobTitleId
     *
     * @param integer $jobTitleId
     *
     * @return UAccount
     */
    public function setJobTitleId($jobTitleId)
    {
        $this->job_title_id = $jobTitleId;

        return $this;
    }

    /**
     * Get jobTitleId
     *
     * @return integer
     */
    public function getJobTitleId()
    {
        return $this->job_title_id;
    }

    /**
     * Set companyPostalCode
     *
     * @param string $companyPostalCode
     *
     * @return UAccount
     */
    public function setCompanyPostalCode($companyPostalCode)
    {
        $this->company_postal_code = $companyPostalCode;

        return $this;
    }

    /**
     * Get companyPostalCode
     *
     * @return string
     */
    public function getCompanyPostalCode()
    {
        return $this->company_postal_code;
    }

    /**
     * Set subscriberInfoId
     *
     * @param integer $subscriberInfoId
     *
     * @return UAccount
     */
    public function setSubscriberInfoId($subscriberInfoId)
    {
        $this->subscriber_info_id = $subscriberInfoId;

        return $this;
    }

    /**
     * Get subscriberInfoId
     *
     * @return integer
     */
    public function getSubscriberInfoId()
    {
        return $this->subscriber_info_id;
    }

    /**
     * Set incomeLevelId
     *
     * @param integer $incomeLevelId
     *
     * @return UAccount
     */
    public function setIncomeLevelId($incomeLevelId)
    {
        $this->income_level_id = $incomeLevelId;

        return $this;
    }

    /**
     * Get incomeLevelId
     *
     * @return integer
     */
    public function getIncomeLevelId()
    {
        return $this->income_level_id;
    }

    /**
     * Set hasConfirmedEmail
     *
     * @param string $hasConfirmedEmail
     *
     * @return UAccount
     */
    public function setHasConfirmedEmail($hasConfirmedEmail)
    {
        $this->has_confirmed_email = $hasConfirmedEmail;

        return $this;
    }

    /**
     * Get hasConfirmedEmail
     *
     * @return string
     */
    public function getHasConfirmedEmail()
    {
        return $this->has_confirmed_email;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return UAccount
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
     * Set companyAddress
     *
     * @param string $companyAddress
     *
     * @return UAccount
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->company_address = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string
     */
    public function getCompanyAddress()
    {
        return $this->company_address;
    }

    /**
     * Set companyCity
     *
     * @param string $companyCity
     *
     * @return UAccount
     */
    public function setCompanyCity($companyCity)
    {
        $this->company_city = $companyCity;

        return $this;
    }

    /**
     * Get companyCity
     *
     * @return string
     */
    public function getCompanyCity()
    {
        return $this->company_city;
    }

    /**
     * Set companyState
     *
     * @param string $companyState
     *
     * @return UAccount
     */
    public function setCompanyState($companyState)
    {
        $this->company_state = $companyState;

        return $this;
    }

    /**
     * Get companyState
     *
     * @return string
     */
    public function getCompanyState()
    {
        return $this->company_state;
    }

    /**
     * Set receivePartnerEmail
     *
     * @param string $receivePartnerEmail
     *
     * @return UAccount
     */
    public function setReceivePartnerEmail($receivePartnerEmail)
    {
        $this->receive_partner_email = $receivePartnerEmail;

        return $this;
    }

    /**
     * Get receivePartnerEmail
     *
     * @return string
     */
    public function getReceivePartnerEmail()
    {
        return $this->receive_partner_email;
    }

    /**
     * Set compAccess
     *
     * @param string $compAccess
     *
     * @return UAccount
     */
    public function setCompAccess($compAccess)
    {
        $this->comp_access = $compAccess;

        return $this;
    }

    /**
     * Get compAccess
     *
     * @return string
     */
    public function getCompAccess()
    {
        return $this->comp_access;
    }

    /**
     * Set sourceId
     *
     * @param integer $sourceId
     *
     * @return UAccount
     */
    public function setSourceId($sourceId)
    {
        $this->source_id = $sourceId;

        return $this;
    }

    /**
     * Get sourceId
     *
     * @return integer
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Set emailDomain
     *
     * @param string $emailDomain
     *
     * @return UAccount
     */
    public function setEmailDomain($emailDomain)
    {
        $this->email_domain = $emailDomain;

        return $this;
    }

    /**
     * Get emailDomain
     *
     * @return string
     */
    public function getEmailDomain()
    {
        return $this->email_domain;
    }

    /**
     * Set undeliverableTime
     *
     * @param \DateTime $undeliverableTime
     *
     * @return UAccount
     */
    public function setUndeliverableTime($undeliverableTime)
    {
        $this->undeliverable_time = $undeliverableTime;

        return $this;
    }

    /**
     * Get undeliverableTime
     *
     * @return \DateTime
     */
    public function getUndeliverableTime()
    {
        return $this->undeliverable_time;
    }

    /**
     * Set useExternalAuth
     *
     * @param boolean $useExternalAuth
     *
     * @return UAccount
     */
    public function setUseExternalAuth($useExternalAuth)
    {
        $this->use_external_auth = $useExternalAuth;

        return $this;
    }

    /**
     * Get useExternalAuth
     *
     * @return boolean
     */
    public function getUseExternalAuth()
    {
        return $this->use_external_auth;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return UAccount
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set isArchived
     *
     * @param boolean $isArchived
     *
     * @return UAccount
     */
    public function setIsArchived($isArchived)
    {
        $this->is_archived = $isArchived;

        return $this;
    }

    /**
     * Get isArchived
     *
     * @return boolean
     */
    public function getIsArchived()
    {
        return $this->is_archived;
    }

    /**
     * Set hasSuppressedEmail
     *
     * @param boolean $hasSuppressedEmail
     *
     * @return UAccount
     */
    public function setHasSuppressedEmail($hasSuppressedEmail)
    {
        $this->has_suppressed_email = $hasSuppressedEmail;

        return $this;
    }

    /**
     * Get hasSuppressedEmail
     *
     * @return boolean
     */
    public function getHasSuppressedEmail()
    {
        return $this->has_suppressed_email;
    }
}

