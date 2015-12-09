<?php

namespace Entity\Admin;

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
     * Get aclResourceId
     *
     * @return integer
     */
    public function getAclResourceId()
    {
        return $this->acl_resource_id;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return AclResource
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set resourceName
     *
     * @param string $resourceName
     *
     * @return AclResource
     */
    public function setResourceName($resourceName)
    {
        $this->resource_name = $resourceName;

        return $this;
    }

    /**
     * Get resourceName
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
     *
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
     * Set resourceType
     *
     * @param string $resourceType
     *
     * @return AclResource
     */
    public function setResourceType($resourceType)
    {
        $this->resource_type = $resourceType;

        return $this;
    }

    /**
     * Get resourceType
     *
     * @return string
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AclResource
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
     * @return AclResource
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
     * Add aclRolePrivilege
     *
     * @param \Entity\Admin\AclRolePrivilege $aclRolePrivilege
     *
     * @return AclResource
     */
    public function addAclRolePrivilege(\Entity\Admin\AclRolePrivilege $aclRolePrivilege)
    {
        $this->AclRolePrivilege[] = $aclRolePrivilege;

        return $this;
    }

    /**
     * Remove aclRolePrivilege
     *
     * @param \Entity\Admin\AclRolePrivilege $aclRolePrivilege
     */
    public function removeAclRolePrivilege(\Entity\Admin\AclRolePrivilege $aclRolePrivilege)
    {
        $this->AclRolePrivilege->removeElement($aclRolePrivilege);
    }

    /**
     * Get aclRolePrivilege
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAclRolePrivilege()
    {
        return $this->AclRolePrivilege;
    }
}

