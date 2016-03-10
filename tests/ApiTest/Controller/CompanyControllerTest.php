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

    protected $companyId;
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    public function setUp()
    {
        parent::setUp();

//        $this->setApplicationConfig(include __DIR__ . '/../../../config/application.config.php');
        $this->companyId == 8;

        $serviceManager = Bootstrap::getServiceManager();

        $this->controller = new CompanyController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(['controller' => 'company']);
        $this->event      = new MvcEvent();
        $config = $serviceManager->get('Config');
        echo "line 39". ' in '."CompanyControllerTest.php".PHP_EOL;
        die(var_dump( $config['dave'] ));
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);

    }

    public function testSample()
    {
        $this->assertTrue(true);
    }

    public function testGet()
    {

//        $this->routeMatch->setParam('action', 'get' );
        $this->routeMatch->setParam('id', $this->companyId );
//        echo "line 57". ' in '."CompanyControllerTest.php".PHP_EOL;
//        die(var_dump( $this->routeMatch ));
        $reult = $this->controller->dispatch($this->request);

echo "line 61". ' in '."CompanyControllerTest.php".PHP_EOL;
die(var_dump( $reult ));
    }



}