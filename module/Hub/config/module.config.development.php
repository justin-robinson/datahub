<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'devdb.bizj-internal.com',
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

    'logger' => [
        'default' => [
            'priority' => \Zend\Log\Logger::DEBUG,
            'path'     => '/var/tmp',
        ],
    ],
    'log'    => [
        'content' => [
            'writers' => [
                'stderr' => [
                    'options' => [
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::DEBUG),
                    ],
                ],
            ],
        ],
    ],

    'elastica-datahub' => [
        'host' => 'http://elb.elasticsearch.datahub.bizj-dev.com',
        'path' => 'current/',
        'port' => '9200',
        'url'  => 'http://elb.elasticsearch.datahub.bizj-dev.com:9200/companies',
    ],
    //
    //    'elastica-datahub' => [
    //        'host' => '127.0.0.1',
    //        'path' => 'companies/',
    //        'port' => '9200',
    //        'url'  => '127.0.0.1:9200/companies',
    //    ],

    'mysql' => [
        'datahub' => $defaultMysqlConnectionParams,
        'db02'    => [
            'charset'       => 'utf8',
            'host'          => 'db02.bizj-internal.com',
            'dbname'        => 'recon',
            'port'          => '3318',
            'user'          => 'datahub',
            'password'      => 'datahub',
            'driverOptions' => [
                1002 => 'SET NAMES utf8',
            ],
        ],
        'bizjournals' => [
            'charset'       => 'utf8',
            'host'          => 'devdb.bizj-internal.com',
            'dbname'        => 'bizj',
            'port'          => '3306',
            'user'          => 'web',
            'password'      => '',
            'driverOptions' => [
                1002 => 'SET NAMES utf8',
            ]
        ],
    ],

];
