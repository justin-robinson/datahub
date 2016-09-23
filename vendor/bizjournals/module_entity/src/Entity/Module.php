<?php

namespace Entity;

use Entity\Service\EntityManagerFactory;
use Entity\ServiceManager\EntityManagerInitializer;
use Entity\ServiceManager\InitProviderInitializer;
use DoctrineModule\Service\DriverFactory;
use DoctrineModule\Service\ZendStorageCacheFactory;
use DoctrineORMModule\Service\DBALConnectionFactory;
use DoctrineORMModule\Service\ConfigurationFactory;
use Zend\Stdlib\ArrayUtils;

class Module
{
    public function getConfig()
    {
        $module_config = array();
        $files = glob(__DIR__ . sprintf('/../../config/module.config.{global,%s,local}.php', getenv('APPLICATION_ENV')), GLOB_BRACE);
        foreach ($files as $config) {
            $module_config = ArrayUtils::merge($module_config, include $config);
        }

        return $module_config;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'initializers' => array(
                'entity_manager' => new EntityManagerInitializer(),
                'init_provider'  => new InitProviderInitializer()
            ),
            'invokables' => array(
                'Entity\Model\Industry'             => 'Entity\Model\Industry',
                'Entity\Model\Journal'              => 'Entity\Model\Journal',
                'Entity\Model\Market'               => 'Entity\Model\Market',
                'Entity\Model\Topic'                => 'Entity\Model\Topic',
                'Entity\Model\UrlShortener'         => 'Entity\Model\UrlShortener',
                'Entity\Model\Video'                => 'Entity\Model\Video',
                'Entity\Model\Email\ClickUrl'       => 'Entity\Model\Email\ClickUrl',
                'Entity\Model\Email\ClickTrack'     => 'Entity\Model\Email\ClickTrack',
                'Entity\Model\Email\Subscriptions'  => 'Entity\Model\Email\Subscriptions',
            ),
            'factories' => array(
                /*
                 * Doctrine ORM factories
                 */
                'doctrine.connection.admin'    => new DBALConnectionFactory('admin'),
                'doctrine.configuration.admin' => new ConfigurationFactory('admin'),
                'doctrine.entitymanager.admin' => new EntityManagerFactory('admin'),
                'doctrine.driver.admin'        => new DriverFactory('admin'),

                'doctrine.connection.authentication'    => new DBALConnectionFactory('authentication'),
                'doctrine.configuration.authentication' => new ConfigurationFactory('authentication'),
                'doctrine.entitymanager.authentication' => new EntityManagerFactory('authentication'),
                'doctrine.driver.authentication'        => new DriverFactory('authentication'),

                'doctrine.connection.bizj'     => new DBALConnectionFactory('bizj'),
                'doctrine.configuration.bizj'  => new ConfigurationFactory('bizj'),
                'doctrine.entitymanager.bizj'  => new EntityManagerFactory('bizj'),
                'doctrine.driver.bizj'         => new DriverFactory('bizj'),

                'doctrine.connection.bzjpreview'    => new DBALConnectionFactory('bzjpreview'),
                'doctrine.configuration.bzjpreview' => new ConfigurationFactory('bzjpreview'),
                'doctrine.entitymanager.bzjpreview' => new EntityManagerFactory('bzjpreview'),
                'doctrine.driver.bzjpreview'        => new DriverFactory('bzjpreview'),

                'doctrine.connection.cms'      => new DBALConnectionFactory('cms'),
                'doctrine.configuration.cms'   => new ConfigurationFactory('cms'),
                'doctrine.entitymanager.cms'   => new EntityManagerFactory('cms'),
                'doctrine.driver.cms'          => new DriverFactory('cms'),

                'doctrine.connection.datahub'      => new DBALConnectionFactory('datahub'),
                'doctrine.configuration.datahub'   => new ConfigurationFactory('datahub'),
                'doctrine.entitymanager.datahub'   => new EntityManagerFactory('datahub'),
                'doctrine.driver.datahub'          => new DriverFactory('datahub'),

                'doctrine.connection.email'     => new DBALConnectionFactory('email'),
                'doctrine.configuration.email'  => new ConfigurationFactory('email'),
                'doctrine.entitymanager.email'  => new EntityManagerFactory('email'),
                'doctrine.driver.email'         => new DriverFactory('email'),

                'doctrine.connection.medialibrary'    => new DBALConnectionFactory('medialibrary'),
                'doctrine.configuration.medialibrary' => new ConfigurationFactory('medialibrary'),
                'doctrine.entitymanager.medialibrary' => new EntityManagerFactory('medialibrary'),
                'doctrine.driver.medialibrary'        => new DriverFactory('medialibrary'),

                'doctrine.connection.nascarillustrated'    => new DBALConnectionFactory('nascarillustrated'),
                'doctrine.configuration.nascarillustrated' => new ConfigurationFactory('nascarillustrated'),
                'doctrine.entitymanager.nascarillustrated' => new EntityManagerFactory('nascarillustrated'),
                'doctrine.driver.nascarillustrated'        => new DriverFactory('nascarillustrated'),

                'doctrine.connection.tracking'    => new DBALConnectionFactory('tracking'),
                'doctrine.configuration.tracking' => new ConfigurationFactory('tracking'),
                'doctrine.entitymanager.tracking' => new EntityManagerFactory('tracking'),
                'doctrine.driver.tracking'        => new DriverFactory('tracking'),

                'doctrine.cache.memcached'     => new ZendStorageCacheFactory('memcached'),
                'doctrine.cache.redis'         => new ZendStorageCacheFactory('redis'),
            ),
        );
    }
}
