<?php
require_once 'Zend/Application.php';
require_once 'Zend/Application/Bootstrap/Bootstrap.php';
require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

abstract class BaseTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
    /**
    * Prepares the environment before running a test.
    */
    public function setUp()
    {
        parent::setUp();
        $application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.xml');
        $this->bootstrap = $application->bootstrap();
        $this->getFrontController()->setParam('bootstrap', $this->bootstrap->getBootstrap());
    }

    /**
    * Cleans up the environment after running a test.
    */
    public function tearDown()
    {
        $this->getFrontController()->setParam('bootstrap', null);
        $this->bootstrap = null;
        parent::tearDown();
    }
}