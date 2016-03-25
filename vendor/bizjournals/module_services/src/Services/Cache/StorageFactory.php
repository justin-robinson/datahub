<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Services\Cache;

use Services\AbstractFactory;
use Zend\Cache\StorageFactory as ZendStorageFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Storage cache factory.
 */
class StorageFactory extends AbstractFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configure the cache
        $config = $serviceLocator->get('Config');
        $cacheConfig = isset($config['cache'][$this->name]) ? $config['cache'][$this->name] : array();
        $cache = ZendStorageFactory::factory($cacheConfig);

        return $cache;
    }
}
