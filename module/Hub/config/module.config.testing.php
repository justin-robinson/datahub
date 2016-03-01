<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'devdb.bizjournals.int',
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
                    'dbname' => 'bizj',
                ]),
            ],
        ],
    ],

    'elastica-datahub' => [
        'host' => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery/',
    ],
];
