<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\CompanyInstance;
use DB\Datahub\SourceType;

/**
 * Class InstanceFormatter
 */
class InstanceFormatter
{

    /**
     * @param \DB\Datahub\CompanyInstance $instance
     *
     * @return array
     */
    public static function format(CompanyInstance $instance)
    {

        $array = $instance->to_array(false);

        $array['channelIds'] = [];
        foreach ($instance->get_channel_ids() as $channelId) {
            $array['channelIds'][] = $channelId->channel_id;
        }

        // find all external ids for this instance
        $array['properties'] = [];
        $externalIds = [];
        foreach ($instance->get_properties() as $property) {
            $sourceType = SourceType::fetch_by_id($property->sourceTypeId);

            // refinery has multiple types named refinery:bol and such
            $sourceName = explode(':', $sourceType->name)[0];

            // add this source id to the array
            $externalIds[$sourceName][$property->sourceId] = $property->sourceId;
            $array['properties'][$property->name][] = PropertyFormatter::format($property);
        }
        // reindex array by ints
        foreach ($externalIds as &$sourceNameArray) {
            $sourceNameArray = array_values($sourceNameArray);
        }
        $array['externalIds'] = (object)$externalIds;

        $array['state'] = (object)$instance->get_state();
        $array['sortedProperties'] = (object)$instance->sort_properties();

        $array['contacts'] = [];
        foreach ($instance->get_contacts() as $contact) {
            $array['contacts'][] = ContactFormatter::format($contact);
        }

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub');

        $array['_links'] = [
            'self'       => [
                'href' => $host . "/api/v1/instance/{$array['companyInstanceId']}",
            ],
            'company'    => [
                'href' => $host . "/api/v1/company/{$array['companyId']}",
            ],
            'contacts'   => [
                'href' => $host . "/api/v1/instance/{$array['companyInstanceId']}/contacts",
            ],
            'properties' => [
                'href' => $host . "/api/v1/instance/{$array['companyInstanceId']}/properties",
            ],
            'profile' => [
                'href' => $host . "/api/v1/instance/{$array['companyInstanceId']}/profile",
            ],
        ];

        return $array;
    }
}
