<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class PropertyCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class PropertyCollectionFormatter
{

    /**
     * @param Rows   $properties
     * @param int    $page
     * @param int    $limit
     * @param string $uri
     * @param null   $totalCount
     *
     * @return array
     */
    public static function format(
        Rows $properties,
        $page = 1,
        $limit = 1000,
        $uri = '/api/v1/contact',
        $totalCount = null
    ) {

        $uri = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub') . $uri;
        $totalCount = is_null($totalCount) ? Generic::query('SELECT count(*) AS count FROM companyInstanceProperty')->first()->count : $totalCount;
        $lastPage = ceil($totalCount / $limit);

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $properties->get_num_rows(),
                'offset'  => ($page - 1) * $limit,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $uri,
                ],
                'first' => [
                    'href' => $uri . '?page=1',
                ],
                'last'  => [
                    'href' => $uri . '?page=' . $lastPage,
                ],
            ],
            '_embedded' => [
                'properties' => [],
            ],
        ];

        if ($page > 1) {
            $array['_links']['prev'] = [
                'href' => $uri . '?page=' . ($page - 1),
            ];
        }

        if ($page < $lastPage) {
            $array['_links']['next'] = [
                'href' => $uri . '?page=' . ($page + 1),
            ];
        }

        $propertyArray = &$array['_embedded']['properties'];

        foreach ($properties as $property) {
            $propertyArray[] = PropertyFormatter::format($property);
        }

        return $array;
    }
}
