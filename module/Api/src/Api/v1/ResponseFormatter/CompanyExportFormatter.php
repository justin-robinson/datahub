<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;
use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class CompanyExportFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyExportFormatter
{

    /**
     * @param Rows   $companies
     * @param        $page
     * @param        $limit
     * @param        $totalCount
     * @param        $from
     * @param        $to
     * @param string $apiPath
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
        $apiPath = '/api/v1/company/export'
    ) {
        $host = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST');;
        $uri = $host . $apiPath;
        $totalCount = is_null($totalCount) ? (int)Generic::query('SELECT count(*) AS count FROM company')->first()->count : $totalCount;
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

        foreach ( $companies as $company ) {
            /**
             * @var $company Company
             */
            if ( array_key_exists($company->companyId, $array) ) {
                continue;
            }

            $companyRecord = [
                'companyId' => $company->companyId,
                'name' => $company->name,
                'createdAt' => $company->createdAt,
                'updatedAt' => $company->updatedAt,
                'refineryIds' => [],
                'instanceIds' => [],
                'industries'  => [],
            ];

            /**
             * @var $latestInstance CompanyInstance
             * @var $latestProperty CompanyInstanceProperty[]
             */
            // the last instance to be updated
            $latestInstance = $company->get_company_instances()->first();
            // array ( indexed by property name ) of last updated properties for this company
            $latestProperties = [];
            // array ( indexed by source type id ) of property source types
            $sourceTypes = [];
            foreach ( SourceType::fetch_all() as $sourceType ) {
                /**
                 * @var $sourceType SourceType
                 */
                $sourceTypes[$sourceType->sourceTypeId] = $sourceType;
            }

            foreach ( $company->get_company_instances() as $instance ) {
                /**
                 * @var $instance CompanyInstance
                 */

                // update the updated at if this instance is newer than the company
                $companyRecord['updatedAt'] = ($companyRecord['updatedAt'] < $instance->updatedAt) ? $instance->updatedAt : $companyRecord['updatedAt'];

                if ( $instance->updatedAt <= $latestInstance->updatedAt ) {
                    $companyRecord['url'] = $instance->url;
                    $companyRecord['stateCode'] = $instance->get_state()->code;
                    $companyRecord['stockSymbol'] = $instance->stockSymbol;
                    $companyRecord['tickerExchange'] = $instance->tickerExchange;
                }

                // add this instance id
                $companyRecord['instanceIds'][$instance->companyInstanceId] = true;

                foreach ( $instance->get_properties() as $property ) {
                    /**
                     * @var $property CompanyInstanceProperty
                     */
                    // update the updateAt if this property is newer than the company or instance
                    $companyRecord['updatedAt'] = ($companyRecord['updatedAt'] < $property->updatedAt) ? $property->updatedAt : $companyRecord['updatedAt'];

                    // ensure we have a latest property for this property name
                    if ( !array_key_exists($property->name, $latestProperties) ){
                        $latestProperties[$property->name] = $property;
                    }

                    // update the company record with the latest property value
                    $propertyTime = new \DateTime($property->updatedAt);
                    $latestTime = new \DateTime($latestProperties[$property->name]->updatedAt);
                    if ( $propertyTime >= $latestTime ) {
                        $latestProperties[$property->name] = $property;
                        $companyRecord[$property->name] = $property->value;
                    }

                    // add this external id
                    if ( array_key_exists($property->sourceTypeId, $sourceTypes) ) {
                        // but only refinery ids
                        if ( strpos($sourceTypes[$property->sourceTypeId]->name, 'refinery') !== false ) {
                            $companyRecord['refineryIds'][$property->sourceId] = true;
                        }
                    }

                    // add industry
                    if ( $property->name === 'industry' ) {
                        $companyRecord['industries'][$property->value] = true;
                    }
                }
            }

            $companyRecord['refineryIds'] = array_keys($companyRecord['refineryIds']);
            $companyRecord['instanceIds'] = array_keys($companyRecord['instanceIds']);
            $companyRecord['industries'] = array_keys($companyRecord['industries']);
            $array['_embedded']['companies'][] = $companyRecord;
        }

        return array_values($array);
    }
}
