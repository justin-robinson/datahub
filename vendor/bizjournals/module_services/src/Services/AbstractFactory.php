<?php

namespace Services;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AbstractFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @param string $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return false;
    }
}
