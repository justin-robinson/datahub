<?php
namespace Hub;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Stdlib\ArrayUtils;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
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

}