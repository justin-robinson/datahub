<?php

namespace Entity\Proxy\__CG__\Entity\Authentication;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Service extends \Entity\Authentication\Service implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_id', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'unit_id', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_name', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'public_key', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'secret_key', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'access_token_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'refresh_token_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'authorization_code_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'rate_limit', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'description', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'documentation_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'repository_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'is_active', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'created_at', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'ServiceScopes', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'Clients', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'AccessTokens', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'RefreshTokens', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'AuthorizationCodes', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'Unit'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_id', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'unit_id', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_name', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'public_key', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'secret_key', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'access_token_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'refresh_token_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'authorization_code_ttl', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'rate_limit', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'description', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'service_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'documentation_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'repository_url', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'is_active', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'created_at', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'updated_at', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'ServiceScopes', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'Clients', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'AccessTokens', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'RefreshTokens', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'AuthorizationCodes', '' . "\0" . 'Entity\\Authentication\\Service' . "\0" . 'Unit'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Service $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getServiceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServiceId', []);

        return parent::getServiceId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUnitId($unitId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUnitId', [$unitId]);

        return parent::setUnitId($unitId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnitId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUnitId', []);

        return parent::getUnitId();
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceName($serviceName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServiceName', [$serviceName]);

        return parent::setServiceName($serviceName);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServiceName', []);

        return parent::getServiceName();
    }

    /**
     * {@inheritDoc}
     */
    public function setPublicKey($publicKey)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPublicKey', [$publicKey]);

        return parent::setPublicKey($publicKey);
    }

    /**
     * {@inheritDoc}
     */
    public function getPublicKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPublicKey', []);

        return parent::getPublicKey();
    }

    /**
     * {@inheritDoc}
     */
    public function setSecretKey($secretKey)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSecretKey', [$secretKey]);

        return parent::setSecretKey($secretKey);
    }

    /**
     * {@inheritDoc}
     */
    public function getSecretKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSecretKey', []);

        return parent::getSecretKey();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccessTokenTtl($accessTokenTtl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccessTokenTtl', [$accessTokenTtl]);

        return parent::setAccessTokenTtl($accessTokenTtl);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessTokenTtl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessTokenTtl', []);

        return parent::getAccessTokenTtl();
    }

    /**
     * {@inheritDoc}
     */
    public function setRefreshTokenTtl($refreshTokenTtl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRefreshTokenTtl', [$refreshTokenTtl]);

        return parent::setRefreshTokenTtl($refreshTokenTtl);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefreshTokenTtl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefreshTokenTtl', []);

        return parent::getRefreshTokenTtl();
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthorizationCodeTtl($authorizationCodeTtl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAuthorizationCodeTtl', [$authorizationCodeTtl]);

        return parent::setAuthorizationCodeTtl($authorizationCodeTtl);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorizationCodeTtl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorizationCodeTtl', []);

        return parent::getAuthorizationCodeTtl();
    }

    /**
     * {@inheritDoc}
     */
    public function setRateLimit($rateLimit)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRateLimit', [$rateLimit]);

        return parent::setRateLimit($rateLimit);
    }

    /**
     * {@inheritDoc}
     */
    public function getRateLimit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRateLimit', []);

        return parent::getRateLimit();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceUrl($serviceUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServiceUrl', [$serviceUrl]);

        return parent::setServiceUrl($serviceUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServiceUrl', []);

        return parent::getServiceUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setDocumentationUrl($documentationUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDocumentationUrl', [$documentationUrl]);

        return parent::setDocumentationUrl($documentationUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getDocumentationUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDocumentationUrl', []);

        return parent::getDocumentationUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setRepositoryUrl($repositoryUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRepositoryUrl', [$repositoryUrl]);

        return parent::setRepositoryUrl($repositoryUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function getRepositoryUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRepositoryUrl', []);

        return parent::getRepositoryUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function addServiceScope(\Entity\Authentication\ServiceScope $serviceScope)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addServiceScope', [$serviceScope]);

        return parent::addServiceScope($serviceScope);
    }

    /**
     * {@inheritDoc}
     */
    public function removeServiceScope(\Entity\Authentication\ServiceScope $serviceScope)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeServiceScope', [$serviceScope]);

        return parent::removeServiceScope($serviceScope);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceScopes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServiceScopes', []);

        return parent::getServiceScopes();
    }

    /**
     * {@inheritDoc}
     */
    public function addClient(\Entity\Authentication\Client $client)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addClient', [$client]);

        return parent::addClient($client);
    }

    /**
     * {@inheritDoc}
     */
    public function removeClient(\Entity\Authentication\Client $client)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeClient', [$client]);

        return parent::removeClient($client);
    }

    /**
     * {@inheritDoc}
     */
    public function getClients()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClients', []);

        return parent::getClients();
    }

    /**
     * {@inheritDoc}
     */
    public function addAccessToken(\Entity\Authentication\AccessToken $accessToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAccessToken', [$accessToken]);

        return parent::addAccessToken($accessToken);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAccessToken(\Entity\Authentication\AccessToken $accessToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAccessToken', [$accessToken]);

        return parent::removeAccessToken($accessToken);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessTokens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessTokens', []);

        return parent::getAccessTokens();
    }

    /**
     * {@inheritDoc}
     */
    public function addRefreshToken(\Entity\Authentication\RefreshToken $refreshToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRefreshToken', [$refreshToken]);

        return parent::addRefreshToken($refreshToken);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRefreshToken(\Entity\Authentication\RefreshToken $refreshToken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRefreshToken', [$refreshToken]);

        return parent::removeRefreshToken($refreshToken);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefreshTokens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefreshTokens', []);

        return parent::getRefreshTokens();
    }

    /**
     * {@inheritDoc}
     */
    public function addAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAuthorizationCode', [$authorizationCode]);

        return parent::addAuthorizationCode($authorizationCode);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAuthorizationCode(\Entity\Authentication\AuthorizationCode $authorizationCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAuthorizationCode', [$authorizationCode]);

        return parent::removeAuthorizationCode($authorizationCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorizationCodes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorizationCodes', []);

        return parent::getAuthorizationCodes();
    }

    /**
     * {@inheritDoc}
     */
    public function setUnit(\Entity\Authentication\Unit $unit = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUnit', [$unit]);

        return parent::setUnit($unit);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUnit', []);

        return parent::getUnit();
    }

}
