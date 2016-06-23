<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class InstanceCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class InstanceCollectionFormatter {

    /**
     * @param Rows   $instances
     * @param int    $page
     * @param int    $limit
     * @param string $uri
     * @param int    $totalCount
     *
     * @return array
     */
    public static function format ( Rows $instances, $page = 1, $limit = 1000, $uri = '/api/v1/instance', $totalCount = null) {

        $uri = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . $uri;
        $totalCount = is_null($totalCount) ? Generic::query('select count(*) as count from companyInstance')->first()->count : $totalCount;
        $lastPage = ceil($totalCount / $limit);

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $instances->get_num_rows(),
                'offset'  => ($page-1) * $limit,
            ],
            '_links' => [
                'self'     => [
                    'href' => $uri,
                ],
                'first'     => [
                    'href' => $uri . '?page=1',
                ],
                'last' => [
                    'href' => $uri . '?page=' . $lastPage,
                ],
            ],
            '_embedded' => [
                'instances' => []
            ]
        ];

        if ( $page > 1 ) {
            $array['_links']['prev'] = [
                'href' => $uri . '?page=' . ($page - 1),
            ];
        }

        if ( $page < $lastPage ) {
            $array['_links']['next'] = [
                'href' => $uri . '?page=' . ($page + 1),
            ];
        }

        $instanceArray = &$array['_embedded']['instances'];

        foreach ( $instances as $instance ) {
            $instanceArray[] = InstanceFormatter::format( $instance );
        }

        return $array;
    }
}
