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
        
        if (!is_array($entry)) {
            $formattedEntry = empty($entry) ? null : $entry->to_array(false);
        } else {
            $formattedEntry = empty($entry) ? null : $entry;
        }
        
        $host           = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST',
                'hub');
        $array['entry'] = $formattedEntry;
        
        if ($change) {
            $array['_links'] = [
                'self' => [
                    'href' => $host . FormatterHelpers::get_server_variable('REQUEST_URI') . $entry->id,
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
}