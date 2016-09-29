<?php

return [

    'elastica-datahub' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-internal.com',
        'path' => 'current/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-internal.com/current/',
    ],

    'mysql' => [
        'datahub' => [
            'host'          => 'hubdb.bizj-production.com',
            'database'        => 'datahub',
            'port'          => '3306',
            'user'          => 'datahub-write',
            'password'      => '9c6a57fe-7132-4d9c-8ab2-6ed0a85c64ac',
        ],
        'db02'    => [
            'host'          => 'db02.bizj-internal.com',
            'database'        => 'recon',
            'port'          => '3318',
            'user'          => 'datahub',
            'password'      => 'datahub',
        ],
    ],
];
