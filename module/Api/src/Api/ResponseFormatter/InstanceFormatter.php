<?php

namespace Api\ResponseFormatter;

use DB\Datahub\CompanyInstance;
use DB\Datahub\SourceType;

/**
 * Class InstanceFormatter
 */
class InstanceFormatter {

    /**
     * @param \DB\Datahub\CompanyInstance $instance
     *
     * @return array
     */
    public static function format ( CompanyInstance $instance ) {

        $array = $instance->to_array(false);

        $array['channelIds'] = [];
        foreach ( $instance->get_channel_ids() as $channelId ) {
            $array['channelIds'][] = $channelId->channel_id;
        }

        // find all external ids for this instance
        $array['properties'] = [];
        $externalIds = [];
        foreach ( $instance->get_properties() as $sortOrder ) {
            foreach ( $sortOrder as $propertyName ) {
                foreach ( $propertyName as $property ) {
                    $sourceType = SourceType::fetch_by_id($property->sourceTypeId);

                    // refinery has multiple types named refinery:bol and such
                    $sourceName = explode(':', $sourceType->name)[0];

                    // add this source id to the array
                    $externalIds[$sourceName][$property->sourceId] = $property->sourceId;
                    $array['properties'][$property->name][] = PropertyFormatter::format($property);
                }
            }
        }
        // reindex array by ints
        foreach ( $externalIds as &$sourceNameArray ) {
            $sourceNameArray = array_values($sourceNameArray);
        }
        $array['externalIds'] = $externalIds;

        $array['state'] = $instance->get_state();

        $host = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'];

        $array['_links'] = [
            'self'       => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}",
            ],
            'company' => [
                'href' => $host . "/api/company/{$array['companyId']}",
            ],
            'contacts' => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}/contacts",
            ],
            'properties' => [
                'href' => $host . "/api/instance/{$array['companyInstanceId']}/properties",
            ],
        ];

        return $array;
    }
}
