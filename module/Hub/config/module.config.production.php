<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'dbmaster.bizjournals.int',
    'port'          => '3306',
    'user'          => 'bizj-write',
    'password'      => 'bizj-write',
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
                    'dbname' => 'bizj',
                ]),
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
