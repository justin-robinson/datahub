<?php

namespace Entity\Medialibrary;

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
     * Get authId
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
     *
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
     *
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
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return AuthToken
     */
    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Set sharedSecret
     *
     * @param string $sharedSecret
     *
     * @return AuthToken
     */
    public function setSharedSecret($sharedSecret)
    {
        $this->shared_secret = $sharedSecret;

        return $this;
    }

    /**
     * Get sharedSecret
     *
     * @return string
     */
    public function getSharedSecret()
    {
        return $this->shared_secret;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return AuthToken
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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return AuthToken
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
     * Set isSuperuser
     *
     * @param boolean $isSuperuser
     *
     * @return AuthToken
     */
    public function setIsSuperuser($isSuperuser)
    {
        $this->is_superuser = $isSuperuser;

        return $this;
    }

    /**
     * Get isSuperuser
     *
     * @return boolean
     */
    public function getIsSuperuser()
    {
        return $this->is_superuser;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AuthToken
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
     * @return AuthToken
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
     * Add authSession
     *
     * @param \Entity\Medialibrary\AuthSession $authSession
     *
     * @return AuthToken
     */
    public function addAuthSession(\Entity\Medialibrary\AuthSession $authSession)
    {
        $this->AuthSessions[] = $authSession;

        return $this;
    }

    /**
     * Remove authSession
     *
     * @param \Entity\Medialibrary\AuthSession $authSession
     */
    public function removeAuthSession(\Entity\Medialibrary\AuthSession $authSession)
    {
        $this->AuthSessions->removeElement($authSession);
    }

    /**
     * Get authSessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthSessions()
    {
        return $this->AuthSessions;
    }
}

