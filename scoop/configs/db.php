<?php

$args = \Scoop\CommandLine::parseArgs($_SERVER['argv']);

switch ( true ) {
    case isset($args['e']):
        $env = $args['e'];
        break;
    case isset($args['env']):
        $env = $args['env'];
        break;
    default:
        $env = 'production';
}

$configFilePath = __DIR__ . "/../../module/Hub/config/module.config.{$env}.php";

if ( file_exists($configFilePath) ) {
    // hacks for days
    $configFile = (include $configFilePath)['pdo']['datahub'];

    return [
        'host'     => $configFile['host'],
        'user'     => $configFile['user'],
        'password' => $configFile['password'],
        'port'     => $configFile['port'],
    ];
}

return;


