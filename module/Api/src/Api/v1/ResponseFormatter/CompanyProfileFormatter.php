<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;

/**
 * Class CompanyProfileFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyProfileFormatter {

    /**
     * @param Company $company
     *
     * @return array
     */
    public static function format (Company $company) {

        // format company into hal response
        $array = CompanyFormatter::format($company);

        $array['instances'] = [];

        /**
         * @var $instance CompanyInstance
         */
        // add instances back to hal response
        foreach ($company->get_company_instances() as $instance) {
            $array['instances'][] = InstanceFormatter::format($instance);
        }

        return $array;
    }
}
