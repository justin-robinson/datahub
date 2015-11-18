<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController as ZendAbstractRestfulController;
use Zend\Mvc\MvcEvent;

abstract class AbstractRestfulController extends ZendAbstractRestfulController
{
    protected $eventIdentifier = 'API\Restful';

    /**
     * Respond to the OPTIONS method
     *
     * Typically, set the Allow header with allowed HTTP methods, and
     * return the response.
     *
     * @return mixed
     */
    public function options()
    {
        return $this->getResponse()->getHeaders()
            ->addHeaderLine('Access-Control-Allow-Headers', $this->getRequest()->getHeader('Access-Control-Request-Headers')->getFieldValue());
    }
    
    /**
     * Handle the request
     *
     * @param  MvcEvent $e
     * @return mixed
     * @throws Exception\DomainException if no route matches in event or invalid HTTP method
     */
    public function onDispatch(MvcEvent $e)
    {
        $this->getResponse()->getHeaders()
            ->addHeaderLine('Access-Control-Allow-Origin', '*')
            ->addHeaderLine('Access-Control-Allow-Methods', 'OPTIONS, HEAD, GET, POST, PUT, DELETE');
    
        return parent::onDispatch($e);
    }
    
    /**
     * Pull publication from serviceLocator
     *
     * @return \CMS\Model\Publication
     */
    public function getCurrentPub()
    {
        return $this->getServiceLocator()->get('Publication');
    }

    /**
     * Pull publication id from serviceLocator
     *
     * @return int
     */
    public function getCurrentPubId()
    {
        return $this->getCurrentPub()->getPubId();
    }
    
    /**
     * Trigger logger
     *
     * @param   array $params
     * @return  AbstractRestfulController
     */
    public function triggerErrorEvent(array $params)
    {
        $event = $this->getEvent();
        foreach ($params as $name => $value) {
            $event->setParam($name, $value);
        }
        
        $this->getEventManager()->trigger('api.error', $event);
        
        return $this;
    }
}
