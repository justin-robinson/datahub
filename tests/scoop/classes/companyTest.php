<?php

class CompanyTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \DB\Datahub\Company
     */
    protected $company;

    public function setUp()
    {
        $this->company = new \DB\Datahub\Company([
            'name' => 'Test ACBJ company',
            'createdAt' => '2012-05-23 08:37:49',
            'updatedAt' => '2016-05-23 08:37:49',
        ]);
    }

    public function test_get_latest_instance () {

        $numInstances = 10;
        $latestInstanceIndex = (int)($numInstances/2);
        $latestInstanceWithPropertyIndex = $latestInstanceIndex + 1;
        $latestInstanceTimestamp = '9999-99-99 99:99:98';
        $latestPropertyTimestamp = '9999-99-99 99:99:99';
        $headquartersInstanceIndex = rand(0, $numInstances-1);

        $updatedAt = new DateTime('2012-05-23 08:37:49');

        foreach ( range(0,$numInstances) as $i ) {
            $instance = new \DB\Datahub\CompanyInstance([
                'name' => 'Test ACBJ company',
                'stateId' => 1,
                'stockSymbol' => 'FAKE',
                'tickerExchance' => 'FAKE',
                'url' => 'http://test.acbj.com',
                'createdAt' => '2012-05-23 08:37:49',
                'updatedAt' => $updatedAt->add(new DateInterval("P1D"))->format('Y-m-d H:i:s'),
            ]);

            if ( $i === $latestInstanceIndex ) {
                $instance->updatedAt = $latestInstanceTimestamp;
            }

            $this->company->add_company_instance($instance);
        }

        // latest instance
        $latestInstance = $this->company->get_latest_instance();
        $this->assertEquals($latestInstanceTimestamp, $latestInstance->updatedAt, "latest instance should return the instance that was updated last");

        // instance with latest property
        /**
         * @var $instance \DB\Datahub\CompanyInstanceProperty
         */
        $instance = $this->company->get_company_instances()->get($latestInstanceWithPropertyIndex);
        $instance->add_property(new \DB\Datahub\CompanyInstanceProperty(['updatedAt' => $latestPropertyTimestamp]));
        $latestInstance = $this->company->get_latest_instance();
        $this->assertEquals($instance->updatedAt, $latestInstance->updatedAt, "latest instance should return the instance with the latest property");

        // headquarters instance
        $this->company->get_company_instances()->get($headquartersInstanceIndex)->isHeadquarters = true;
        $latestInstance = $this->company->get_latest_instance();

        $this->assertTrue((bool)$latestInstance->isHeadquarters, "latest instance should return a headquarters if it exists");
    }
}
