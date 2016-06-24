<?php

namespace tests\ApiTest;

use MyProject\Proxies\__CG__\stdClass;
use tests\Bootstrap;

use Api\v1\Controller\CompanyProfileController;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyProfileControllerTest
 *
 * @package tests\ApiTest
 *
 * @coversDefaultClass CompanyProfileController
 */
class CompanyProfileControllerTest extends AbstractHttpControllerTestCase
{

    protected $controller;

    /**
     * @var Request
     */
    protected $request;
    protected $response;

    /**
     * @var RouteMatch
     */
    protected $routeMatch;
    protected $event;

    protected $serviceManager;

    protected $companyId;

    public function setUp()
    {
        parent::setUp();

        $this->serviceManager = Bootstrap::getServiceManager();
        $this->controller = new CompanyProfileController();
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
        // test
        $this->routeMatch->setParam('id', -1);

        $result = $this->controller->dispatch($this->request);
        $expectedStatusCode = 204;
        $statusCode = $this->controller->getResponse()->getStatusCode();

        $this->assertNull($result);
        $this->assertEquals($expectedStatusCode, $statusCode);

    }

    /**
     * @covers ::get
     */
    public function testGetValidCompany()
    {

        // test
        $this->routeMatch->setParam('id', $this->companyId);

        $result = $this->controller->dispatch($this->request);

        $this->assertInstanceOf(JsonModel::class, $result);
        $this->assertEquals($result->getVariable('companyId'), $this->companyId);
    }

    /**
     * @covers ::delete
     */
    public function testDeleteCompany()
    {

        $expectedResult = ['content' => 'Method Not Allowed'];

        $this->routeMatch->setParam('id', $this->companyId);
        $this->request->setMethod(Request::METHOD_DELETE);

        $result = $this->controller->dispatch($this->request);

        $expectedStatusCode = 405;
        $statusCode = $this->controller->getResponse()->getStatusCode();

        $this->assertTrue(is_array($result));
        $this->assertEquals($expectedResult, $result);
        $this->assertEquals($expectedStatusCode, $statusCode);

    }

    /**
     * @covers ::create
     */
    public function testCreateCompany()
    {
        $dataArray = [
            'some'  =>  'stuff'
        ];
        $expectedResult = ['content' => 'Method Not Allowed'];

        $this->routeMatch->setParam('data', $dataArray);
        $this->request->setMethod(Request::METHOD_POST);

        $result = $this->controller->dispatch($this->request);

        $expectedStatusCode = 405;
        $statusCode = $this->controller->getResponse()->getStatusCode();

        $this->assertTrue(is_array($result));
        $this->assertEquals($expectedResult, $result);
        $this->assertEquals($expectedStatusCode, $statusCode);

    }

    /**
     * @covers  ::update
     */
    public function testUpdateCompany()
    {
        $dataArray = [
            'some'  =>  'stuff'
        ];
        $expectedResult = ['content' => 'Method Not Allowed'];

        $this->routeMatch->setParam('data', $dataArray);
        $this->request->setMethod(Request::METHOD_PUT);

        $result = $this->controller->dispatch($this->request);

        $expectedStatusCode = 405;
        $statusCode = $this->controller->getResponse()->getStatusCode();

        $this->assertTrue(is_array($result));
        $this->assertEquals($expectedResult, $result);
        $this->assertEquals($expectedStatusCode, $statusCode);

    }

    /**
     * @covers ::getList
     */
    public function testGetCompanyList()
    {

        $limit = 2;
        $_GET['limit'] = $limit;
        $result = $this->controller->dispatch($this->request);
        unset($_GET['limit']);
        $this->assertInstanceOf(JsonModel::class, $result);
        $this->assertEquals($limit, $result->getVariable('count')['current']);

    }

}

