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
        $selfQueryParams = [
            'from' => $from,
            'to'   => $to,
            'page' => $page,
        ];

        $firstQueryParams = $selfQueryParams;
        $firstQueryParams['page'] = 1;

        $lastQueryParams = $selfQueryParams;
        $lastQueryParams['page'] = $lastPage;

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $companies->get_num_rows(),
                'offset'  => ($page-1) * $limit,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $host . $path . '?' . http_build_query($selfQueryParams),
                ],
                'first' => [
                    'href' => $uri . '?' . http_build_query($firstQueryParams),
                ],
                'last'  => [
                    'href' => $uri . '?'. http_build_query($lastQueryParams),
                ],
            ],
            '_embedded' => [
                'companies' => [ ],
            ],
        ];

        if( $page > 1 ) {
            $prevQueryParams = $selfQueryParams;
            $prevQueryParams['page'] = $page - 1;
            $array['_links']['prev'] = [
                'href' => $uri . '?' . http_build_query($prevQueryParams),
            ];
        }

        if( $page < $lastPage ) {
            $nextQueryParams = $selfQueryParams;
            $nextQueryParams['page'] = $page + 1;
            $array['_links']['next'] = [
                'href' => $uri . '?'. http_build_query($nextQueryParams),
            ];
        }

        foreach ( $companies as $company ) {
            $array['_embedded']['companies'][] = CompanyProfileFormatter::format( $company );
        }

        return $array;
    }
}
