<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class CompanyCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanySearchCollectionFormatter
{

    /**
     * @param Rows $companies
     * @param int  $page
     * @param int  $limit
     *
     * @return array
     */
    public static function format(Rows $companies, $totalCount, $page = 1, $limit = 1000)
    {

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST')
            . parse_url(FormatterHelpers::get_server_variable('REQUEST_URI'), PHP_URL_PATH);
        $lastPage = ceil($totalCount / $limit);

        parse_str(FormatterHelpers::get_server_variable('QUERY_STRING'), $selfQueryParams);
        $selfQueryParams['page'] = $page;
        $selfQueryParams['limit'] = $limit;

        $firstQueryParams = $selfQueryParams;
        $firstQueryParams['page'] = 1;

        $lastQueryParams = $selfQueryParams;
        $lastQueryParams['page'] = $lastPage;



        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $companies->get_num_rows(),
                'offset'  => ($page - 1) * $limit,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $host . '?' . http_build_query($selfQueryParams),
                ],
                'first' => [
                    'href' => $host . '?' . http_build_query($firstQueryParams),
                ],
                'last'  => [
                    'href' => $host . '?' . http_build_query($lastQueryParams),
                ],
            ],
            '_embedded' => [
                'company' => [],
            ],
        ];

        if ($page > 1) {
            $prevQueryParams = $selfQueryParams;
            $prevQueryParams['page']--;
            $array['_links']['prev'] = [
                'href' => $host . '?' . http_build_query($prevQueryParams),
            ];
        }

        if ($page < $lastPage) {
            $nextQueryParams = $selfQueryParams;
            $nextQueryParams['page']++;
            $array['_links']['next'] = [
                'href' => $host . '?' . http_build_query($nextQueryParams),
            ];
        }

        $companyArray = &$array['_embedded']['company'];

        foreach ($companies as $company) {
            $companyArray[] = CompanyFormatter::format($company);
        }

        return $array;
    }
}
