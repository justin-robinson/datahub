<?php

namespace Entity\Tracking;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrackerClient
 */
class TrackerClient extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $client_id;

    /**
     * @var string
     */
    private $public_key;

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var string
     */
    private $client_name;

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
     * Get client_id
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set public_key
     *
     * @param string $publicKey
     * @return TrackerClient
     */
    public function setPublicKey($publicKey)
    {
        $this->public_key = $publicKey;

        return $this;
    }

    /**
     * Get public_key
     *
     * @return string 
     */
    public function getPublicKey()
    {
        return $this->public_key;
    }

    /**
     * Set secret_key
     *
     * @param string $secretKey
     * @return TrackerClient
     */
    public function setSecretKey($secretKey)
    {
        $this->secret_key = $secretKey;

        return $this;
    }

    /**
     * Get secret_key
     *
     * @return string 
     */
    public function getSecretKey()
    {
        return $this->secret_key;
    }

    /**
     * Set client_name
     *
     * @param string $clientName
     * @return TrackerClient
     */
    public function setClientName($clientName)
    {
        $this->client_name = $clientName;

        return $this;
    }

    /**
     * Get client_name
     *
     * @return string 
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TrackerClient
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
     * @return TrackerClient
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
     * @return TrackerClient
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
     * @return TrackerClient
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
}
