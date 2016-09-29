<?php
$defaultMysqlConnectionParams = [
    'charset'       => 'utf8',
    'host'          => 'hubdb.bizj-staging.com',
    'dbname'        => 'datahub',
    'port'          => '3306',
    'user'          => 'datahub-write',
    'password'      => '9c6a57fe-7132-4d9c-8ab2-6ed0a85c64ac',
    'driverOptions' => [
        1002 => 'SET NAMES utf8',
    ],
];
return [

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
    ],
];
