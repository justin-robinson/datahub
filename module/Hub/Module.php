<?php
namespace Hub;

use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Stdlib\ArrayUtils;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {

        $app = $e->getApplication();
        $sm  = $app->getServiceManager();
        $em  = $app->getEventManager();

        //$this->initLogger($sm, $em);
        //$this->initAssets($sm, $em);
        //$this->initHeaders($em);

        $entityManager = $sm->get('doctrine.entitymanager.datahub');

        if (!($e->getRequest() instanceof \Zend\Console\Request)) {
            $emConfig = $entityManager->getConfiguration();
        }
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

    public function getConfig()
    {
        $module_config = array();
        $files = glob(__DIR__ . sprintf('/config/module.config.{global,%s,local}.php', getenv('APPLICATION_ENV')), GLOB_BRACE);
        foreach ($files as $config) {
            $module_config = ArrayUtils::merge($module_config, include $config);
        }

        return $module_config;
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'Hub\Model\Company'             => 'Hub\Model\Company',
                'Hub\Model\Contact'             => 'Hub\Model\Contact',
//                'Hub\Model\StockExchange'       => 'Hub\Model\StockExchange',
                'Hub\Model\Journal'             => 'Hub\Model\Journal',
            ),
            'factories' => array(
                'Logger' => function (ServiceManager $sm) {
                        $service = new Log\LoggerServiceFactory('nascar');
                        $logger = $service->createService($sm);
                        $logger->addProcessor('backtrace');
                        $logger->addProcessor('requestid');
                        return $logger;
                    },
            ),
        );
    }
}