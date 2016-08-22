<?php

namespace Entity\Bizj;

/**
 * BulkSiteuser
 */
class BulkSiteuser extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $portal_id;

    /**
     * @var string
     */
    private $parameters;

    /**
     * @var string
     */
    private $user_status;

    /**
     * @var boolean
     */
    private $email_sent;

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
     * @var \Entity\Bizj\BulkPortal
     */
    private $BulkPortal;

    /**
     * @var \Entity\Bizj\UAccount
     */
    private $User;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return BulkSiteuser
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return BulkSiteuser
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
     * Set portalId
     *
     * @param integer $portalId
     *
     * @return BulkSiteuser
     */
    public function setPortalId($portalId)
    {
        $this->portal_id = $portalId;

        return $this;
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
     * Set parameters
     *
     * @param string $parameters
     *
     * @return BulkSiteuser
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
     * Set userStatus
     *
     * @param string $userStatus
     *
     * @return BulkSiteuser
     */
    public function setUserStatus($userStatus)
    {
        $this->user_status = $userStatus;

        return $this;
    }

    /**
     * Get userStatus
     *
     * @return string
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * Set emailSent
     *
     * @param boolean $emailSent
     *
     * @return BulkSiteuser
     */
    public function setEmailSent($emailSent)
    {
        $this->email_sent = $emailSent;

        return $this;
    }

    /**
     * Get emailSent
     *
     * @return boolean
     */
    public function getEmailSent()
    {
        return $this->email_sent;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return BulkSiteuser
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
     * @return BulkSiteuser
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
     * @return BulkSiteuser
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
     * Set bulkPortal
     *
     * @param \Entity\Bizj\BulkPortal $bulkPortal
     *
     * @return BulkSiteuser
     */
    public function setBulkPortal(\Entity\Bizj\BulkPortal $bulkPortal = null)
    {
        $this->BulkPortal = $bulkPortal;

        return $this;
    }

    /**
     * Get bulkPortal
     *
     * @return \Entity\Bizj\BulkPortal
     */
    public function getBulkPortal()
    {
        return $this->BulkPortal;
    }

    /**
     * Set user
     *
     * @param \Entity\Bizj\UAccount $user
     *
     * @return BulkSiteuser
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
}

