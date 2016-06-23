<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class ContactCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class ContactCollectionFormatter {

    /**
     * @param Rows   $contacts
     * @param int    $page
     * @param int    $limit
     * @param string $uri
     * @param null   $totalCount
     *
     * @return array
     */
    public static function format ( Rows $contacts, $page = 1, $limit = 1000, $uri = '/api/v1/contact', $totalCount = null) {

        $uri = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . $uri;
        $totalCount = is_null($totalCount) ? Generic::query('select count(*) as count from contact')->first()->count : $totalCount;
        $lastPage = ceil($totalCount / $limit);

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $contacts->get_num_rows(),
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
                'contacts' => []
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

        $contactArray = &$array['_embedded']['contacts'];

        foreach ( $contacts as $contact ) {
            $contactArray[] = ContactFormatter::format( $contact );
        }

        return $array;
    }
}
