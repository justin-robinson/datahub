<?php

namespace Entity\Model;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Serializable;

/**
 *  This class implements model used in conjunction with the AdminAuthentication service.
 *  Every project should extend this model, placing it's specific shared secret token 
 *  in the apiRequest.
 */
abstract class AdminUser implements ServiceLocatorAwareInterface, Serializable
{
    /**
     * The response from the authentication API if the user is authenticated
     * @var array
     */
    protected $apiResponse = array();

    /**
     * The data used to request authentication
     * @var array
     */
    protected $apiRequest = array('token' => '-put-your-project-token-here-');

    /**
     * Service Manager instance
     *
     * @var ServiceManager
     */
    protected $serviceLocator;

    /**
     * @access public
     * @param  array $config
     */
    public function __construct(array $config = array())
    {
        // Allow for apiRequest params (including token) to be set in the constructor.
        $this->apiRequest = array_merge($this->apiRequest, $config);
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * {@inheritDoc}
     * @see Serializable::serialize()
     */
    public function serialize() {
        return serialize([$this->apiResponse, $this->apiRequest]); //, $this->getServiceLocator()]);
    }

    /**
     * {@inheritDoc}
     * @see Serializable::unserialize()
     */
    public function unserialize($data) {
        list($this->apiResponse, $this->apiRequest) = unserialize($data); //, $serviceLocator) = unserialize($data);
        //$this->setServiceLocator($serviceLocator);
    }

    /**
     * @access public
     * @return string
     */
    public function getEmail()
    {
        if (!empty($this->apiResponse['email'])) {
            return $this->apiResponse['email'];
        }
        return '';
    }

    /**
     * @access public
     * @return string
     * @deprecated
     */
    public function getPassword()
    {
        return '';
    }

    /**
     * @access public
     * @return integer
     */
    public function getUserId()
    {
        if (!empty($this->apiResponse['details']['user_id'])) {
            return (int) $this->apiResponse['details']['user_id'];
        }
        return 0;
    }

    /**
     * @access public
     * @return string
     */
    public function getTitle()
    {
        if (!empty($this->apiResponse['details']['title'])) {
            return $this->apiResponse['details']['title'];
        }
        return '';
    }

    /**
     * @access public
     * @return string
     */
    public function getPhone()
    {
        if (!empty($this->apiResponse['details']['phone'])) {
            return $this->apiResponse['details']['phone'];
        }
        return '';
    }

    /**
     * @access public
     * @return string
     */
    public function getDisplayName()
    {
        if (!empty($this->apiResponse['details']['display_name'])) {
            return $this->apiResponse['details']['display_name'];
        }
        return '';
    }

    /**
     * Return the user shortname
     *
     * @access public
     * @return string
     */
    public function getShortName()
    {
        $email = $this->getEmail();
        if (strpos($email, 'bizjournals.com')) {
            return preg_replace('/@.*$/', '', $email);
        }
        return $email;
    }

    /**
     * Return the user's roles
     *
     * @access public
     * @return array
     */
    public function getRoles()
    {
        if (!empty($this->apiResponse['roles']) && is_array($this->apiResponse['roles'])) {
            return $this->apiResponse['roles'];
        }
        return [];
    }

    /**
     * @access public
     * @return array
     */
    public function getAttributes()
    {
        if (!empty($this->apiResponse['attributes'])) {
            return $this->apiResponse['attributes'];
        }
        return [];
    }

    /**
     * Get paginate value
     *
     * @access public
     * @return integer
     */
    public function getPaginate()
    {
        if (!empty($this->apiResponse['attributes']['paginate'])) {
            return (int) $this->apiResponse['attributes']['paginate'];
        }
        return 0;
    }

    /**
     * Get default market
     *
     * @access public
     * @return string
     */
    public function getDefaultMarket()
    {
        if (!empty($this->apiResponse['attributes']['default-market'])) {
            return $this->apiResponse['attributes']['default-market'];
        }
        return '';
    }

    /**
     * Get admin favorites
     *
     * @access public
     * @return array
     */
    public function getFavorites()
    {
        if (!empty($this->apiResponse['attributes']['favorites'])) {
            return $this->apiResponse['attributes']['favorites'];
        }
        return [];
    }

    /**
     * @access public
     * @return boolean
     */
    public function isAuthenticated()
    {
        return !empty($this->apiResponse['success']);
    }

    /**
     * Set the email address used for authentication
     *
     * @access public
     * @param  string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->apiRequest['email'] = $email;
        $this->apiResponse = array();
        return $this;
    }

    /**
     * Set the password used for authentication
     *
     * @access public
     * @param  string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->apiRequest['password'] = $password;
        $this->apiResponse = array();
        return $this;
    }

    /**
     * Set the token used for identifying the shared secret
     *
     * @access public
     * @param  string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->apiRequest['token'] = $token;
        $this->apiResponse = array();
        return $this;
    }

    /**
     * Authenticate an admin user login. This requires email and password to be set.
     *
     * @access public
     * @return boolean
     */
    public function authenticate()
    {
        if (empty($this->apiRequest['email']) || empty($this->apiRequest['password']) || empty($this->apiRequest['token'])) {
            return false;
        } else {
            /* @var $authService \Services\AdminAuthentication\Client */
            $authService = $this->getServiceLocator()->get('Services\AdminAuthentication\Client');
            $this->apiResponse = $authService->post($this->apiRequest);
            return $this->isAuthenticated();
        }
    }
}
