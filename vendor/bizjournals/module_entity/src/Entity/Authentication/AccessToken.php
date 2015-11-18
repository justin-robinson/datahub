<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessToken
 */
class AccessToken extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var integer
     */
    private $client_id;

    /**
     * @var integer
     */
    private $service_id;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Authentication\Client
     */
    private $Client;

    /**
     * @var \Entity\Authentication\Service
     */
    private $Service;


    /**
     * Set token
     *
     * @param string $token
     * @return AccessToken
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set client_id
     *
     * @param integer $clientId
     * @return AccessToken
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

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
     * Set service_id
     *
     * @param integer $serviceId
     * @return AccessToken
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
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return AccessToken
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return AccessToken
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AccessToken
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
     * Set Client
     *
     * @param \Entity\Authentication\Client $client
     * @return AccessToken
     */
    public function setClient(\Entity\Authentication\Client $client = null)
    {
        $this->Client = $client;

        return $this;
    }

    /**
     * Get Client
     *
     * @return \Entity\Authentication\Client 
     */
    public function getClient()
    {
        return $this->Client;
    }

    /**
     * Set Service
     *
     * @param \Entity\Authentication\Service $service
     * @return AccessToken
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
