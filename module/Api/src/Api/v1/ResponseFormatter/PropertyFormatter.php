<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;

/**
 * Class CompanyInstancePropertyFormatter
 * @package Api\v1\ResponseFormatter
 */
class PropertyFormatter {

    /**
     * @param Company $property
     *
*@return array
     */
    public static function format (CompanyInstanceProperty $property) {

        $uri = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . '/api/v1/';

        $array = $property->to_array();

        $array['sourceType'] = SourceType::fetch_by_id($property->sourceTypeId);

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
