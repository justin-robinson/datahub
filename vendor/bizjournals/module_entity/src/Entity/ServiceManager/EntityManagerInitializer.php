<?php

namespace Entity\ServiceManager;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EntityManagerInitializer implements InitializerInterface
{
    /**
     * Initialize
     *
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof \Entity\Model\Base) {
            $parts = explode('\\', $instance->getEntityClass());
            $db = strtolower($parts[1]);
            
            $entityManager = $serviceLocator->get('doctrine.entitymanager.' . $db);
            $instance->setEntityManager($entityManager);
        }
    }
}
