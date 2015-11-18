<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Get user_id
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
     * Set country_code
     *
     * @param string $countryCode
     * @return UAccount
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }

    /**
     * Get country_code
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set postal_code
     *
     * @param string $postalCode
     * @return UAccount
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postal_code
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set business_type_id
     *
     * @param integer $businessTypeId
     * @return UAccount
     */
    public function setBusinessTypeId($businessTypeId)
    {
        $this->business_type_id = $businessTypeId;

        return $this;
    }

    /**
     * Get business_type_id
     *
     * @return integer 
     */
    public function getBusinessTypeId()
    {
        return $this->business_type_id;
    }

    /**
     * Set employee_count
     *
     * @param string $employeeCount
     * @return UAccount
     */
    public function setEmployeeCount($employeeCount)
    {
        $this->employee_count = $employeeCount;

        return $this;
    }

    /**
     * Get employee_count
     *
     * @return string 
     */
    public function getEmployeeCount()
    {
        return $this->employee_count;
    }

    /**
     * Set may_email_features
     *
     * @param string $mayEmailFeatures
     * @return UAccount
     */
    public function setMayEmailFeatures($mayEmailFeatures)
    {
        $this->may_email_features = $mayEmailFeatures;

        return $this;
    }

    /**
     * Get may_email_features
     *
     * @return string 
     */
    public function getMayEmailFeatures()
    {
        return $this->may_email_features;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return UAccount
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return UAccount
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set c_time
     *
     * @param \DateTime $cTime
     * @return UAccount
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get c_time
     *
     * @return \DateTime 
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set m_time
     *
     * @param \DateTime $mTime
     * @return UAccount
     */
    public function setMTime($mTime)
    {
        $this->m_time = $mTime;

        return $this;
    }

    /**
     * Get m_time
     *
     * @return \DateTime 
     */
    public function getMTime()
    {
        return $this->m_time;
    }

    /**
     * Set has_undeliverable_email
     *
     * @param string $hasUndeliverableEmail
     * @return UAccount
     */
    public function setHasUndeliverableEmail($hasUndeliverableEmail)
    {
        $this->has_undeliverable_email = $hasUndeliverableEmail;

        return $this;
    }

    /**
     * Get has_undeliverable_email
     *
     * @return string 
     */
    public function getHasUndeliverableEmail()
    {
        return $this->has_undeliverable_email;
    }

    /**
     * Set undeliverable_email_count
     *
     * @param integer $undeliverableEmailCount
     * @return UAccount
     */
    public function setUndeliverableEmailCount($undeliverableEmailCount)
    {
        $this->undeliverable_email_count = $undeliverableEmailCount;

        return $this;
    }

    /**
     * Get undeliverable_email_count
     *
     * @return integer 
     */
    public function getUndeliverableEmailCount()
    {
        return $this->undeliverable_email_count;
    }

    /**
     * Set has_html_email
     *
     * @param string $hasHtmlEmail
     * @return UAccount
     */
    public function setHasHtmlEmail($hasHtmlEmail)
    {
        $this->has_html_email = $hasHtmlEmail;

        return $this;
    }

    /**
     * Get has_html_email
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
     * Set job_title_id
     *
     * @param integer $jobTitleId
     * @return UAccount
     */
    public function setJobTitleId($jobTitleId)
    {
        $this->job_title_id = $jobTitleId;

        return $this;
    }

    /**
     * Get job_title_id
     *
     * @return integer 
     */
    public function getJobTitleId()
    {
        return $this->job_title_id;
    }

    /**
     * Set company_postal_code
     *
     * @param string $companyPostalCode
     * @return UAccount
     */
    public function setCompanyPostalCode($companyPostalCode)
    {
        $this->company_postal_code = $companyPostalCode;

        return $this;
    }

    /**
     * Get company_postal_code
     *
     * @return string 
     */
    public function getCompanyPostalCode()
    {
        return $this->company_postal_code;
    }

    /**
     * Set subscriber_info_id
     *
     * @param integer $subscriberInfoId
     * @return UAccount
     */
    public function setSubscriberInfoId($subscriberInfoId)
    {
        $this->subscriber_info_id = $subscriberInfoId;

        return $this;
    }

    /**
     * Get subscriber_info_id
     *
     * @return integer 
     */
    public function getSubscriberInfoId()
    {
        return $this->subscriber_info_id;
    }

    /**
     * Set income_level_id
     *
     * @param integer $incomeLevelId
     * @return UAccount
     */
    public function setIncomeLevelId($incomeLevelId)
    {
        $this->income_level_id = $incomeLevelId;

        return $this;
    }

    /**
     * Get income_level_id
     *
     * @return integer 
     */
    public function getIncomeLevelId()
    {
        return $this->income_level_id;
    }

    /**
     * Set has_confirmed_email
     *
     * @param string $hasConfirmedEmail
     * @return UAccount
     */
    public function setHasConfirmedEmail($hasConfirmedEmail)
    {
        $this->has_confirmed_email = $hasConfirmedEmail;

        return $this;
    }

    /**
     * Get has_confirmed_email
     *
     * @return string 
     */
    public function getHasConfirmedEmail()
    {
        return $this->has_confirmed_email;
    }

    /**
     * Set company_name
     *
     * @param string $companyName
     * @return UAccount
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;

        return $this;
    }

    /**
     * Get company_name
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set company_address
     *
     * @param string $companyAddress
     * @return UAccount
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->company_address = $companyAddress;

        return $this;
    }

    /**
     * Get company_address
     *
     * @return string 
     */
    public function getCompanyAddress()
    {
        return $this->company_address;
    }

    /**
     * Set company_city
     *
     * @param string $companyCity
     * @return UAccount
     */
    public function setCompanyCity($companyCity)
    {
        $this->company_city = $companyCity;

        return $this;
    }

    /**
     * Get company_city
     *
     * @return string 
     */
    public function getCompanyCity()
    {
        return $this->company_city;
    }

    /**
     * Set company_state
     *
     * @param string $companyState
     * @return UAccount
     */
    public function setCompanyState($companyState)
    {
        $this->company_state = $companyState;

        return $this;
    }

    /**
     * Get company_state
     *
     * @return string 
     */
    public function getCompanyState()
    {
        return $this->company_state;
    }

    /**
     * Set receive_partner_email
     *
     * @param string $receivePartnerEmail
     * @return UAccount
     */
    public function setReceivePartnerEmail($receivePartnerEmail)
    {
        $this->receive_partner_email = $receivePartnerEmail;

        return $this;
    }

    /**
     * Get receive_partner_email
     *
     * @return string 
     */
    public function getReceivePartnerEmail()
    {
        return $this->receive_partner_email;
    }

    /**
     * Set comp_access
     *
     * @param string $compAccess
     * @return UAccount
     */
    public function setCompAccess($compAccess)
    {
        $this->comp_access = $compAccess;

        return $this;
    }

    /**
     * Get comp_access
     *
     * @return string 
     */
    public function getCompAccess()
    {
        return $this->comp_access;
    }

    /**
     * Set source_id
     *
     * @param integer $sourceId
     * @return UAccount
     */
    public function setSourceId($sourceId)
    {
        $this->source_id = $sourceId;

        return $this;
    }

    /**
     * Get source_id
     *
     * @return integer 
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Set email_domain
     *
     * @param string $emailDomain
     * @return UAccount
     */
    public function setEmailDomain($emailDomain)
    {
        $this->email_domain = $emailDomain;

        return $this;
    }

    /**
     * Get email_domain
     *
     * @return string 
     */
    public function getEmailDomain()
    {
        return $this->email_domain;
    }

    /**
     * Set undeliverable_time
     *
     * @param \DateTime $undeliverableTime
     * @return UAccount
     */
    public function setUndeliverableTime($undeliverableTime)
    {
        $this->undeliverable_time = $undeliverableTime;

        return $this;
    }

    /**
     * Get undeliverable_time
     *
     * @return \DateTime 
     */
    public function getUndeliverableTime()
    {
        return $this->undeliverable_time;
    }

    /**
     * Set use_external_auth
     *
     * @param boolean $useExternalAuth
     * @return UAccount
     */
    public function setUseExternalAuth($useExternalAuth)
    {
        $this->use_external_auth = $useExternalAuth;

        return $this;
    }

    /**
     * Get use_external_auth
     *
     * @return boolean 
     */
    public function getUseExternalAuth()
    {
        return $this->use_external_auth;
    }

    /**
     * Set last_login
     *
     * @param \DateTime $lastLogin
     * @return UAccount
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;

        return $this;
    }

    /**
     * Get last_login
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set is_archived
     *
     * @param boolean $isArchived
     * @return UAccount
     */
    public function setIsArchived($isArchived)
    {
        $this->is_archived = $isArchived;

        return $this;
    }

    /**
     * Get is_archived
     *
     * @return boolean 
     */
    public function getIsArchived()
    {
        return $this->is_archived;
    }

    /**
     * Set has_suppressed_email
     *
     * @param boolean $hasSuppressedEmail
     * @return UAccount
     */
    public function setHasSuppressedEmail($hasSuppressedEmail)
    {
        $this->has_suppressed_email = $hasSuppressedEmail;

        return $this;
    }

    /**
     * Get has_suppressed_email
     *
     * @return boolean 
     */
    public function getHasSuppressedEmail()
    {
        return $this->has_suppressed_email;
    }
}
