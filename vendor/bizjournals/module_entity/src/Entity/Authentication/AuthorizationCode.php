<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthorizationCode
 */
class AuthorizationCode extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var integer
     */
    private $client_id;

    /**
     * @var integer
     */
    private $service_id;

    /**
     * @var string
     */
    private $redirect_uri;

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
     * Set code
     *
     * @param string $code
     * @return AuthorizationCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set client_id
     *
     * @param integer $clientId
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return AuthorizationCode
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirect_uri = $redirectUri;

        return $this;
    }

    /**
     * Get redirect_uri
     *
     * @return string 
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
