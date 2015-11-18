<?php

namespace Services\Session;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\SessionManager;

class Factory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        if (isset($config['session']) && isset($config['session'][$this->getName()])) {
            $session = $config['session'][$this->getName()];
        
            $sessionConfig = null;
            if (isset($session['config'])) {
                $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                $sessionConfig = new $class();
                $sessionConfig->setOptions($options);
            }
        
            $sessionStorage = null;
            if (isset($session['storage'])) {
                $class = $session['storage'];
                $sessionStorage = new $class();
            }
        
            $sessionSaveHandler = null;
            if (isset($session['save_handler'])) {
                // class should be fetched from service manager since it will require constructor arguments
                $sessionSaveHandler = $serviceLocator->get('session.save_handler.' . $session['save_handler']);
            }
            
            $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);
        
            if (isset($session['validator'])) {
                $chain = $sessionManager->getValidatorChain();
                foreach ($session['validator'] as $validator) {
                    $validator = new $validator();
                    $chain->attach('session.validate', array($validator, 'isValid'));
        
                }
            }
        } else {
            $sessionManager = new SessionManager();
        }
        
        return $sessionManager;
    }
}
