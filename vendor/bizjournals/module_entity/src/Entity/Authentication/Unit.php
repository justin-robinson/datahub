<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 */
class Unit extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $unit_id;

    /**
     * @var string
     */
    private $unit_name;

    /**
     * @var string
     */
    private $description;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Services;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Clients;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Services = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Clients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get unit_id
     *
     * @return integer 
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Set unit_name
     *
     * @param string $unitName
     * @return Unit
     */
    public function setUnitName($unitName)
    {
        $this->unit_name = $unitName;

        return $this;
    }

    /**
     * Get unit_name
     *
     * @return string 
     */
    public function getUnitName()
    {
        return $this->unit_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Unit
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * Add Services
     *
     * @param \Entity\Authentication\Service $services
     * @return Unit
     */
    public function addService(\Entity\Authentication\Service $services)
    {
        $this->Services[] = $services;

        return $this;
    }

    /**
     * Remove Services
     *
     * @param \Entity\Authentication\Service $services
     */
    public function removeService(\Entity\Authentication\Service $services)
    {
        $this->Services->removeElement($services);
    }

    /**
     * Get Services
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServices()
    {
        return $this->Services;
    }

    /**
     * Add Clients
     *
     * @param \Entity\Authentication\Client $clients
     * @return Unit
     */
    public function addClient(\Entity\Authentication\Client $clients)
    {
        $this->Clients[] = $clients;

        return $this;
    }

    /**
     * Remove Clients
     *
     * @param \Entity\Authentication\Client $clients
     */
    public function removeClient(\Entity\Authentication\Client $clients)
    {
        $this->Clients->removeElement($clients);
    }

    /**
     * Get Clients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClients()
    {
        return $this->Clients;
    }
}
