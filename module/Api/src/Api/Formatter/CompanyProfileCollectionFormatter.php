<?php

namespace Api\Formatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

class CompanyProfileCollectionFormatter {

    public static function format ( Rows $companies, $page, $limit, $totalCount, $from, $to ) {

        $host = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'];
        $uri = $host . '/api/company/profile';
        $totalCount = is_null( $totalCount ) ? Generic::query( 'SELECT count(*) AS count FROM company' )->first()->count : $totalCount;
        $lastPage = ceil( $totalCount / $limit );

        $path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
        $queryParams = [
            'from' => $from,
            'to'   => $to,
            'page' => $page,
        ];

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $companies->get_num_rows(),
                'offset'  => ($page-1) * $limit,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $host . $path . '?' . http_build_query($queryParams),
                ],
                'first' => [
                    'href' => $uri . '?page=1',
                ],
                'last'  => [
                    'href' => $uri . '?page=' . $lastPage,
                ],
            ],
            '_embedded' => [
                'companies' => [ ],
            ],
        ];

        if( $page > 1 ) {
            $array['_links']['prev'] = [
                'href' => $uri . '?page=' . ($page - 1),
            ];
        }

        if( $page < $lastPage ) {
            $array['_links']['next'] = [
                'href' => $uri . '?page=' . ($page + 1),
            ];
        }

        foreach ( $companies as $company ) {
            $array['_embedded']['companies'][] = CompanyProfileFormatter::format( $company );
        }

        return $array;
    }
}
