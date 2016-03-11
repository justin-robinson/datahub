<?php

namespace tests\ApiTest;

use tests\Bootstrap;

use Api\Controller\CompanyController;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyControllerTest
 *
 * @package tests\ApiTest
 *
 * @coversDefaultClass CompanyController
 */
class CompanyControllerTest extends AbstractHttpControllerTestCase
{

    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected $serviceManager;

    protected $companyId;

    public function setUp()
    {
        parent::setUp();

        $this->serviceManager = Bootstrap::getServiceManager();
        $this->controller = new CompanyController();
        $this->request = new Request();
        $this->routeMatch = new RouteMatch(['controller' => 'company']);
        $this->event = new MvcEvent();
        $config = $this->serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : [];
        $router = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($this->serviceManager);

        $this->companyId = 8;
    }

    /**
     * @covers ::get
     */
    public function testGetInvalidCompany()
    {

        // create a mock for Company entity
        $companyMock = $this->getMockBuilder('\Hub\Model\Company')
            ->disableOriginalConstructor()
            ->getMock();

        // prep function calls for companyMock
        $companyMock->expects($this->once())
            ->method('findOneby')
            ->will($this->returnValue(null));

        // tell service manager to expect calls to mock
        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService('\Hub\Model\Company', $companyMock);

        // prep expected response object
        $expectedError = new JsonModel([
            'success' => false,
            'messsage' => 'not found'
        ]);

        // test
        $this->routeMatch->setParam('id', $this->companyId);

        $result = $this->controller->dispatch($this->request);
        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        $this->assertEquals($expectedError, $result);
    }

    /**
    public function testDeleteCompany()
    {
    $this->routeMatch->setParam('action', 'delete');
    $this->routeMatch->setParam('id', $this->companyId);

    $result = $this->controller->dispatch($this->request);
    $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
    }

    public function testCreateCompany()
    {
    $this->routeMatch->setParam('action', 'create');

    $result = $this->controller->dispatch($this->request);
    $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
    }

    public function testUpdateCompany()
    {
    $this->routeMatch->setParam('action', 'update');
    $this->routeMatch->setParam('id', $this->companyId);
    $this->routeMatch->setParam('data', []);

    $result = $this->controller->dispatch($this->request);
    $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
    }

    public function testGetCompanyList()
    {
    $this->routeMatch->setParam('action', 'getList');

    $result = $this->controller->dispatch($this->request);
    $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
    }

    public function testRefineryIdAction()
    {
    $this->routeMatch->setParam('action', 'refineryIdAction');
    // TODO - can't get refinery_id from url?
    }

     */

}
