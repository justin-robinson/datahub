<?php

namespace tests\ApiTest;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use tests\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Api\Controller\CompanyController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

class CompanyControllerTest extends AbstractHttpControllerTestCase
{

    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    public function setUp()
    {
        parent::setUp();

        $serviceManager   = Bootstrap::getServiceManager();
        $this->controller = new CompanyController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(['controller' => 'company']);
        $this->event      = new MvcEvent();
        $config           = $serviceManager->get('Config');
        $routerConfig     = isset($config['router']) ? $config['router'] : [];
        $router           = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);

    }

    public function testGet()
    {
        $this->routeMatch->setParam('id', 8);
        $result = $this->controller->dispatch($this->request);
        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
    }


}