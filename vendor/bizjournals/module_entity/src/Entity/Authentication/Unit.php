<?php

namespace Entity\Authentication;

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
     * Get unitId
     *
     * @return integer
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Set unitName
     *
     * @param string $unitName
     *
     * @return Unit
     */
    public function setUnitName($unitName)
    {
        $this->unit_name = $unitName;

        return $this;
    }

    /**
     * Get unitName
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
     *
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Unit
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Unit
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
     * @return Unit
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
     * Add service
     *
     * @param \Entity\Authentication\Service $service
     *
     * @return Unit
     */
    public function addService(\Entity\Authentication\Service $service)
    {
        $this->Services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \Entity\Authentication\Service $service
     */
    public function removeService(\Entity\Authentication\Service $service)
    {
        $this->Services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices()
    {
        return $this->Services;
    }

    /**
     * Add client
     *
     * @param \Entity\Authentication\Client $client
     *
     * @return Unit
     */
    public function addClient(\Entity\Authentication\Client $client)
    {
        $this->Clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Entity\Authentication\Client $client
     */
    public function removeClient(\Entity\Authentication\Client $client)
    {
        $this->Clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->Clients;
    }
}

