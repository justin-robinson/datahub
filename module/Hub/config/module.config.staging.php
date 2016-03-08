<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'acbj-data-staging-datahub.calx84y1wzxr.us-east-1.rds.amazonaws.com',
    'port'          => '3306',
    'user'          => 'datahub-write',
    'password'      => 'dd9e146a-49e3-4b6e-a236-612e99e6894b',
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
                'params'      => array_merge($defaultMysqlConnectionParams, ['dbname' => 'bizj',]),
            ],
        ],
    ],
    'elastica' => [
        'host' => 'http://elb.es.production-datahub.bizj-internal.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://elb.es.production-datahub.bizj-internal.com:9200/rerefinery/',
    ],
];
