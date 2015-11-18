<?php

namespace Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclResource
 */
class AclResource extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $acl_resource_id;

    /**
     * @var integer
     */
    private $parent_id;

    /**
     * @var string
     */
    private $resource_name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $resource_type;

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
    private $AclRolePrivilege;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AclRolePrivilege = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get acl_resource_id
     *
     * @return integer 
     */
    public function getAclResourceId()
    {
        return $this->acl_resource_id;
    }

    /**
     * Set parent_id
     *
     * @param integer $parentId
     * @return AclResource
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parent_id
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set resource_name
     *
     * @param string $resourceName
     * @return AclResource
     */
    public function setResourceName($resourceName)
    {
        $this->resource_name = $resourceName;

        return $this;
    }

    /**
     * Get resource_name
     *
     * @return string 
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AclResource
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
     * Set resource_type
     *
     * @param string $resourceType
     * @return AclResource
     */
    public function setResourceType($resourceType)
    {
        $this->resource_type = $resourceType;

        return $this;
    }

    /**
     * Get resource_type
     *
     * @return string 
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AclResource
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
     * @return AclResource
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
     * Add AclRolePrivilege
     *
     * @param \Entity\Admin\AclRolePrivilege $aclRolePrivilege
     * @return AclResource
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
