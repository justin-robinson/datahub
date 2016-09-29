<?php
namespace Hub;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\ServiceManager as ServiceManager;
use Zend\Stdlib\ArrayUtils;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{

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

    public function getConfig()
    {

        $module_config = [];
        $files = glob(__DIR__ . sprintf('/config/module.config.{global,%s,local}.php',
                getenv('APPLICATION_ENV')), GLOB_BRACE);
        foreach ($files as $config) {
            $module_config = ArrayUtils::merge($module_config, include $config);
        }

        return $module_config;
    }

    public function getServiceConfig()
    {

        return [
            'invokables' => [
                'Hub\Model\Company'       => 'Hub\Model\Company',
                'Hub\Model\Contact'       => 'Hub\Model\Contact',
                'Hub\Model\Country'       => 'Hub\Model\Country',
                'Hub\Model\FipsCounty'    => 'Hub\Model\FipsCounty',
                'Hub\Model\JobPosition'   => 'Hub\Model\JobPosition',
                'Hub\Model\Market'        => 'Hub\Model\Market',
                'Hub\Model\MsaPmsa'       => 'Hub\Model\MsaPmsa',
                'Hub\Model\SicCode'       => 'Hub\Model\SicCode',
                'Hub\Model\StockExchange' => 'Hub\Model\StockExchange',
                'Hub\Model\UsState'       => 'Hub\Model\UsState',
                'Hub\Model\ZipCode'       => 'Hub\Model\ZipCode',
            ],
            'factories'  => [
                'Logger' => function (ServiceManager $sm) {

                    $service = new Log\LoggerServiceFactory('hub');
                    $logger = $service->createService($sm);
                    $logger->addProcessor('backtrace');
                    $logger->addProcessor('requestid');

                    return $logger;
                },
            ],
        ];
    }
}
