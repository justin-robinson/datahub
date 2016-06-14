<?php

namespace Api\Formatter;

use DB\Datahub\CompanyInstanceProperty;

/**
 * Class CompanyInstancePropertyFormatter
 * @package Api\Formatter
 */
class CompanyInstancePropertyFormatter {

    /**
     * @param Company $property
     *
*@return array
     */
    public static function format (CompanyInstanceProperty $property) {

        $array = $property->to_array();

        $array['_links'] = [
            'self'      => [
                'href' => "/api/property/{$array['companyInstancePropertyId']}",
            ],
            'instance' => [
                'href' => "/api/instance/{$array['companyInstanceId']}",
            ],
        ];

        return $array;
    }
}
