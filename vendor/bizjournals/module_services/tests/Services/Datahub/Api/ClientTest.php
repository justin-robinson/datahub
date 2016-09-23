<?php

/**
 * Class ClientTest
 */
class ClientTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \Services\Datahub\Api\Client
     */
    protected $api;

    /**
     * @var int
     */
    protected $companyId;

    public function setUp()
    {
        $this->api = new \Services\Datahub\Api\Client('http://datahub.bizj-staging.com');
        $this->companyId = 1;
    }

    public function test_company_get() {

        $body = $this->api->get($this->companyId);

        $this->assertEquals($this->companyId, $body->companyId, "GET should fetch the correct resource");

        $this->assertEquals(200, $this->api->getStatusCode(), "GET should return a 200 status code");

        $this->assertNotEmpty($this->api->getLinks(), "GET response should contain HAL _links");
    }

    public function test_company_post() {

        $body = $this->api->get($this->companyId);

        $body->name .= rand(0, PHP_INT_MAX);

        $this->api->post($body);

        $this->assertNotEmpty($body->companyId, "POST should return a companyId");

        $this->assertEquals(201, $this->api->getStatusCode(), "POST should return a 200 status code");

        $this->assertNotEmpty($this->api->getLinks(), "POST response should contain HAL _links");
    }

    public function test_company_put() {

        $body = $this->api->get($this->companyId);

        $body->employeeCount += 1;

        $this->api->put($this->companyId, $body);

        $this->assertEquals($body->employeeCount, $this->api->get($this->companyId)->employeeCount, "PUT should update a company record");
    }

    public function test_company_delete() {

        $body = $this->api->get($this->companyId);

        $body->name .= rand(0, PHP_INT_MAX);

        $response = $this->api->post($body);

        $this->api->delete($response->companyId);

        $this->assertEmpty($this->api->get($response->companyId), "DELETE should make GET return null");
    }

    public function test_company_hal () {

        $this->api->get($this->companyId);

        $response = $this->api->getHalLinkResource('instances');

        $this->assertNotEmpty($response);
    }
}
