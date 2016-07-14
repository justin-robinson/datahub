<?php

namespace HubTest\Controller;

use Hub\Controller\IndexController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{

    /**
     * @var bool $traceError
     */
    protected $traceError = true;

    protected $controller;

    protected $request;

    protected $response;

    protected $routeMatch;

    protected $event;

    public function setUp()
    {

        $modulePath = static::findParentPath("module");
        $this->setApplicationConfig(
            include $modulePath . '/../config/application.config.php'
        );
        parent::setUp();

        $this->controller = new IndexController();
        $this->request = new Request();
        $this->routeMatch = new RouteMatch(['controller' => 'index']);
        $this->event = new MvcEvent();
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
    }


    public function testIndexPageRedirects()
    {

        $this->dispatch('/index');
        $this->assertRedirectTo('http://www.bizjournals.com');
    }

    public function testIndexActionRedirects()
    {

        // Set the action
        $this->routeMatch->setParam('action', 'index');

        // Dispatch request
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        // Assert the redirect
        $this->assertEquals(
            302,
            $response->getStatusCode()
        );
        $this->assertEquals(
            'Location: http://www.bizjournals.com',
            $response->getHeaders()->get('Location')
        );
    }

    protected static function findParentPath($path)
    {

        $dir = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);
            if ($previousDir === $dir) {
                return false;
            }
            $previousDir = $dir;
        }

        return $dir . '/' . $path;
    }

}
