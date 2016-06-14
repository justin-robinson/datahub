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

        $array = $company->to_array();
        unset($array['instances']);
        $array['_links'] = [
            'self'      => [
                'href' => "/api/company/{$array['companyId']}",
            ],
            'instances' => [
                'href' => "/api/company/{$array['companyId']}/instances",
            ],
        ];

        return $array;
    }
}
