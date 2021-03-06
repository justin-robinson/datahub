<?php

namespace Entity\Authentication;

/**
 * RefreshToken
 */
class RefreshToken extends \Entity\Entity\Base
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
     *
     * @return RefreshToken
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
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return RefreshToken
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     *
     * @return RefreshToken
     */
    public function setServiceId($serviceId)
    {
        $this->service_id = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return integer
     */
    public function getServiceId()
    {
        return $this->service_id;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return RefreshToken
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
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
     *
     * @return RefreshToken
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return RefreshToken
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
     * Set client
     *
     * @param \Entity\Authentication\Client $client
     *
     * @return RefreshToken
     */
    public function setClient(\Entity\Authentication\Client $client = null)
    {
        $this->Client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Entity\Authentication\Client
     */
    public function getClient()
    {
        return $this->Client;
    }

    /**
     * Set service
     *
     * @param \Entity\Authentication\Service $service
     *
     * @return RefreshToken
     */
    public function setService(\Entity\Authentication\Service $service = null)
    {
        $this->Service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Entity\Authentication\Service
     */
    public function getService()
    {
        return $this->Service;
    }
}

