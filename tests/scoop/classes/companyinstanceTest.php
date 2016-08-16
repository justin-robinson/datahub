<?php

class CompanyInstanceTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \DB\Datahub\CompanyInstance
     */
    protected $instance;

    public function setup () {

        $this->instance = new \DB\Datahub\CompanyInstance([
            'name' => 'Test ACBJ company',
            'stateId' => 1,
            'stockSymbol' => 'FAKE',
            'tickerExchance' => 'FAKE',
            'url' => 'http://test.acbj.com',
            'createdAt' => '2012-05-23 08:37:49',
            'updatedAt' => '2016-05-23 08:37:49',
        ]);

        $updatedAt = new DateTime('2012-05-23 08:37:49');

        foreach ( range('a', 'g') as $i => $character ) {

            $property = new \DB\Datahub\CompanyInstanceProperty([
                'name' => $character,
                'value' => $i,
                'createdAt' => '2012-05-23 08:37:49',
                'updatedAt' => $updatedAt->add(new DateInterval("P1D"))->format('Y-m-d H:i:s'),
            ]);
            $this->instance->add_property($property);
        }
    }

    public function test_get_latest_property () {

        // our expected latest property
        $property = new \DB\Datahub\CompanyInstanceProperty([
            'name' => 'latest',
            'value' => 1,
            'createdAt' => '2012-05-23 08:37:49',
            'updatedAt' => '9999-99-99 99:99:99',
        ]);

        // add it
        $this->instance->add_property($property);

        // add another so we know we just aren't getting the last one added back
        $this->instance->add_property(new \DB\Datahub\CompanyInstanceProperty([
            'name' => 'notlatest',
            'value' => 0,
            'createdAt' => '2012-05-23 08:37:49',
            'updatedAt' => '0000-00-00 00:00:00',
        ]));

        $latestProperty = $this->instance->get_latest_property();

        $this->assertEquals($property->updatedAt, $latestProperty->updatedAt, "get latest property should return the latest property");
    }
}
