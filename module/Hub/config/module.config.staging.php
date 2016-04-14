<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'acbj-data-staging-datahub.calx84y1wzxr.us-east-1.rds.amazonaws.com',
    'port'          => '3306',
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
];
