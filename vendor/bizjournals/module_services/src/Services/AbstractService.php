<?php

namespace Services;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

abstract class AbstractService implements ServiceLocatorAwareInterface
{
    /**
     * Service client
     * 
     * @var AbstractClient
     */
    protected $client;
    
    /**
     * Service Manager instance
     *
     * @var ServiceManager
     */
    protected $serviceLocator;
    
    /**
     * Constructor
     *
     * @param AbstractClient $client
     */
    public function __construct(AbstractClient $client)
    {
        $this->setClient($client);
    }
    
    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
    
    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
    
    /**
     * Get service client
     * 
     * @return AbstractClient
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Set service client
     * 
     * @param AbstractClient $client
     * @return AbstractService
     */
    public function setClient(AbstractClient $client)
    {
        $this->client = $client;
        return $this;
    }
}
