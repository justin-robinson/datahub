<?php

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class CompanyControllerTest extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        $this->setApplicationConfig(include __DIR__ . '/../../../config/application.config.php');
        parent::setUp();
    }

    public function testSample()
    {
        $this->assertTrue(true);
    }



}