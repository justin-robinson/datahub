<?php

namespace Api\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;

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
    public static function format (Company $company) {

        // pull instances off since the formatter kills them
        $instances = $company->get_company_instances();

        // format company into hal response
        $array = CompanyFormatter::format($company);

        $array['instances'] = [];

        /**
         * @var $instance CompanyInstance
         */
        // add instances back to hal response
        foreach ($instances as $instance) {
            $array['instances'][] = InstanceFormatter::format($instance);
        }

        return $array;
    }
}
