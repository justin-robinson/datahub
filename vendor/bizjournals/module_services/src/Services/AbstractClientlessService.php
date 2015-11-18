<?php

namespace Services;

use Zend\Stdlib\ArrayObject;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

abstract class AbstractClientlessService extends ArrayObject implements ServiceLocatorAwareInterface
{

    /**
     * Service Manager instance
     *
     * @var ServiceManager
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
}
