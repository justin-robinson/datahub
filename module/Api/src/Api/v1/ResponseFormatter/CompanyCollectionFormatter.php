<?php

namespace Api\v1\ResponseFormatter;

use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class CompanyCollectionFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyCollectionFormatter
{

    /**
     * @param Rows $companies
     * @param int  $page
     * @param int  $limit
     *
     * @return array
     */
    public static function format(Rows $companies, $page = 1, $limit = 1000)
    {

        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST') . '/api/v1/company';
        $totalCount = Generic::query('SELECT count(*) AS count FROM company')->first()->count;
        $lastPage = ceil($totalCount / $limit);

        $array = [
            'count'     => [
                'total'   => $totalCount,
                'current' => $companies->get_num_rows(),
                'offset'  => ($page - 1) * $limit,
            ],
            '_links'    => [
                'self'  => [
                    'href' => $host,
                ],
                'first' => [
                    'href' => $host . '?page=1',
                ],
                'last'  => [
                    'href' => $host . '?page=' . $lastPage,
                ],
            ],
            '_embedded' => [
                'company' => [],
            ],
        ];

        if ($page > 1) {
            $array['_links']['prev'] = [
                'href' => $host . '?page=' . ($page - 1),
            ];
        }

        if ($page < $lastPage) {
            $array['_links']['next'] = [
                'href' => $host . '?page=' . ($page + 1),
            ];
        }

        $companyArray = &$array['_embedded']['company'];

        foreach ($companies as $company) {
            $companyArray[] = CompanyFormatter::format($company);
        }

        return $array;
    }
}
