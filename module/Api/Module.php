<?php

namespace Api;

use Zend\Stdlib\ArrayUtils;
use Zend\Mvc\MvcEvent;
use Hub;

class Module
{
    /**
     * Bootstrap
     *
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('API\Restful', 'api.error', array($this, 'apiHandleError'), 100);
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

    /**
     * Write caught exception to the log
     *
     *@param event
     */
    public function apiHandleError($e)
    {
        $exception = $e->getParam('exception');
        if (is_object($exception)) {
            /* @var $logger \CMS\Log\Logger */
            $logger = $e->getApplication()->getServiceManager()->get('Logger');
            if (! $exception instanceof \Services\Exception\DoNotMailExceptionInterface) {
                $options = array();
                if (($params = $e->getParam('parameters')) != null) {
                    $options['params'] = $params;
                }
            }

            $logger->crit($e->getParam('exception'));
        }
    }

    /**
     * Service config
     * @return multitype:multitype:\CMS\Form\Service\FormFactory
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                /*
                 * Form Factories
                */
                'Api\Form\QueryBuilder' => new FormFactory(__DIR__ . '/config/form/query-builder.form.config.php'),
            ),
        );
    }
}
