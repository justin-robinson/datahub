<?php

namespace Entity\Admin;

/**
 * AclRolePrivilege
 */
class AclRolePrivilege extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $acl_role_privilege_id;

    /**
     * @var integer
     */
    private $acl_role_id;

    /**
     * @var integer
     */
    private $acl_resource_id;

    /**
     * @var string
     */
    private $privilege;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Admin\AclRole
     */
    private $AclRole;

    /**
     * @var \Entity\Admin\AclResource
     */
    private $AclResource;


    /**
     * Get aclRolePrivilegeId
     *
     * @return integer
     */
    public function getAclRolePrivilegeId()
    {
        return $this->acl_role_privilege_id;
    }

    /**
     * Set aclRoleId
     *
     * @param integer $aclRoleId
     *
     * @return AclRolePrivilege
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
     * Set aclResourceId
     *
     * @param integer $aclResourceId
     *
     * @return AclRolePrivilege
     */
    public function setAclResourceId($aclResourceId)
    {
        $this->acl_resource_id = $aclResourceId;

        return $this;
    }

    /**
     * Get aclResourceId
     *
     * @return integer
     */
    public function getAclResourceId()
    {
        return $this->acl_resource_id;
    }

    /**
     * Set privilege
     *
     * @param string $privilege
     *
     * @return AclRolePrivilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;

        return $this;
    }

    /**
     * Get privilege
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return AclRolePrivilege
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AclRolePrivilege
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
     * @return AclRolePrivilege
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
     * Set aclRole
     *
     * @param \Entity\Admin\AclRole $aclRole
     *
     * @return AclRolePrivilege
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
     * Set aclResource
     *
     * @param \Entity\Admin\AclResource $aclResource
     *
     * @return AclRolePrivilege
     */
    public function setAclResource(\Entity\Admin\AclResource $aclResource = null)
    {
        $this->AclResource = $aclResource;

        return $this;
    }

    /**
     * Get aclResource
     *
     * @return \Entity\Admin\AclResource
     */
    public function getAclResource()
    {
        return $this->AclResource;
    }
}

