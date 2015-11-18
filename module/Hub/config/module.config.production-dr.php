<?php
$defaultMysqlConnectionParams = array(
    'charset'       => 'utf8',
    'host'          => 'dbmaster-de1.bizjournals.int',
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
);
