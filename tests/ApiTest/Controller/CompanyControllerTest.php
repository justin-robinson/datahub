<?php

namespace ApiTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class CompanyControllerTest extends AbstractHttpControllerTestCase
{

    protected $companyId;

    public function setUp()
    {
        parent::setUp();

        $this->setApplicationConfig(include __DIR__ . '/../../../config/application.config.php');
        $this->companyId == 8;
    }

    public function testSample()
    {
        $this->assertTrue(true);
    }

    public function testDeleteCompany()
    {

    }



}