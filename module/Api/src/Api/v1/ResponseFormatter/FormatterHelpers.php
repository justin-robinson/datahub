<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\Dataset;

/**
 * Class FormatterHelpers
 *
 * @package Api\v1\ResponseFormatter
 */
class FormatterHelpers
{

    /**
     * @param array|null $server
     *
     * @return string
     */
    public static function get_http_protocol(array $server = null)
    {

        $server = is_null($server) ? $_SERVER : $server;

        return (!empty($server['HTTPS']) && $server['HTTPS'] !== 'off' || (isset($server['SERVER_PORT']) && $server['SERVER_PORT'] == 443)) ? "https://" : "http://";
    }

    /**
     * @param      $name
     * @param null $default
     *
     * @return null
     */
    public static function get_server_variable($name, $default = null)
    {

        return array_key_exists($name, $_SERVER) ? $_SERVER[$name] : $default;
    }

    /**
     * @param Dataset $set
     *
     * @return array
     */
    public static function getMapData(Dataset $set)
    {
        $entries = [];
        foreach ($set->entries->to_array() as $entry) {
            $result = [];
            // get company that match the sourceId and are meroveus
            $company = Company::fetch_by_source_name_and_id('meroveus', $entry['sourceId']);
            /* @var $instance \DB\Datahub\CompanyInstance */
            $instance = $company->fetch_company_instances()->first();
            // fetch the properties
            $instance->fetch_properties();
            // extract the values
            $result['companyName'] = $company->name;
            $result['sourceId']    = $entry['sourceId'];
            $result['address1']    = $instance->get_property('address1') ? $instance->get_property('address1')->value : null;
            $result['city']        = $instance->get_property('city') ? $instance->get_property('city')->value : null;
            $result['country']     = $instance->get_property('country') ? $instance->get_property('country')->value : null;
            $result['latitude']    = $instance->get_property('latitude') ? $instance->get_property('latitude')->value : null;
            $result['longitude']   = $instance->get_property('longitude') ? $instance->get_property('longitude')->value : null;
            $result['state']       = $instance->get_property('state') ? $instance->get_property('state')->value : null;
            $result['zipCode']     = $instance->get_property('zipCode') ? $instance->get_property('zipCode')->value : null;

            array_push($entries, $result);
        }

        return $entries;

    }
}
