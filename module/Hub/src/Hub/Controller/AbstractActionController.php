<?php

namespace Hub\Controller;

use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

abstract class AbstractActionController extends ZendAbstractActionController
{

    /**
     * Register the default events for this controller
     * @return void
     */
    protected function attachDefaultListeners()
    {

        parent::attachDefaultListeners();

        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'init'], 50);
    }

    /**
     * Reproduce ZF1 init functionality
     *
     * @param MvcEvent $e
     *
     * @return void
     */
    public function init(MvcEvent $e)
    {

        $navigation = $this->getServiceLocator()->get('navigation.sidebar');
        $page = $navigation->findOneBy('active', true);
        if ($page) {
            $label = $page->getLabel();
            $this->layout()->title = $label;

            $this->viewHelperManager = $this->getServiceLocator()->get('ViewHelperManager');
            $headTitle = $this->viewHelperManager->get('HeadTitle');
            $headTitle($label);
        }
    }

    /**
     * Set up view model with global variables
     *
     * @param array $vars
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function getViewModel(array $vars = [])
    {

        $view = new ViewModel($vars);
        $view->setVariable('action', $this->params()->fromRoute('action', null))
             ->setVariable('controller', $this->getControllerName());

        return $view;
    }

    /**
     * Get controller name form routeMatch
     * @return string
     */
    public function getControllerName()
    {

        return ltrim(str_replace(__NAMESPACE__, '', $this->getEvent()->getRouteMatch()->getParam('controller')), '\\');
    }

    /**
     * Get the logged-in user identity
     * @return \Entity\Model\User
     */
    public function getIdentity()
    {

        if (empty($this->identity)) {
            $this->identity = $this->getServiceLocator()->get('AuthenticationService')->getIdentity();
        }

        return $this->identity;
    }
}
