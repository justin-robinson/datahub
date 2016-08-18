<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\DhIndustryBizjChannelMap;
use DB\Datahub\SourceType;

/**
 * Class CompanyProfileFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyProfileFormatter
{

    /**
     * @param Company $company
     *
     * @return array
     */
    public static function format(Company $company)
    {

        // format company into hal response
        $array = CompanyFormatter::format($company);

        /**
         * @var $latestInstance CompanyInstance
         * @var $latestProperty CompanyInstanceProperty[]
         */
        // the last instance to be updated
        $latestInstance = $company->get_latest_instance();

        $array['properties'] = [
            'updatedAt'   => ($array['updatedAt'] < $latestInstance->updatedAt) ? $latestInstance->updatedAt : $array['updatedAt'],
            'externalIds' => [],
            'industries'  => [],
            'channelIds'  => [],
        ];

        // array ( indexed by source type id ) of property source types
        $sourceTypes = [];
        foreach ( SourceType::fetch_all() as $sourceType ) {
            /**
             * @var $sourceType SourceType
             */
            $sourceTypes[$sourceType->sourceTypeId] = $sourceType;
        }

        // add all properties from the latest instance
        foreach ( $latestInstance->get_properties() as $property) {
            $array['properties'][$property->name] = $property->value;
        }

        foreach ( $company->get_company_instances() as $instance ) {
            /**
             * @var $instance CompanyInstance
             */

            // get the channel ids for each instance
            foreach ( $instance->get_channel_ids() as $channelId ) {
                /**
                 * @var $channelId DhIndustryBizjChannelMap
                 */
                $array['properties']['channelIds'][$channelId->channel_id] = true;
            }

            // add this instance id
            $array['properties']['externalIds']['instance'][$instance->companyInstanceId] = true;

            foreach ( $instance->get_properties() as $property ) {
                /**
                 * @var $property CompanyInstanceProperty
                 */
                // update the updateAt if this property is newer than the company or instance
                $array['properties']['updatedAt'] = ($array['properties']['updatedAt'] < $property->updatedAt) ? $property->updatedAt : $array['properties']['updatedAt'];

                // add this external id
                if ( array_key_exists($property->sourceTypeId, $sourceTypes) ) {

                    preg_match('/([\w]*):.*/', $sourceTypes[$property->sourceTypeId]->name, $matches);
                    // but only refinery ids
                    if ( array_key_exists(1, $matches) ) {
                        $array['properties']['externalIds'][$matches[1]][$property->sourceId] = true;
                    }
                }

                // add industry
                if ( $property->name === 'industry' ) {
                    $array['properties']['industries'][$property->value] = true;
                }
            }
        }

        foreach ( $array['properties']['externalIds'] as &$externalIds ) {
            $externalIds = array_keys($externalIds);
        }
        $array['properties']['industries'] = array_keys($array['properties']['industries']);
        $array['properties']['channelIds'] = array_keys($array['properties']['channelIds']);

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
