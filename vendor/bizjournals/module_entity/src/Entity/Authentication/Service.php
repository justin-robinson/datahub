<?php

namespace Entity\Authentication;

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
     * Get serviceId
     *
     * @return integer
     */
    public function getServiceId()
    {
        return $this->service_id;
    }

    /**
     * Set unitId
     *
     * @param integer $unitId
     *
     * @return Service
     */
    public function setUnitId($unitId)
    {
        $this->unit_id = $unitId;

        return $this;
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
     * Set serviceName
     *
     * @param string $serviceName
     *
     * @return Service
     */
    public function setServiceName($serviceName)
    {
        $this->service_name = $serviceName;

        return $this;
    }

    /**
     * Get serviceName
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * Set publicKey
     *
     * @param string $publicKey
     *
     * @return Service
     */
    public function setPublicKey($publicKey)
    {
        $this->public_key = $publicKey;

        return $this;
    }

    /**
     * Get publicKey
     *
     * @return string
     */
    public function getPublicKey()
    {
        return $this->public_key;
    }

    /**
     * Set secretKey
     *
     * @param string $secretKey
     *
     * @return Service
     */
    public function setSecretKey($secretKey)
    {
        $this->secret_key = $secretKey;

        return $this;
    }

    /**
     * Get secretKey
     *
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secret_key;
    }

    /**
     * Set accessTokenTtl
     *
     * @param integer $accessTokenTtl
     *
     * @return Service
     */
    public function setAccessTokenTtl($accessTokenTtl)
    {
        $this->access_token_ttl = $accessTokenTtl;

        return $this;
    }

    /**
     * Get accessTokenTtl
     *
     * @return integer
     */
    public function getAccessTokenTtl()
    {
        return $this->access_token_ttl;
    }

    /**
     * Set refreshTokenTtl
     *
     * @param integer $refreshTokenTtl
     *
     * @return Service
     */
    public function setRefreshTokenTtl($refreshTokenTtl)
    {
        $this->refresh_token_ttl = $refreshTokenTtl;

        return $this;
    }

    /**
     * Get refreshTokenTtl
     *
     * @return integer
     */
    public function getRefreshTokenTtl()
    {
        return $this->refresh_token_ttl;
    }

    /**
     * Set authorizationCodeTtl
     *
     * @param integer $authorizationCodeTtl
     *
     * @return Service
     */
    public function setAuthorizationCodeTtl($authorizationCodeTtl)
    {
        $this->authorization_code_ttl = $authorizationCodeTtl;

        return $this;
    }

    /**
     * Get authorizationCodeTtl
     *
     * @return integer
     */
    public function getAuthorizationCodeTtl()
    {
        return $this->authorization_code_ttl;
    }

    /**
     * Set rateLimit
     *
     * @param integer $rateLimit
     *
     * @return Service
     */
    public function setRateLimit($rateLimit)
    {
        $this->rate_limit = $rateLimit;

        return $this;
    }

    /**
     * Get rateLimit
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
     *
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
     * Set serviceUrl
     *
     * @param string $serviceUrl
     *
     * @return Service
     */
    public function setServiceUrl($serviceUrl)
    {
        $this->service_url = $serviceUrl;

        return $this;
    }

    /**
     * Get serviceUrl
     *
     * @return string
     */
    public function getServiceUrl()
    {
        return $this->service_url;
    }

    /**
     * Set documentationUrl
     *
     * @param string $documentationUrl
     *
     * @return Service
     */
    public function setDocumentationUrl($documentationUrl)
    {
        $this->documentation_url = $documentationUrl;

        return $this;
    }

    /**
     * Get documentationUrl
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return $this->documentation_url;
    }

    /**
     * Set repositoryUrl
     *
     * @param string $repositoryUrl
     *
     * @return Service
     */
    public function setRepositoryUrl($repositoryUrl)
    {
        $this->repository_url = $repositoryUrl;

        return $this;
    }

    /**
     * Get repositoryUrl
     *
     * @return string
     */
    public function getRepositoryUrl()
    {
        return $this->repository_url;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * Add serviceScope
     *
     * @param \Entity\Authentication\ServiceScope $serviceScope
     *
     * @return Service
     */
    public function addServiceScope(\Entity\Authentication\ServiceScope $serviceScope)
    {
        $this->ServiceScopes[] = $serviceScope;

        return $this;
    }

    /**
     * Remove serviceScope
     *
     * @param \Entity\Authentication\ServiceScope $serviceScope
     */
    public function removeServiceScope(\Entity\Authentication\ServiceScope $serviceScope)
    {
        $this->ServiceScopes->removeElement($serviceScope);
    }

    /**
     * Get serviceScopes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServiceScopes()
    {
        return $this->ServiceScopes;
    }

    /**
     * Add client
     *
     * @param \Entity\Authentication\Client $client
     *
     * @return Service
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

    /**
     * Add accessToken
     *
     * @param \Entity\Authentication\AccessToken $accessToken
     *
     * @return Service
     */
    public function addAccessToken(\Entity\Authentication\AccessToken $accessToken)
    {
        $this->AccessTokens[] = $accessToken;

        return $this;
    }

    /**
     * Remove accessToken
     *
     * @param \Entity\Authentication\AccessToken $accessToken
     */
    public function removeAccessToken(\Entity\Authentication\AccessToken $accessToken)
    {
        $this->AccessTokens->removeElement($accessToken);
    }

    /**
     * Get accessTokens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccessTokens()
    {
        return $this->AccessTokens;
    }

    /**
     * Add refreshToken
     *
     * @param \Entity\Authentication\RefreshToken $refreshToken
     *
     * @return Service
     */
    public function addRefreshToken(\Entity\Authentication\RefreshToken $refreshToken)
    {
        $this->RefreshTokens[] = $refreshToken;

        return $this;
    }

    /**
     * Remove refreshToken
     *
     * @param \Entity\Authentication\RefreshToken $refreshToken
     */
    public function removeRefreshToken(\Entity\Authentication\RefreshToken $refreshToken)
    {
        $this->RefreshTokens->removeElement($refreshToken);
    }

    /**
     * Get refreshTokens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefreshTokens()
    {
        return $this->RefreshTokens;
    }

    /**
     * Add authorizationCode
     *
     * @param \Entity\Authentication\AuthorizationCode $authorizationCode
     *
     * @return Service
     */
    public function addAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCode)
    {
        $this->AuthorizationCodes[] = $authorizationCode;

        return $this;
    }

    /**
     * Remove authorizationCode
     *
     * @param \Entity\Authentication\AuthorizationCode $authorizationCode
     */
    public function removeAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCode)
    {
        $this->AuthorizationCodes->removeElement($authorizationCode);
    }

    /**
     * Get authorizationCodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthorizationCodes()
    {
        return $this->AuthorizationCodes;
    }

    /**
     * Set unit
     *
     * @param \Entity\Authentication\Unit $unit
     *
     * @return Service
     */
    public function setUnit(\Entity\Authentication\Unit $unit = null)
    {
        $this->Unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Entity\Authentication\Unit
     */
    public function getUnit()
    {
        return $this->Unit;
    }
}

