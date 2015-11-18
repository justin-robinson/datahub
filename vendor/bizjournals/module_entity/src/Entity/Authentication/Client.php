<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
class Client extends \Entity\Entity\Base
{
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
    private $public_key;

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var string
     */
    private $redirect_uri;

    /**
     * @var string
     */
    private $grant_types;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var integer
     */
    private $rate_limit = 0;

    /**
     * @var string
     */
    private $client_name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $unit_id;

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
    private $AccessTokens;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $RefreshTokens;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $AuthorizationCodes;

    /**
     * @var \Entity\Authentication\Service
     */
    private $Service;

    /**
     * @var \Entity\Authentication\Unit
     */
    private $Unit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AccessTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->RefreshTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AuthorizationCodes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Client
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
     * Set public_key
     *
     * @param string $publicKey
     * @return Client
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
     * @return Client
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
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return Client
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
     * Set grant_types
     *
     * @param string $grantTypes
     * @return Client
     */
    public function setGrantTypes($grantTypes)
    {
        $this->grant_types = $grantTypes;

        return $this;
    }

    /**
     * Get grant_types
     *
     * @return string 
     */
    public function getGrantTypes()
    {
        return $this->grant_types;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return Client
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
     * Set rate_limit
     *
     * @param integer $rateLimit
     * @return Client
     */
    public function setRateLimit($rateLimit)
    {
        $this->rate_limit = $rateLimit;

        return $this;
    }

    /**
     * Get rate_limit
     *
     * @return integer 
     */
    public function getRateLimit()
    {
        return $this->rate_limit;
    }

    /**
     * Set client_name
     *
     * @param string $clientName
     * @return Client
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
     * @return Client
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
     * Set unit_id
     *
     * @param integer $unitId
     * @return Client
     */
    public function setUnitId($unitId)
    {
        $this->unit_id = $unitId;

        return $this;
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * Add AccessTokens
     *
     * @param \Entity\Authentication\AccessToken $accessTokens
     * @return Client
     */
    public function addAccessToken(\Entity\Authentication\AccessToken $accessTokens)
    {
        $this->AccessTokens[] = $accessTokens;

        return $this;
    }

    /**
     * Remove AccessTokens
     *
     * @param \Entity\Authentication\AccessToken $accessTokens
     */
    public function removeAccessToken(\Entity\Authentication\AccessToken $accessTokens)
    {
        $this->AccessTokens->removeElement($accessTokens);
    }

    /**
     * Get AccessTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccessTokens()
    {
        return $this->AccessTokens;
    }

    /**
     * Add RefreshTokens
     *
     * @param \Entity\Authentication\RefreshToken $refreshTokens
     * @return Client
     */
    public function addRefreshToken(\Entity\Authentication\RefreshToken $refreshTokens)
    {
        $this->RefreshTokens[] = $refreshTokens;

        return $this;
    }

    /**
     * Remove RefreshTokens
     *
     * @param \Entity\Authentication\RefreshToken $refreshTokens
     */
    public function removeRefreshToken(\Entity\Authentication\RefreshToken $refreshTokens)
    {
        $this->RefreshTokens->removeElement($refreshTokens);
    }

    /**
     * Get RefreshTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRefreshTokens()
    {
        return $this->RefreshTokens;
    }

    /**
     * Add AuthorizationCodes
     *
     * @param \Entity\Authentication\AuthorizationCode $authorizationCodes
     * @return Client
     */
    public function addAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCodes)
    {
        $this->AuthorizationCodes[] = $authorizationCodes;

        return $this;
    }

    /**
     * Remove AuthorizationCodes
     *
     * @param \Entity\Authentication\AuthorizationCode $authorizationCodes
     */
    public function removeAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCodes)
    {
        $this->AuthorizationCodes->removeElement($authorizationCodes);
    }

    /**
     * Get AuthorizationCodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthorizationCodes()
    {
        return $this->AuthorizationCodes;
    }

    /**
     * Set Service
     *
     * @param \Entity\Authentication\Service $service
     * @return Client
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

    /**
     * Set Unit
     *
     * @param \Entity\Authentication\Unit $unit
     * @return Client
     */
    public function setUnit(\Entity\Authentication\Unit $unit = null)
    {
        $this->Unit = $unit;

        return $this;
    }

    /**
     * Get Unit
     *
     * @return \Entity\Authentication\Unit 
     */
    public function getUnit()
    {
        return $this->Unit;
    }
}
