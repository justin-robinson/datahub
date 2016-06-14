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

        $array['_links'] = [
            'self'       => [
                'href' => "/api/instance/{$array['companyInstanceId']}",
            ],
            'company' => [
                'href' => "/api/company/{$array['companyId']}",
            ],
            'properties' => [
                'href' => "/api/instance/{$array['companyInstanceId']}/properties",
            ],
        ];

        return $array;
    }
}
