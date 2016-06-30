<?php
return [
    'console'     => [
        'router' => [
            'routes' => [
                'index'    => [
                    'type'    => 'catchall',
                    'options' => [
                        'route'    => 'index [<action>] [--content_id=] [-c=s] [-e=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Index',
                            'action'     => 'index',
                        ],
                    ],
                ],
                'import'   => [
                    'options' => [
                        'route'    => 'import [<action>] [--content_id=] [-c=s] [--file=s] [-e=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Import',
                            'action'     => 'index',
                        ],
                    ],
                ],
                'meroveus' => [
                    'options' => [
                        'route'    => 'meroveus [<action>] [--env=] [--id=s] [-c=s] [--file=s] [-e=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Meroveus',
                            'action'     => 'index',
                        ],
                    ],
                ],
                'cron'     => [
                    'options' => [
                        'route'    => 'cron [<action>] [--env=] [-e=s] [--days=s] [--hours=s] [--minutes=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Cron',
                            'action'     => 'index',
                        ],
                    ],
                ],
                'tier'     => [
                    'options' => [
                        'route'    => 'tier [<action>] [--env=] [-e=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Tier',
                            'action'     => 'report',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'Console\Controller\Index'    => 'Console\Controller\IndexController',
            'Console\Controller\Import'   => 'Console\Controller\ImportController',
            'Console\Controller\Meroveus' => 'Console\Controller\MeroveusController',
            'Console\Controller\Cron'     => 'Console\Controller\CronController',
            'Console\Controller\Tier'     => 'Console\Controller\TierController',
        ],
    ],
    'logger'      => [
        'default' => [
            'path' => '/usr/local/bizj/script_logs/datahub',
        ],
    ],
    'log'         => [
        'console' => [
            'writers' => [
                'stderr' => [
                    'name'    => 'stream',
                    'options' => [
                        'stream'    => 'php://stderr',
                        'filters'   => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::ERR),
                        'formatter' => [
                            'name'    => 'errorhandler',
                            'options' => [
                                'format'         => '[%timestamp%] [%priorityName%] %message% in line %extra[line]%',
                                'dateTimeFormat' => 'Y-m-d H:i:s',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
