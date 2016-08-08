<?php

namespace Api\v1\ResponseFormatter;

/**
 * Class FormatterHelpers
 *
 * @package Api\v1\ResponseFormatter
 */
class FormatterHelpers
{

    /**
     * @param array|null $server
     *
     * @return string
     */
    public static function get_http_protocol(array $server = null)
    {

        $server = is_null($server) ? $_SERVER : $server;

        return (!empty($server['HTTPS']) && $server['HTTPS'] !== 'off' || (isset($server['SERVER_PORT']) && $server['SERVER_PORT'] == 443)) ? "https://" : "http://";
    }

    /**
     * @param      $name
     * @param null $default
     *
     * @return null
     */
    public static function get_server_variable($name, $default = null)
    {

        return array_key_exists($name, $_SERVER) ? $_SERVER[$name] : $default;
    }


}
