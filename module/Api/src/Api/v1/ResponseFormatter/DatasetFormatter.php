<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 7/6/16
 * Time: 10:13 AM
 */

namespace Api\v1\ResponseFormatter;


use DB\Datahub\Dataset;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;

/**
 * Class DatasetFormatter
 *
 * @package Api\v1\ResponseFormatter
 */
class DatasetFormatter
{
    /**
     * @param Dataset $set
     *
     * @return array
     */
    public static function format(Dataset $set, $change = false, $type = null)
    {

        // fetch type specific data
        switch ($type) {
            case 'map':
                $entries = DatasetFormatter::getMapData($set);
                break;
            case 'directory':
                $entries = DatasetFormatter::getDirectoryData($set);
                break;
            default:
                if (!is_array($set->entries)) {
                    $entries = empty($set->entries) ? null : $set->entries->to_array(false);
                } else {
                    $entries = empty($set->entries) ? null : $set->entries;
                }
                break;
        }

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub');

        $array = $set->to_array(false);

        $array['entries'] = $entries;

        if ($change) {
            $array['_links'] = [
                'self' => [
                    'href' => $host . FormatterHelpers::get_server_variable('REQUEST_URI') . $set->id,
                ],

            ];
        } else {
            $array['_links'] = [
                'self' => [
                    'href' => $host . FormatterHelpers::get_server_variable('REQUEST_URI'),
                ],

            ];
        }

        return $array;
    }

    public static function getDirectoryData(Dataset $set)
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
            /**
             * company name
             * address
             * phone
             * email (if we have it)
             * website
             */
            $result['companyName']      = $company->name;
            $result['sourceId']         = $entry['sourceId'];
            $result['address1']         = $instance->get_property('address1') ? $instance->get_property('address1')->value : null;
            $result['address2']         = $instance->get_property('address12') ? $instance->get_property('address2')->value : null;
            $result['city']             = $instance->get_property('city') ? $instance->get_property('city')->value : null;
            $result['country']          = $instance->get_property('country') ? $instance->get_property('country')->value : null;
            $result['state']            = $instance->get_property('state') ? $instance->get_property('state')->value : null;
            $result['zipCode']          = $instance->get_property('zipCode') ? $instance->get_property('zipCode')->value : null;
            $result['phoneNumber']      = $instance->get_property('phoneNumber') ? $instance->get_property('phoneNumber')->value : null;
            $result['phoneCountryCode'] = $instance->get_property('phoneCountryCode') ? $instance->get_property('phoneCountryCode')->value : null;
            $result['website']          = $instance->get_property('website') ? $instance->get_property('website')->value : null;
            $result['email']            = $instance->get_property('email') ? $instance->get_property('email')->value : null;

            array_push($entries, $result);
        }

        return $entries;
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