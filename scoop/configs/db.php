<?php

if ( isset($_SERVER['argv']) ){
    $args = \Scoop\CommandLine::parse_args($_SERVER['argv']);

    switch ( true ) {
        case isset($args['e']):
            $env = $args['e'];
            break;
        case isset($args['env']):
            $env = $args['env'];
            break;
        default:
            break;
    }
}

if ( !isset($env) && isset($_SERVER['APPLICATION_ENV']) ) {
    $env = $_SERVER['APPLICATION_ENV'];
}

if ( !isset($env) && defined ( 'APPLICATION_ENV' ) ) {
    $env = APPLICATION_ENV;
}

if ( !isset($env) ) {
    $env = 'production';
}

$configFilePath = __DIR__ . "/../../module/Hub/config/module.config.{$env}.php";

if ( file_exists($configFilePath) ) {

    $configFile = include $configFilePath;
    $configFile = $configFile['mysql']['datahub'];

    return [
        'host'     => $configFile['host'],
        'database' => $configFile['dbname'],
        'user'     => $configFile['user'],
        'password' => $configFile['password'],
        'port'     => $configFile['port'],
    ];
}

return;


