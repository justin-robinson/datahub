<?php

namespace Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclRole
 */
class AclRole extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $acl_role_id;

    /**
     * @var string
     */
    private $role_name;

    /**
     * @var string
     */
    private $description;

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
    private $AclUserRole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $AclRolePrivilege;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AclUserRole = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AclRolePrivilege = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get acl_role_id
     *
     * @return integer 
     */
    public function getAclRoleId()
    {
        return $this->acl_role_id;
    }

    /**
     * Set role_name
     *
     * @param string $roleName
     * @return AclRole
     */
    public function setRoleName($roleName)
    {
        $this->role_name = $roleName;

        return $this;
    }

    /**
     * Get role_name
     *
     * @return string 
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AclRole
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AclRole
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return AclRole
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add AclUserRole
     *
     * @param \Entity\Admin\AclUserRole $aclUserRole
     * @return AclRole
     */
    public function addAclUserRole(\Entity\Admin\AclUserRole $aclUserRole)
    {
        $this->AclUserRole[] = $aclUserRole;

        return $this;
    }

    /**
     * Remove AclUserRole
     *
     * @param \Entity\Admin\AclUserRole $aclUserRole
     */
    public function removeAclUserRole(\Entity\Admin\AclUserRole $aclUserRole)
    {
        $this->AclUserRole->removeElement($aclUserRole);
    }

    /**
     * Get AclUserRole
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAclUserRole()
    {
        return $this->AclUserRole;
    }

    /**
     * Add AclRolePrivilege
     *
     * @param \Entity\Admin\AclRolePrivilege $aclRolePrivilege
     * @return AclRole
     */
    public function addAclRolePrivilege(\Entity\Admin\AclRolePrivilege $aclRolePrivilege)
    {
        $this->AclRolePrivilege[] = $aclRolePrivilege;

        return $this;
    }

    /**
     * Remove AclRolePrivilege
     *
     * @param \Entity\Admin\AclRolePrivilege $aclRolePrivilege
     */
    public function removeAclRolePrivilege(\Entity\Admin\AclRolePrivilege $aclRolePrivilege)
    {
        $this->AclRolePrivilege->removeElement($aclRolePrivilege);
    }

    /**
     * Get AclRolePrivilege
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAclRolePrivilege()
    {
        return $this->AclRolePrivilege;
    }
}
