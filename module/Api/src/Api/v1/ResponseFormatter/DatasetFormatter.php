<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 7/6/16
 * Time: 10:13 AM
 */

namespace Api\v1\ResponseFormatter;


use DB\Datahub\Dataset;

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
     * @return array
     */
    public static function format(Dataset $set)
    {

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub');
        $uri  = $host . '/api/v1/dataset';

        $array            = $set->to_array(false);
        $array['entries'] = $set->entries->to_array(false) ?: null;
        $array['_links']  = [
            'self' => [
                'href' => $host . FormatterHelpers::get_server_variable('REQUEST_URI'),
            ],

        ];

        return $array;
    }
}