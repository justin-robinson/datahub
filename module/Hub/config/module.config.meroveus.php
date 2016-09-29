<?php

return [

    'elastica-datahub' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-staging.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-staging.com:9200/',
    ],

    'mysql' => [
        'datahub' => [
            'host'          => 'devdb.bizjournals.int',
            'database'        => 'datahub_meroveus',
            'port'          => '3306',
            'user'          => 'web',
            'password'      => '',
        ],
        'db02'    => [
            'host'          => 'radb.bizj-internal.com',
            'database'        => 'recon',
            'port'          => '3306',
            'user'          => 'datahub',
            'password'      => 'readonly',
        ],
    ],
];
