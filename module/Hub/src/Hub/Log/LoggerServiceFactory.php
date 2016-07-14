<?php
namespace Hub\Log;

use Services\AbstractFactory;
use Zend\Log\ProcessorPluginManager;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerServiceFactory extends AbstractFactory
{

    /**
     * Create logger service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Logger
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $config = $serviceLocator->get('Config');
        $name = $this->getName();
        $logger = new Logger($config['log'][$name]);

        $plugins = new ProcessorPluginManager();
        $plugins->setServiceLocator($serviceLocator);
        $logger->setProcessorPluginManager($plugins);

        return $logger;
    }
}
