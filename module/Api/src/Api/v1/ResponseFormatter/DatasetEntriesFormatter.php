<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 8/2/16
 * Time: 2:37 PM
 */

namespace Api\v1\ResponseFormatter;

use DB\Datahub\DatasetEntries;

class DatasetEntriesFormatter
{
    public static function format(DatasetEntries $entry, $change = false, $type = null)
    {

        $array = $entry->to_array();
        
        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub');

        $array['_links'] = [
            'self' => [
                'href' => $host . '/api/v1/dataset/entry' . ($change ? '/' . $entry->id : ''),
            ],

        ];
        
        return $array;
    }
}
