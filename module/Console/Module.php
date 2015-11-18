<?php

namespace Console;

#use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;

use Zend\Mvc\MvcEvent as MvcEvent;
use Zend\EventManager\EventManager as EventManager;
use Zend\ServiceManager\ServiceManager as ServiceManager;

class Module
{
    public function getConfig()
    {
        $module_config = array();
        $files = glob(__DIR__ . sprintf('/config/module.config.{global,%s,local}.php', getenv('APPLICATION_ENV')), GLOB_BRACE);
        foreach ($files as $config) {
            $module_config = ArrayUtils::merge($module_config, include $config);
        }

        return $module_config;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                /*
                 * Log Factory
                 */
                'Console\Logger' => function (ServiceManager $sm) {
                    $service = new \Hub\Log\LoggerServiceFactory('console');
                    $logger = $service->createService($sm);
                    $logger->addProcessor('backtrace');
                    return $logger;
                },
            ),
        );
    }
}
