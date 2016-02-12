<?php
$defaultMysqlConnectionParams = array(
    'charset'       => 'utf8',
    'host'          => 'devdb.bizjournals.int',
    'port'          => '3306',
    'user'          => 'web',
    'password'      => '',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    ),
);
return array(
    'doctrine' => array(
        'connection' => array(
            'datahub' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, array(
                    'dbname' => 'datahub',
                ) ),
            ),
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, array(
                    'dbname'  => 'datahub',
                ) ),
            ),
        ),
    ),
    'logger' => array(
        'default' => array(
            'priority' => \Zend\Log\Logger::DEBUG,
            'path' => '/var/tmp',
        )
    ),
    'log'=> array (
        'content' => array(
            'writers' => array(
                'stderr' => array(
                    'options' => array(
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::DEBUG),
                    ),
                ),
            ),
        ),
    ),

    'elastica' => [
        'host' => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com',
        'path' => 'rerefinery/',
        'port' => '9200',
        'url'  => 'http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery/',
    ],
);
