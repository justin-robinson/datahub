<?php

namespace Api\ResponseFormatter;

use DB\Datahub\Company;

/**
 * Class CompanyProfileFormatter
 * @package Api\ResponseFormatter
 */
class CompanyProfileFormatter {

    /**
     * @param Company $company
     *
     * @return array
     */
    public static function format ( Company $company ) {

        // pull instances off since the formatter kills them
        $instances = $company->get_company_instances();

        // format company into hal response
        $array = CompanyFormatter::format($company);

        $array['instances'] = [];

        // add instances back to hal response
        foreach ( $instances as $instance ) {

            // get the sorted properties
            $sortedProperties = $instance->sort_properties();

            $instance = InstanceFormatter::format($instance);

            $instance['properties'] = $sortedProperties;

            $array['instances'][] = $instance;
        }

        return $array;
    }
}
