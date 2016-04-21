<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'acbj-data-staging-datahub.calx84y1wzxr.us-east-1.rds.amazonaws.com',
    'dbname'        => 'datahub',
    'port'          => '3306',
    'user'          => 'datahub-write',
    'password'      => '9c6a57fe-7132-4d9c-8ab2-6ed0a85c64ac',
    'driverOptions' => [
        1002 => 'SET NAMES utf8',
    ],
];
return [
    'doctrine' => [
        'connection' => [
            'datahub'     => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array_merge($defaultMysqlConnectionParams, ['dbname' => 'datahub',]),
            ],
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array_merge($defaultMysqlConnectionParams, ['dbname' => 'datahub',]),
            ],
        ],
    ],
    'elastica' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-staging.com/',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-staging.com/:9200/current/',
    ],

    'pdo' => [
        'datahub' => $defaultMysqlConnectionParams,
        'db02' => [
            'charset'       => 'utf8',
            'host'          => 'db02.bizj-internal.com',
            'dbname'        => 'recon',
            'port'          => '3318',
            'user'          => 'datahub',
            'password'      => 'readonly',
            'driverOptions' => [
                1002 => 'SET NAMES utf8'
            ],
        ],
    ]
];
