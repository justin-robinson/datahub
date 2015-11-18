<?php

namespace Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 */
class Service extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $service_id;

    /**
     * @var integer
     */
    private $unit_id;

    /**
     * @var string
     */
    private $service_name;

    /**
     * @var string
     */
    private $public_key;

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var integer
     */
    private $access_token_ttl = 3600;

    /**
     * @var integer
     */
    private $refresh_token_ttl = 3600;

    /**
     * @var integer
     */
    private $authorization_code_ttl = 3600;

    /**
     * @var integer
     */
    private $rate_limit = 0;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $service_url;

    /**
     * @var string
     */
    private $documentation_url;

    /**
     * @var string
     */
    private $repository_url;

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
    private $ServiceScopes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Clients;

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
     * @var \Entity\Authentication\Unit
     */
    private $Unit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ServiceScopes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AccessTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->RefreshTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->AuthorizationCodes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set unit_id
     *
     * @param integer $unitId
     * @return Service
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
     * Set service_name
     *
     * @param string $serviceName
     * @return Service
     */
    public function setServiceName($serviceName)
    {
        $this->service_name = $serviceName;

        return $this;
    }

    /**
     * Get service_name
     *
     * @return string 
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * Set public_key
     *
     * @param string $publicKey
     * @return Service
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
     * @return Service
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
     * Set access_token_ttl
     *
     * @param integer $accessTokenTtl
     * @return Service
     */
    public function setAccessTokenTtl($accessTokenTtl)
    {
        $this->access_token_ttl = $accessTokenTtl;

        return $this;
    }

    /**
     * Get access_token_ttl
     *
     * @return integer 
     */
    public function getAccessTokenTtl()
    {
        return $this->access_token_ttl;
    }

    /**
     * Set refresh_token_ttl
     *
     * @param integer $refreshTokenTtl
     * @return Service
     */
    public function setRefreshTokenTtl($refreshTokenTtl)
    {
        $this->refresh_token_ttl = $refreshTokenTtl;

        return $this;
    }

    /**
     * Get refresh_token_ttl
     *
     * @return integer 
     */
    public function getRefreshTokenTtl()
    {
        return $this->refresh_token_ttl;
    }

    /**
     * Set authorization_code_ttl
     *
     * @param integer $authorizationCodeTtl
     * @return Service
     */
    public function setAuthorizationCodeTtl($authorizationCodeTtl)
    {
        $this->authorization_code_ttl = $authorizationCodeTtl;

        return $this;
    }

    /**
     * Get authorization_code_ttl
     *
     * @return integer 
     */
    public function getAuthorizationCodeTtl()
    {
        return $this->authorization_code_ttl;
    }

    /**
     * Set rate_limit
     *
     * @param integer $rateLimit
     * @return Service
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
     * Set description
     *
     * @param string $description
     * @return Service
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
     * Set service_url
     *
     * @param string $serviceUrl
     * @return Service
     */
    public function setServiceUrl($serviceUrl)
    {
        $this->service_url = $serviceUrl;

        return $this;
    }

    /**
     * Get service_url
     *
     * @return string 
     */
    public function getServiceUrl()
    {
        return $this->service_url;
    }

    /**
     * Set documentation_url
     *
     * @param string $documentationUrl
     * @return Service
     */
    public function setDocumentationUrl($documentationUrl)
    {
        $this->documentation_url = $documentationUrl;

        return $this;
    }

    /**
     * Get documentation_url
     *
     * @return string 
     */
    public function getDocumentationUrl()
    {
        return $this->documentation_url;
    }

    /**
     * Set repository_url
     *
     * @param string $repositoryUrl
     * @return Service
     */
    public function setRepositoryUrl($repositoryUrl)
    {
        $this->repository_url = $repositoryUrl;

        return $this;
    }

    /**
     * Get repository_url
     *
     * @return string 
     */
    public function getRepositoryUrl()
    {
        return $this->repository_url;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * Add ServiceScopes
     *
     * @param \Entity\Authentication\ServiceScope $serviceScopes
     * @return Service
     */
    public function addServiceScope(\Entity\Authentication\ServiceScope $serviceScopes)
    {
        $this->ServiceScopes[] = $serviceScopes;

        return $this;
    }

    /**
     * Remove ServiceScopes
     *
     * @param \Entity\Authentication\ServiceScope $serviceScopes
     */
    public function removeServiceScope(\Entity\Authentication\ServiceScope $serviceScopes)
    {
        $this->ServiceScopes->removeElement($serviceScopes);
    }

    /**
     * Get ServiceScopes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServiceScopes()
    {
        return $this->ServiceScopes;
    }

    /**
     * Add Clients
     *
     * @param \Entity\Authentication\Client $clients
     * @return Service
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

    /**
     * Add AccessTokens
     *
     * @param \Entity\Authentication\AccessToken $accessTokens
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * Set Unit
     *
     * @param \Entity\Authentication\Unit $unit
     * @return Service
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
