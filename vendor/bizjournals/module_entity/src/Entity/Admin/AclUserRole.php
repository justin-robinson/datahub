<?php

namespace Entity\Admin;

/**
 * AclUserRole
 */
class AclUserRole extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $acl_user_role_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $acl_role_id;

    /**
     * @var integer
     */
    private $role_order;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $AclUserRoleMarket;

    /**
     * @var \Entity\Admin\AclRole
     */
    private $AclRole;

    /**
     * @var \Entity\Admin\User
     */
    private $User;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AclUserRoleMarket = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get aclUserRoleId
     *
     * @return integer
     */
    public function getAclUserRoleId()
    {
        return $this->acl_user_role_id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return AclUserRole
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
     * Set aclRoleId
     *
     * @param integer $aclRoleId
     *
     * @return AclUserRole
     */
    public function setAclRoleId($aclRoleId)
    {
        $this->acl_role_id = $aclRoleId;

        return $this;
    }

    /**
     * Get aclRoleId
     *
     * @return integer
     */
    public function getAclRoleId()
    {
        return $this->acl_role_id;
    }

    /**
     * Set roleOrder
     *
     * @param integer $roleOrder
     *
     * @return AclUserRole
     */
    public function setRoleOrder($roleOrder)
    {
        $this->role_order = $roleOrder;

        return $this;
    }

    /**
     * Get roleOrder
     *
     * @return integer
     */
    public function getRoleOrder()
    {
        return $this->role_order;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AclUserRole
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
     * @return AclUserRole
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
     * Add aclUserRoleMarket
     *
     * @param \Entity\Admin\AclUserRoleMarket $aclUserRoleMarket
     *
     * @return AclUserRole
     */
    public function addAclUserRoleMarket(\Entity\Admin\AclUserRoleMarket $aclUserRoleMarket)
    {
        $this->AclUserRoleMarket[] = $aclUserRoleMarket;

        return $this;
    }

    /**
     * Remove aclUserRoleMarket
     *
     * @param \Entity\Admin\AclUserRoleMarket $aclUserRoleMarket
     */
    public function removeAclUserRoleMarket(\Entity\Admin\AclUserRoleMarket $aclUserRoleMarket)
    {
        $this->AclUserRoleMarket->removeElement($aclUserRoleMarket);
    }

    /**
     * Get aclUserRoleMarket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAclUserRoleMarket()
    {
        return $this->AclUserRoleMarket;
    }

    /**
     * Set aclRole
     *
     * @param \Entity\Admin\AclRole $aclRole
     *
     * @return AclUserRole
     */
    public function setAclRole(\Entity\Admin\AclRole $aclRole = null)
    {
        $this->AclRole = $aclRole;

        return $this;
    }

    /**
     * Get aclRole
     *
     * @return \Entity\Admin\AclRole
     */
    public function getAclRole()
    {
        return $this->AclRole;
    }

    /**
     * Set user
     *
     * @param \Entity\Admin\User $user
     *
     * @return AclUserRole
     */
    public function setUser(\Entity\Admin\User $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\Admin\User
     */
    public function getUser()
    {
        return $this->User;
    }
}

