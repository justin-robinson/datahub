<?php

namespace Api\Formatter;

use DB\Datahub\CompanyInstance;

/**
 * Class CompanyInstanceFormatter
 */
class CompanyInstanceFormatter {

    /**
     * @param \DB\Datahub\CompanyInstance $instance
     *
     * @return array
     */
    public static function format ( CompanyInstance $instance ) {

        $array = $instance->to_array();

        unset($array['properties']);
        unset($array['contacts']);

        $host = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'];

        $array['_links'] = [
            'self'       => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}",
            ],
            'company' => [
                'href' => $host . "/api/company/{$array['companyId']}",
            ],
            'contacts' => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}/contacts",
            ],
            'properties' => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}/properties",
            ],
        ];

        return $array;
    }
}
