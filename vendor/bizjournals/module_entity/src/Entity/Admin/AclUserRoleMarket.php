<?php

namespace Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclUserRoleMarket
 */
class AclUserRoleMarket extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $acl_user_role_id;

    /**
     * @var string
     */
    private $market_code;

    /**
     * @var \Entity\Admin\AclUserRole
     */
    private $AclUserRole;


    /**
     * Set acl_user_role_id
     *
     * @param integer $aclUserRoleId
     * @return AclUserRoleMarket
     */
    public function setAclUserRoleId($aclUserRoleId)
    {
        $this->acl_user_role_id = $aclUserRoleId;

        return $this;
    }

    /**
     * Get acl_user_role_id
     *
     * @return integer 
     */
    public function getAclUserRoleId()
    {
        return $this->acl_user_role_id;
    }

    /**
     * Set market_code
     *
     * @param string $marketCode
     * @return AclUserRoleMarket
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set AclUserRole
     *
     * @param \Entity\Admin\AclUserRole $aclUserRole
     * @return AclUserRoleMarket
     */
    public function setAclUserRole(\Entity\Admin\AclUserRole $aclUserRole = null)
    {
        $this->AclUserRole = $aclUserRole;

        return $this;
    }

    /**
     * Get AclUserRole
     *
     * @return \Entity\Admin\AclUserRole 
     */
    public function getAclUserRole()
    {
        return $this->AclUserRole;
    }
}
