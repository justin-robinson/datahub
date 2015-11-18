<?php
$defaultMysqlConnectionParams = array(
    'charset'       => 'utf8',
    'host'          => 'devdb.bizjournals.int',
    'port'          => '3306',
    'user'          => 'bizj-write',
    'password'      => 'bizj-write',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    ),
);
return array(
    'doctrine' => array(
        'connection' => array(
            'bizj' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, array(
                    'dbname' => 'bizj',
                ) ),
            ),
            'email' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, array(
                    'dbname' => 'email',
                ) ),
            ),
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array_merge($defaultMysqlConnectionParams, array(
                    'dbname'  => 'bizj',
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
);
