<?php

namespace Entity\Bizj;

/**
 * BulkPortal
 */
class BulkPortal extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $portal_id;

    /**
     * @var string
     */
    private $portal_name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var integer
     */
    private $subscription_number;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $expire_date;

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $reminder_email_list;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $total_license_count;

    /**
     * @var string
     */
    private $parameters;

    /**
     * @var boolean
     */
    private $has_automated_email;

    /**
     * @var string
     */
    private $email_address;

    /**
     * @var string
     */
    private $dow_mask;

    /**
     * @var string
     */
    private $created_by;

    /**
     * @var string
     */
    private $updated_by;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Bizj\UAccount
     */
    private $User;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $markets;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $siteUsers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->markets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->siteUsers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get portalId
     *
     * @return integer
     */
    public function getPortalId()
    {
        return $this->portal_id;
    }

    /**
     * Set portalName
     *
     * @param string $portalName
     *
     * @return BulkPortal
     */
    public function setPortalName($portalName)
    {
        $this->portal_name = $portalName;

        return $this;
    }

    /**
     * Get portalName
     *
     * @return string
     */
    public function getPortalName()
    {
        return $this->portal_name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return BulkPortal
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set subscriptionNumber
     *
     * @param integer $subscriptionNumber
     *
     * @return BulkPortal
     */
    public function setSubscriptionNumber($subscriptionNumber)
    {
        $this->subscription_number = $subscriptionNumber;

        return $this;
    }

    /**
     * Get subscriptionNumber
     *
     * @return integer
     */
    public function getSubscriptionNumber()
    {
        return $this->subscription_number;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return BulkPortal
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set expireDate
     *
     * @param \DateTime $expireDate
     *
     * @return BulkPortal
     */
    public function setExpireDate($expireDate)
    {
        $this->expire_date = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return BulkPortal
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
     * Set note
     *
     * @param string $note
     *
     * @return BulkPortal
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set reminderEmailList
     *
     * @param string $reminderEmailList
     *
     * @return BulkPortal
     */
    public function setReminderEmailList($reminderEmailList)
    {
        $this->reminder_email_list = $reminderEmailList;

        return $this;
    }

    /**
     * Get reminderEmailList
     *
     * @return string
     */
    public function getReminderEmailList()
    {
        return $this->reminder_email_list;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return BulkPortal
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

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
     * Set totalLicenseCount
     *
     * @param integer $totalLicenseCount
     *
     * @return BulkPortal
     */
    public function setTotalLicenseCount($totalLicenseCount)
    {
        $this->total_license_count = $totalLicenseCount;

        return $this;
    }

    /**
     * Get totalLicenseCount
     *
     * @return integer
     */
    public function getTotalLicenseCount()
    {
        return $this->total_license_count;
    }

    /**
     * Set parameters
     *
     * @param string $parameters
     *
     * @return BulkPortal
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Get parameters
     *
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set hasAutomatedEmail
     *
     * @param boolean $hasAutomatedEmail
     *
     * @return BulkPortal
     */
    public function setHasAutomatedEmail($hasAutomatedEmail)
    {
        $this->has_automated_email = $hasAutomatedEmail;

        return $this;
    }

    /**
     * Get hasAutomatedEmail
     *
     * @return boolean
     */
    public function getHasAutomatedEmail()
    {
        return $this->has_automated_email;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return BulkPortal
     */
    public function setEmailAddress($emailAddress)
    {
        $this->email_address = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Set dowMask
     *
     * @param string $dowMask
     *
     * @return BulkPortal
     */
    public function setDowMask($dowMask)
    {
        $this->dow_mask = $dowMask;

        return $this;
    }

    /**
     * Get dowMask
     *
     * @return string
     */
    public function getDowMask()
    {
        return $this->dow_mask;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return BulkPortal
     */
    public function setCreatedBy($createdBy)
    {
        $this->created_by = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return BulkPortal
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updated_by = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BulkPortal
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
     * @return BulkPortal
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
     * Set user
     *
     * @param \Entity\Bizj\UAccount $user
     *
     * @return BulkPortal
     */
    public function setUser(\Entity\Bizj\UAccount $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\Bizj\UAccount
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Add market
     *
     * @param \Entity\Bizj\BulkPortalMarketMap $market
     *
     * @return BulkPortal
     */
    public function addMarket(\Entity\Bizj\BulkPortalMarketMap $market)
    {
        $this->markets[] = $market;

        return $this;
    }

    /**
     * Remove market
     *
     * @param \Entity\Bizj\BulkPortalMarketMap $market
     */
    public function removeMarket(\Entity\Bizj\BulkPortalMarketMap $market)
    {
        $this->markets->removeElement($market);
    }

    /**
     * Get markets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkets()
    {
        return $this->markets;
    }

    /**
     * Add siteUser
     *
     * @param \Entity\Bizj\BulkSiteuser $siteUser
     *
     * @return BulkPortal
     */
    public function addSiteUser(\Entity\Bizj\BulkSiteuser $siteUser)
    {
        $this->siteUsers[] = $siteUser;

        return $this;
    }

    /**
     * Remove siteUser
     *
     * @param \Entity\Bizj\BulkSiteuser $siteUser
     */
    public function removeSiteUser(\Entity\Bizj\BulkSiteuser $siteUser)
    {
        $this->siteUsers->removeElement($siteUser);
    }

    /**
     * Get siteUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSiteUsers()
    {
        return $this->siteUsers;
    }
}

