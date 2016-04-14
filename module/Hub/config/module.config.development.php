<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'devdb.bizj-internal.com',
    'port'          => '3306',
    'user'          => 'web',
    'password'      => '',
    'driverOptions' => [
        1002 => 'SET NAMES utf8'
    ],
];
return [

    'doctrine' => [
        'connection' => [
            'datahub' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, [
                    'dbname' => 'datahub',
                ] ),
            ],
        ],
    ],

    'logger' => [
        'default' => [
            'priority' => \Zend\Log\Logger::DEBUG,
            'path' => '/var/tmp',
        ]
    ],
    'log'=> [
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
        'url'  => 'http://elb.elasticsearch.datahub.bizj-dev.com:9200/current',
    ],

    'pdo-datahub'=> [
        'host' => 'devdb.bizjournals.int',
        'dbname' => 'datahub',
        'usename' => 'web',
        'pword' => '',
    ],

];
