<?php

namespace tests\ApiTest;

use MyProject\Proxies\__CG__\stdClass;
use tests\Bootstrap;

use Api\Controller\CompanyController;

use Zend\Config\Reader\Json;
use Zend\Stdlib\ArrayObject;
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

        $testArgumentArray = [
            'success' => false,
            'messsage' => 'not found'
        ];

        $testObject = new JsonModel($testArgumentArray);

        // create a mock for Company entity
        $companyMock = $this->getMockBuilder('\Hub\Model\Company')
            ->getMock();

        // prep function calls for companyMock
        $companyMock->expects($this->once())
            ->method('findOneby')
            ->will($this->returnValue(null));

        // tell service manager to expect calls to mock
        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService('\Hub\Model\Company', $companyMock);

        // test
        $this->routeMatch->setParam('id', $this->companyId);

        $result = $this->controller->dispatch($this->request);

        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        $this->assertEquals($testObject, $result);

    }

    /**
     * @covers ::get
     */
    public function testGetValidCompany()
    {

        $testArgumentArray = [
            'some' => 'value'
        ];

        $testObject = new JsonModel($testArgumentArray);

        // create a mock for Company entity
        $companyMock = $this->getMockBuilder('\Hub\Model\Company')
            ->getMock();

        $companyMock->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($testArgumentArray));

        // prep function calls for companyMock
        $companyMock->expects($this->once())
            ->method('findOneby')
            ->will($this->returnSelf());

        // tell service manager to expect calls to mock
        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService('\Hub\Model\Company', $companyMock);

        // test
        $this->routeMatch->setParam('id', $this->companyId);

        $result = $this->controller->dispatch($this->request);

        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        $this->assertEquals($testObject, $result);

    }

    /**
     * @covers ::delete
     */
    public function testDeleteCompany()
    {

        $expectedResult = new JsonModel([
           'delete' =>  'record deleted'
        ]);
        $this->routeMatch->setParam('action', 'delete');
        $this->routeMatch->setParam('id', $this->companyId);

        $result = $this->controller->dispatch($this->request);

        var_dump($result);

        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        //$this->assertEquals($expectedResult, $result);

    }

    /**
     * @covers ::create
     */
    public function testCreateCompany()
    {
        $dataArray = [
            'some'  =>  'stuff'
        ];
        $expectedResult = new JsonModel([
            'delete' =>  $dataArray
        ]);
        $this->routeMatch->setParam('method', 'create');
        $this->routeMatch->setParam('data', $dataArray);

        $result = $this->controller->dispatch($this->request);

        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        //$this->assertEquals($expectedResult, $result);

    }

    /**
     * @covers  ::update
     */
    public function testUpdateCompany()
    {
        $dataArray = [];

        $expectedResult =  new JsonModel([
            'update'    => $dataArray
        ]);

        $this->routeMatch->setParam('method', 'update');
        $this->routeMatch->setParam('id', $this->companyId);
        $this->routeMatch->setParam('data', $dataArray);

        $result = $this->controller->dispatch($this->request);

        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        //$this->assertEquals($expectedResult, $result);

    }

    /**
     * @covers ::getList
     */
    public function testGetCompanyList()
    {

        $dataArray = [
            'getList'   =>  'not implemented'
        ];

        $expectedResult = new JsonModel($dataArray);

        $this->routeMatch->setParam('method', 'getList');

        $result = $this->controller->dispatch($this->request);
        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        //$this->assertEquals($expectedResult, $result);

    }

}

