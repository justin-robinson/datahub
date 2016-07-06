<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class CompanyProfileCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyProfileCollectionFormatter
{

    /**
     * @param Rows $companies
     * @param      $page
     * @param      $limit
     * @param      $totalCount
     * @param      $from
     * @param      $to
     * @param      $apiPath path to api endpoint
     *
     * @return array
     */
    public static function format(
        Rows $companies,
        $page,
        $limit,
        $totalCount,
        $from,
        $to,
        $apiPath = '/api/v1/company/profile'
    ) {

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST');;
        $uri = $host . $apiPath;
        $totalCount = is_null($totalCount) ? Generic::query('SELECT count(*) AS count FROM company')->first()->count : $totalCount;
        $lastPage = ceil($totalCount / $limit);

        $path = parse_url(FormatterHelpers::get_server_variable('REQUEST_URI'), PHP_URL_PATH);
        $selfQueryParams = [
            'from'  => $from,
            'to'    => $to,
            'limit' => $limit,
            'page'  => $page,
        ];

        $firstQueryParams = $selfQueryParams;
        $firstQueryParams['page'] = 1;

        $lastQueryParams = $selfQueryParams;
        $lastQueryParams['page'] = $lastPage;

        $array = [
            'count'     => [
                'total'    => $totalCount,
                'current'  => $companies->get_num_rows(),
                'offset'   => ($page - 1) * $limit,
                'nextPage' => ($page < $lastPage) ? $page + 1 : null,
                'lastPage' => $lastPage,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $host . $path . '?' . http_build_query($selfQueryParams),
                ],
                'first' => [
                    'href' => $uri . '?' . http_build_query($firstQueryParams),
                ],
                'last'  => [
                    'href' => $uri . '?' . http_build_query($lastQueryParams),
                ],
            ],
            '_embedded' => [
                'companies' => [],
            ],
        ];

        if ($page > 1) {
            $prevQueryParams = $selfQueryParams;
            $prevQueryParams['page'] = $page - 1;
            $array['_links']['prev'] = [
                'href' => $uri . '?' . http_build_query($prevQueryParams),
            ];
        }

        if ($page < $lastPage) {
            $nextQueryParams = $selfQueryParams;
            $nextQueryParams['page'] = $page + 1;
            $array['_links']['next'] = [
                'href' => $uri . '?' . http_build_query($nextQueryParams),
            ];
        }

        foreach ($companies as $company) {
            $array['_embedded']['companies'][] = CompanyProfileFormatter::format($company);
        }

        return $array;
    }
}
