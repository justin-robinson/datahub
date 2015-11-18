<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthToken
 */
class AuthToken extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $auth_id;

    /**
     * @var string
     */
    private $purpose;

    /**
     * @var string
     */
    private $category = 'editorial';

    /**
     * @var string
     */
    private $api_key;

    /**
     * @var string
     */
    private $shared_secret;

    /**
     * @var boolean
     */
    private $is_active = true;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var boolean
     */
    private $is_superuser = false;

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
    private $AuthSessions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AuthSessions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set purpose
     *
     * @param string $purpose
     * @return AuthToken
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string 
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return AuthToken
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set api_key
     *
     * @param string $apiKey
     * @return AuthToken
     */
    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;

        return $this;
    }

    /**
     * Get api_key
     *
     * @return string 
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Set shared_secret
     *
     * @param string $sharedSecret
     * @return AuthToken
     */
    public function setSharedSecret($sharedSecret)
    {
        $this->shared_secret = $sharedSecret;

        return $this;
    }

    /**
     * Get shared_secret
     *
     * @return string 
     */
    public function getSharedSecret()
    {
        return $this->shared_secret;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return AuthToken
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
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return AuthToken
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
     * Set is_superuser
     *
     * @param boolean $isSuperuser
     * @return AuthToken
     */
    public function setIsSuperuser($isSuperuser)
    {
        $this->is_superuser = $isSuperuser;

        return $this;
    }

    /**
     * Get is_superuser
     *
     * @return boolean 
     */
    public function getIsSuperuser()
    {
        return $this->is_superuser;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return AuthToken
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
     * @return AuthToken
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
     * Add AuthSessions
     *
     * @param \Entity\Medialibrary\AuthSession $authSessions
     * @return AuthToken
     */
    public function addAuthSession(\Entity\Medialibrary\AuthSession $authSessions)
    {
        $this->AuthSessions[] = $authSessions;

        return $this;
    }

    /**
     * Remove AuthSessions
     *
     * @param \Entity\Medialibrary\AuthSession $authSessions
     */
    public function removeAuthSession(\Entity\Medialibrary\AuthSession $authSessions)
    {
        $this->AuthSessions->removeElement($authSessions);
    }

    /**
     * Get AuthSessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthSessions()
    {
        return $this->AuthSessions;
    }
}
