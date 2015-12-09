<?php

namespace Entity\Medialibrary;

/**
 * AuthSession
 */
class AuthSession extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $session_id;

    /**
     * @var integer
     */
    private $auth_id;

    /**
     * @var string
     */
    private $session_hash;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $ip_address;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Entity\Medialibrary\AuthToken
     */
    private $AuthToken;


    /**
     * Get sessionId
     *
     * @return integer
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Set authId
     *
     * @param integer $authId
     *
     * @return AuthSession
     */
    public function setAuthId($authId)
    {
        $this->auth_id = $authId;

        return $this;
    }

    /**
     * Get authId
     *
     * @return integer
     */
    public function getAuthId()
    {
        return $this->auth_id;
    }

    /**
     * Set sessionHash
     *
     * @param string $sessionHash
     *
     * @return AuthSession
     */
    public function setSessionHash($sessionHash)
    {
        $this->session_hash = $sessionHash;

        return $this;
    }

    /**
     * Get sessionHash
     *
     * @return string
     */
    public function getSessionHash()
    {
        return $this->session_hash;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return AuthSession
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return AuthSession
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return AuthSession
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AuthSession
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
     * Set authToken
     *
     * @param \Entity\Medialibrary\AuthToken $authToken
     *
     * @return AuthSession
     */
    public function setAuthToken(\Entity\Medialibrary\AuthToken $authToken = null)
    {
        $this->AuthToken = $authToken;

        return $this;
    }

    /**
     * Get authToken
     *
     * @return \Entity\Medialibrary\AuthToken
     */
    public function getAuthToken()
    {
        return $this->AuthToken;
    }
}

