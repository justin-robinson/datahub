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
        // @todo build the name instead of switching
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
        
        $host             = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST',
                'hub');
        $array            = $set->to_array(false);
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
        
        //@todo loop fields to get the return data
        //@todo get the featured data
        $entries         = [];
        $desiredDHFields = json_decode($set->fields, true);
        
        foreach ($set->entries->to_array() as $entry) {
            $customFields = json_decode($entry['meta'], true);
            
            $result = [];
            // get company that match the sourceId and are meroveus
            $company = Company::fetch_by_source_name_and_id('meroveus', $entry['sourceId']);
            /* @var $instance \DB\Datahub\CompanyInstance */
            $instance = $company->fetch_company_instances()->first();
            // fetch the properties
            $instance->fetch_properties();
            // extract the values
            // fetch the desired fields from datahub
            foreach ($desiredDHFields as $field) {
                $result[$field] = $instance->get_property($field) ? $instance->get_property($field)->value : null;
            }
    
            $result['companyName']     = $company->name;
            $result['sourceId']        = $entry['sourceId'];
            $result['logo']            = empty($entry['logo']) ? null : $entry['logo'];
            $result['image']           = empty($entry['image']) ? null : $entry['image'];
            $result['featured']        = $entry['featured'];
            $result['featuredExpires'] = $entry['featuredExpires'];
            $result['promoText']       = $entry['promoText'];
            // set the custom fields
            foreach ($customFields as $key => $value) {
                if(!empty($value)){
                    $result[key($value)] = current($value);
                }
            }
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