<?php

namespace Console;

#use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManager as ServiceManager;
use Zend\Stdlib\ArrayUtils;

class Module
{

    public function getConfig()
    {

        $module_config = [];
        $files = glob(__DIR__ . sprintf('/config/module.config.{global,%s,local}.php', getenv('APPLICATION_ENV')),
            GLOB_BRACE);
        foreach ($files as $config) {
            $module_config = ArrayUtils::merge($module_config, include $config);
        }

        return $module_config;
    }

    public function getAutoloaderConfig()
    {

        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {

        return [
            'factories' => [
                /*
                 * Log Factory
                 */
                'Console\Logger'  => function (ServiceManager $sm) {

                    $service = new \Hub\Log\LoggerServiceFactory('console');
                    $logger = $service->createService($sm);
                    $logger->addProcessor('backtrace');

                    return $logger;
                },
                // Elastica
                'Elastica\Client' => function (ServiceManager $sm) {

                    $config = $sm->get('Config');
                    $client = new Elastica\Client($config['elastica']);
                    $client->setLogger($sm->get('Monolog'));

                    return $client;
                },
            ],
        ];
    }
}
