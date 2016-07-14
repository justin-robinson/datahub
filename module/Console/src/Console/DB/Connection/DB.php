<?php

namespace Console\DB\Connection;

use Console\DB\Error\ConfigException;

/**
 * Class DB
 * @package Console\DB\Connection
 */
class DB
{

    /**
     * @param $config
     *
     * @return \PDO
     * @throws ConfigException
     */
    public static function createPdo($config)
    {

        // set default port
        if (!isset($config['port'])) {
            $config['port'] = '3306';
        }

        // set default driver options
        if (!isset($config['driverOptions'])) {
            $config['driverOptions'] = [];
        }

        // check for required options
        foreach (['host', 'dbname', 'user', 'password'] as &$requiredOption) {
            if (!isset($config[$requiredOption])) {
                throw new ConfigException('Missing required config option for pdo connection: ' . $requiredOption);
            }
        }

        // connect!
        $db = new \PDO(
            "mysql:host={$config['host']}:{$config['port']};dbname={$config['dbname']}",
            $config['user'],
            $config['password'],
            $config['driverOptions']);

        $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        return $db;
    }
}
