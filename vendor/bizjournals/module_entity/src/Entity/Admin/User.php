<?php

namespace Entity\Admin;

/**
 * User
 */
class User extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $use_ldap;

    /**
     * @var \DateTime
     */
    private $expires;

    /**
     * @var string
     */
    private $modified_by;

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
     * Constructor
     */
    public function __construct()
    {
        $this->AclUserRole = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * @return User
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
     * Set useLdap
     *
     * @param boolean $useLdap
     *
     * @return User
     */
    public function setUseLdap($useLdap)
    {
        $this->use_ldap = $useLdap;

        return $this;
    }

    /**
     * Get useLdap
     *
     * @return boolean
     */
    public function getUseLdap()
    {
        return $this->use_ldap;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     *
     * @return User
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set modifiedBy
     *
     * @param string $modifiedBy
     *
     * @return User
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modified_by = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @return User
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
     * Add aclUserRole
     *
     * @param \Entity\Admin\AclUserRole $aclUserRole
     *
     * @return User
     */
    public function addAclUserRole(\Entity\Admin\AclUserRole $aclUserRole)
    {
        $this->AclUserRole[] = $aclUserRole;

        return $this;
    }

    /**
     * Remove aclUserRole
     *
     * @param \Entity\Admin\AclUserRole $aclUserRole
     */
    public function removeAclUserRole(\Entity\Admin\AclUserRole $aclUserRole)
    {
        $this->AclUserRole->removeElement($aclUserRole);
    }

    /**
     * Get aclUserRole
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAclUserRole()
    {
        return $this->AclUserRole;
    }
}

