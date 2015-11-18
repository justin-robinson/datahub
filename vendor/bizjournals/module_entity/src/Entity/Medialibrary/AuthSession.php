<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

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
     * Get session_id
     *
     * @return integer 
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Set auth_id
     *
     * @param integer $authId
     * @return AuthSession
     */
    public function setAuthId($authId)
    {
        $this->auth_id = $authId;

        return $this;
    }

    /**
     * Get auth_id
     *
     * @return integer 
     */
    public function getAuthId()
    {
        return $this->auth_id;
    }

    /**
     * Set session_hash
     *
     * @param string $sessionHash
     * @return AuthSession
     */
    public function setSessionHash($sessionHash)
    {
        $this->session_hash = $sessionHash;

        return $this;
    }

    /**
     * Get session_hash
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
     * Set ip_address
     *
     * @param string $ipAddress
     * @return AuthSession
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return AuthSession
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AuthSession
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
     * Set AuthToken
     *
     * @param \Entity\Medialibrary\AuthToken $authToken
     * @return AuthSession
     */
    public function setAuthToken(\Entity\Medialibrary\AuthToken $authToken = null)
    {
        $this->AuthToken = $authToken;

        return $this;
    }

    /**
     * Get AuthToken
     *
     * @return \Entity\Medialibrary\AuthToken 
     */
    public function getAuthToken()
    {
        return $this->AuthToken;
    }
}
