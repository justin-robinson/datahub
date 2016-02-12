<?php
return [
    'logger' => [
        'default' => [
            'priority' => \Zend\Log\Logger::WARN,
        ],
    ],
    'log'=> [
        'console' => [
            'writers' => [
                'stderr' => [
                    'options' => [
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::WARN),
                    ],
                ],
            ],
        ],
    ],
    'db'      => [
        'host'    => 'devdb',
        'dbName'  => 'datahub',
        'usename' => 'web',
        'pword'   => '',
    ],
    'elastic' => [
        'host' => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery/',
    ],
];
