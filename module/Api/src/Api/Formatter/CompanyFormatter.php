<?php

namespace Api\Formatter;

use DB\Datahub\Company;

/**
 * Class CompanyFormatter
 * @package Api\Formatter
 */
class CompanyFormatter {

    /**
     * @param Company $company
     *
     * @return array
     */
    public static function format ( Company $company ) {

        $host = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'];
        $uri = $host . '/api/company';

        $array = $company->to_array();
        unset($array['instances']);
        $array['_links'] = [
            'self'      => [
                'href' => $host . $_SERVER['REQUEST_URI']
            ],
            'instances' => [
                'href' => $uri . "/{$array['companyId']}/instances",
            ],
            'profile'   => [
                'href' => $uri . "/{$array['companyId']}/profile",
            ],
        ];

        return $array;
    }
}
