<?php

namespace Entity\Service;

use Entity\ORM\EntityManager;
use DoctrineORMModule\Service\EntityManagerFactory as DoctrineORMModuleEntityManagerFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class EntityManagerFactory extends DoctrineORMModuleEntityManagerFactory
{
    /**
     * {@inheritDoc}
     * @return EntityManager
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        /* @var $options \DoctrineORMModule\Options\EntityManager */
        $options = $this->getOptions($sl, 'entitymanager');
        $connection = $sl->get($options->getConnection());
        $config     = $sl->get($options->getConfiguration());

        return EntityManager::create($connection, $config);
    }
}
