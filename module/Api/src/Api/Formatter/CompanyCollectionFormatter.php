<?php

namespace Api\Formatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class CompanyCollectionFormatter
 * @package Api\Formatter
 */
class CompanyCollectionFormatter {

    /**
     * @param Rows $companies
     * @param int  $page
     * @param int  $limit
     *
     * @return array
     */
    public static function format ( Rows $companies, $page = 1, $limit = 1000) {

        $host = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . '/api/company';
        $lastPage = ceil(Generic::query('select count(*) as count from company')->first()->count / $limit);

        $array = [
            '_links' => [
                'self'     => [
                    'href' => $host,
                ],
                'first'     => [
                    'href' => $host . '?page=1',
                ],
                'last' => [
                    'href' => $host . '?page=' . $lastPage,
                ],
            ],
            '_embedded' => [
                'company' => []
            ]
        ];

        if ( $page > 1 ) {
            $array['_links']['prev'] = [
                'href' => $host . '?page=' . ($page - 1),
            ];
        }

        if ( $page < $lastPage ) {
            $array['_links']['next'] = [
                'href' => $host . '?page=' . ($page + 1),
            ];
        }

        $companyArray = &$array['_embedded']['company'];

        foreach ( $companies as $company ) {
            $companyArray[] = CompanyFormatter::format( $company );
        }

        return $array;
    }
}
