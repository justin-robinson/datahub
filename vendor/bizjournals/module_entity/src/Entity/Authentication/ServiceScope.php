<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceScope
 */
class ServiceScope extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $scope_id;

    /**
     * @var integer
     */
    private $service_id;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $is_default = false;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Entity\Authentication\Service
     */
    private $Service;


    /**
     * Get scope_id
     *
     * @return integer 
     */
    public function getScopeId()
    {
        return $this->scope_id;
    }

    /**
     * Set service_id
     *
     * @param integer $serviceId
     * @return ServiceScope
     */
    public function setServiceId($serviceId)
    {
        $this->service_id = $serviceId;

        return $this;
    }

    /**
     * Get service_id
     *
     * @return integer 
     */
    public function getServiceId()
    {
        return $this->service_id;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return ServiceScope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string 
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ServiceScope
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
     * Set is_default
     *
     * @param boolean $isDefault
     * @return ServiceScope
     */
    public function setIsDefault($isDefault)
    {
        $this->is_default = $isDefault;

        return $this;
    }

    /**
     * Get is_default
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->is_default;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return ServiceScope
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ServiceScope
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
     * @return ServiceScope
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
     * Set Service
     *
     * @param \Entity\Authentication\Service $service
     * @return ServiceScope
     */
    public function setService(\Entity\Authentication\Service $service = null)
    {
        $this->Service = $service;

        return $this;
    }

    /**
     * Get Service
     *
     * @return \Entity\Authentication\Service 
     */
    public function getService()
    {
        return $this->Service;
    }
}
