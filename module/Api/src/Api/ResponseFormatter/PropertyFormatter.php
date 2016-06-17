<?php

namespace Api\ResponseFormatter;

use DB\Datahub\CompanyInstanceProperty;

/**
 * Class CompanyInstancePropertyFormatter
 * @package Api\ResponseFormatter
 */
class PropertyFormatter {

    /**
     * @param Company $property
     *
*@return array
     */
    public static function format (CompanyInstanceProperty $property) {

        $uri = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . '/api/';

        $array = $property->to_array();

        $array['_links'] = [
            'self'      => [
                'href' => $uri . "property/{$array['companyInstancePropertyId']}",
            ],
            'instance' => [
                'href' => $uri . "instance/{$array['companyInstanceId']}",
            ],
        ];

        return $array;
    }
}
