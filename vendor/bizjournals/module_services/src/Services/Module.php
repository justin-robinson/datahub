<?php

namespace Services;

use Zend\ServiceManager\ServiceManager;
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
            'invokables' => array(
                'Services\Nilsimsa\Client' => 'Services\Nilsimsa\Client',
            ),
            'factories' => array(
                // Elastica
                'Elastica\Client\Video' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    $client = new Elastica\Client\Video($config['elastica']);
                    return $client;
                },

                // Solarium
                'Solarium\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    $client = new \Solarium\Client($config['solarium']);
                    return $client;
                },

                // RabbitMQ
                'Services\RabbitMQ\Connection' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    $rabbitmq = $config['rabbitmq'];
                    $connection = new \PhpAmqpLib\Connection\AMQPConnection($rabbitmq['host'], $rabbitmq['port'], $rabbitmq['user'], $rabbitmq['pass']);

                    return $connection;
                },
                'Services\RabbitMQ\ElasticSearch' => function (ServiceManager $sm) {
                    $connection = $sm->get('Services\RabbitMQ\Connection');

                    return new RabbitMQ\ElasticSearchService($connection);
                },

                // Monolog
                'Monolog' => function (ServiceManager $sm) {
                    $env = getenv('APPLICATION_ENV');
                    $log = new \Monolog\Logger('cms');
                    $log->pushHandler(new \Monolog\Handler\StreamHandler('php://stderr',
                        $env == 'development' ? \Monolog\Logger::INFO : \Monolog\Logger::ERROR
                    ));
                    return $log;
                },

                // Cache
                'memcached' => new Cache\StorageFactory('memcached'),

                // Medialibrary
                'Services\Medialibrary\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    if ($sm->has('AuthenticationService')) {
                        /* @var $auth \Zend\Authentication\AuthenticationService */
                        $auth = $sm->get('AuthenticationService');
                        if ($auth->hasIdentity()) {
                            $config['medialibrary']['username'] = $auth->getIdentity()->getEmail();
                        }
                    }
                    return new Medialibrary\Client($config['medialibrary']);
                },
                'Services\Medialibrary\Gallery' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Medialibrary\Client');
                    $service = new Medialibrary\GalleryService($client);
                    return $service;
                },
                'Services\Medialibrary\Media' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Medialibrary\Client');
                    $service = new Medialibrary\MediaService($client);
                    return $service;
                },
                'Services\Medialibrary\Batch' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Medialibrary\Client');
                    $service = new Medialibrary\BatchService($client);
                    return $service;
                },
                'Services\Medialibrary\Search' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Medialibrary\Client');
                    $service = new Medialibrary\SearchService($client);
                    return $service;
                },

                // Multipub
                'Services\Multipub\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Multipub\Client($config['multipub']);
                },
                'Services\Multipub\Lookup' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Multipub\Client');
                    return new Multipub\LookupService($client);
                },

                // CircApi
                'Services\Circ\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Circ\Client($config['circapi']);
                },
                'Services\Circ\AddressService' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Circ\Client');
                    return new Circ\AddressService($client);
                },

                // AdminAuthentication
                'Services\AdminAuthentication\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new AdminAuthentication\Client($config['admin_authentication']);
                },

                // Bizjmerchant
                'Services\Bizjmerchant\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Bizjmerchant\Client($config['bizjmerchant']);
                },
                'Services\Bizjmerchant\MerchantService' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Bizjmerchant\Client');
                    return new Bizjmerchant\MerchantService($client);
                },

                // Nstein
                'Services\Nstein\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Nstein\Client($config['nstein']);
                },

                // Ooyala
                'Services\Ooyala\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Ooyala\Client($config['ooyala']);
                },
                'Services\Ooyala\Assets' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Ooyala\Client');
                    return new Ooyala\AssetsService($client);
                },

                //Omniture
                'Services\Omniture\Omniture' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Omniture\Omniture($config['omniture']);
                },

                // Refinery
                'Services\Refinery\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Refinery\Client($config['refinery']);
                },
                'Services\Refinery\Search' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Refinery\Client');
                    return new Refinery\SearchService($client);
                },
                 // Meroveus
                'Services\Meroveus\Client' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');
                    return new Meroveus\Client();
                },
                'Services\Meroveus\CompanyService' => function (ServiceManager $sm) {
                    $client = $sm->get('Services\Meroveus\Client');
                    return new Meroveus\CompanyService($client);
                },
                'Services\Meroveus\ContactService' => function (ServiceManager $sm) {
                    // @todo write a contactClient?
                    $client = $sm->get('Services\Meroveus\Client');
                    return new Meroveus\ContactService($client);
                },

                // Datahub
                'Services\Datahub\Api\Company' => function (ServiceManager $sm) {
                    $host = $sm->get('Config')['datahub']['host'];
                    return new Datahub\Api\Client($host, 'api/v1/company');
                },

                'Services\Datahub\Api\Instance' => function (ServiceManager $sm) {
                    $host = $sm->get('Config')['datahub']['host'];
                    return new Datahub\Api\Client($host, 'api/v1/instance');
                },

                'Services\Datahub\Api\Property' => function (ServiceManager $sm) {
                    $host = $sm->get('Config')['datahub']['host'];
                    return new Datahub\Api\Client($host, 'api/v1/property');
                }
            ),
        );
    }
}
