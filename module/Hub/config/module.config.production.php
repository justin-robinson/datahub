<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'hubdb.bizj-production.com',
    'name'          => 'datahub',
    'user'          => 'datahub-read',
    'password'      => 'f7e20051-a346-40dc-8240-5871cb3948cc',
    'driverOptions' => [
        1002 => 'SET NAMES utf8',
    ],
];
return [
    'doctrine' => [
        'connection' => [
            'datahub'     => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array_merge($defaultMysqlConnectionParams, [
                    'dbname' => 'datahub',
                ]),
            ],
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array_merge($defaultMysqlConnectionParams, [
                    'dbname' => 'datahub',
                ]),
            ],
        ],
    ],

    'elastica' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-internal.com',
        'path' => 'current/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-internal.com/current/',
    ],
];
