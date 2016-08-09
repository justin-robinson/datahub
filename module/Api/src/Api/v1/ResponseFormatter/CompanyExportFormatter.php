<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;
use Scoop\Database\Rows;

/**
 * Class CompanyExportFormatter
 * @package Api\v1\ResponseFormatter
 */
class CompanyExportFormatter
{

    /**
     * @param Rows $companies
     * $companies
     *
     * @return array
     */
    public static function format(Rows $companies)
    {
        $array = [];

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
            $array[$company->companyId] = $companyRecord;
        }

        return array_values($array);
    }
}
