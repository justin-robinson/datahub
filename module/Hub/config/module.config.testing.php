<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'devdb.bizjournals.int',
    'dbname'        => 'datahub',
    'port'          => '3306',
    'user'          => 'web',
    'password'      => '',
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

    'elastica-datahub' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-dev.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-dev.com:9200/current',
    ],

    'mysql' => [
        'datahub' => $defaultMysqlConnectionParams,
        'db02'    => [
            'charset'       => 'utf8',
            'host'          => 'radb.bizj-internal.com',
            'dbname'        => 'recon',
            'port'          => '3306',
            'user'          => 'datahub',
            'password'      => 'readonly',
            'driverOptions' => [
                1002 => 'SET NAMES utf8',
            ],
        ],
    ],
];
