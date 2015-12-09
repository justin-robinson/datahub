<?php

namespace Entity\Authentication;

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
     * @return Client
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
     * Set publicKey
     *
     * @param string $publicKey
     *
     * @return Client
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
     * @return Client
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
     * Set redirectUri
     *
     * @param string $redirectUri
     *
     * @return Client
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirect_uri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * Set grantTypes
     *
     * @param string $grantTypes
     *
     * @return Client
     */
    public function setGrantTypes($grantTypes)
    {
        $this->grant_types = $grantTypes;

        return $this;
    }

    /**
     * Get grantTypes
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
     *
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
     * Set rateLimit
     *
     * @param integer $rateLimit
     *
     * @return Client
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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Client
     */
    public function setClientName($clientName)
    {
        $this->client_name = $clientName;

        return $this;
    }

    /**
     * Get clientName
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
     *
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
     * Set unitId
     *
     * @param integer $unitId
     *
     * @return Client
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * Add accessToken
     *
     * @param \Entity\Authentication\AccessToken $accessToken
     *
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * Set service
     *
     * @param \Entity\Authentication\Service $service
     *
     * @return Client
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

    /**
     * Set unit
     *
     * @param \Entity\Authentication\Unit $unit
     *
     * @return Client
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

