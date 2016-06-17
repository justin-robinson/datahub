<?php

namespace Api\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\SourceType;

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

        /**
         * @var $instance CompanyInstance
         */
        // add instances back to hal response
        foreach ( $instances as $instance ) {

            // find all external ids for this instance
            $externalIds = [];
            foreach ( $instance->get_properties() as $sortOrder ) {
                foreach ( $sortOrder as $propertyName ) {
                    foreach ( $propertyName as $property ) {
                        $sourceType = SourceType::fetch_by_id($property->sourceTypeId);

                        // refinery has multiple types named refinery:bol and such
                        $sourceName = explode(':', $sourceType->name)[0];

                        // add this source id to the array
                        $externalIds[$sourceName][$property->sourceId] = $property->sourceId;
                    }
                }
            }
            // reindex array by ints
            foreach ( $externalIds as &$sourceNameArray ) {
                $sourceNameArray = array_values($sourceNameArray);
            }

            // get the sorted properties
            $sortedProperties = $instance->sort_properties();

            $instance = InstanceFormatter::format($instance);

            $instance['properties'] = $sortedProperties;

            $instance['externalIds'] = $externalIds;

            $array['instances'][] = $instance;


        }

        return $array;
    }
}
