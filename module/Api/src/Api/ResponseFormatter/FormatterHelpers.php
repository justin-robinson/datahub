<?php

namespace Api\ResponseFormatter;

/**
 * Class FormatterHelpers
 * @package Api\ResponseFormatter
 */
class FormatterHelpers {

    /**
     * @param array|null $server
     *
     * @return string
     */
    public static function get_http_protocol ( array $server = null ) {

        $server = is_null($server) ? $_SERVER : $server;

        return (!empty($server['HTTPS']) && $server['HTTPS'] !== 'off' || $server['SERVER_PORT'] == 443) ? "https://" : "http://";
    }
}
