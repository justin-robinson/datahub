<?php
return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'index' => array(
                    'type' => 'catchall',
                    'options' => array(
                        'route' => 'index [<action>] [--content_id=] [-c=s] [-e=s]',
                        'defaults' => array(
                            'controller' => 'Console\Controller\Index',
                            'action' => 'index',
                        ),
                    ),
                ),
                'import' => array(
                    'options' => array(
                        'route' => 'import [<action>] [--content_id=] [-c=s] [--file=s] [-e=s]',
                        'defaults' => array(
                            'controller' => 'Console\Controller\Import',
                            'action' => 'index',
                        ),
                    ),
                ),
                'meroveus' => array(
                    'options' => array(
                        'route' => 'meroveus [<action>] [--env=] [--id=s] [-c=s] [--file=s] [-e=s]',
                        'defaults' => array(
                            'controller' => 'Console\Controller\Meroveus',
                            'action' => 'index',
                        ),
                    ),
                ),
                'cron' => [
                    'options' => [
                        'route' => 'cron [<action>] [--env=] [-e=s] [--days=s]',
                        'defaults' => [
                            'controller' => 'Console\Controller\Cron',
                            'action' => 'index'
                        ]
                    ]
                ]
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Console\Controller\Index'      => 'Console\Controller\IndexController',
            'Console\Controller\Import'     => 'Console\Controller\ImportController',
            'Console\Controller\Meroveus'   => 'Console\Controller\MeroveusController',
            'Console\Controller\Cron'       => 'Console\Controller\CronController',
        ),
    ),
    'logger' => array(
        'default' => array(
            'path' => '/usr/local/bizj/script_logs/datahub',
        )
    ),
    'log'=> array (
        'console' => array(
            'writers' => array(
                'stderr' => array(
                    'name' => 'stream',
                    'options' => array(
                        'stream' => 'php://stderr',
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::ERR),
                        'formatter' => array(
                            'name' => 'errorhandler',
                            'options' => array(
                                'format' => '[%timestamp%] [%priorityName%] %message% in line %extra[line]%',
                                'dateTimeFormat' => 'Y-m-d H:i:s',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
