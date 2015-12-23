<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'dbname'        => 'bizj',
                    'charset'       => 'utf8',
                    'host'          => 'devdb.bizjournals.int',
                    'port'          => '3306',
                    'user'          => 'bizj-read',
                    'password'      => 'bizj-read',
                    'driverOptions' => array(
                        1002 => 'SET NAMES utf8'
                    ),
                ),
            ),
        ),
    ),
);
