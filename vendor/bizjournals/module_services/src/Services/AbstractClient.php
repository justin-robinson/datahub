<?php

namespace Services;

use Zend\Stdlib\ArrayObject;
use Zend\Http\Client as HttpClient;
use Zend\Http\Response as HttpResponse;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractClient extends ArrayObject implements ServiceLocatorAwareInterface
{
    /**
     * Http client
     *
     * @var HttpClient
     */
    protected $httpClient;
    
    /**
     * 
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;
    
    /**
     * Constructor
     *
     * @param  array       $input
     * @return ArrayObject
     */
    public function __construct($input = array())
    {
        parent::__construct($input, self::ARRAY_AS_PROPS);
        
        $this->init();
    }
    
    /**
     * Init
     * 
     * @return AbstractClient
     */
    public function init()
    {
        
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
     * 
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new HttpClient();
            if (isset($this->options)) {
                $this->httpClient->getAdapter();
                $this->httpClient->setOptions($this->options);
            }
        }
    
        return $this->httpClient;
    }
    
    public function validate(HttpResponse $response)
    {
        if ($response->isServerError() || $response->isClientError()) {
            throw new \Zend\Http\Client\Adapter\Exception\RuntimeException(
                sprintf('An error occurred sending request. Status code: %s; Response: %s',
                    $response->getStatusCode(),
                    $response->getBody()
                )
            );
        }
    }
}
