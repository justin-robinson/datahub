<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;
use \DB\Datahub\CompanyInstanceProperty;
use LRUCache\LRUCache;

/**
 * Class ImportRefinery
 * @package Console\Record\Formatter\Formatters
 */
class ImportRefinery {

    use FormatterTrait;

    /**
     * @var \LRUCache\LRUCache
     */
    static $marketsCache;

    /**
     * @var \LRUCache\LRUCache
     */
    static $statesCache;

    /**
     * @param $data
     *
     * @return \DB\Datahub\Company
     */
    public function format ( $data ) {

        $this->init();

        $data['TickerExchange'] = strpos( $data['TickerExchange'], 'NASDAQ' ) ? 'NASDAQ' : $data['TickerExchange'];
        $data['TickerExchange'] = strpos( $data['TickerExchange'], 'York Stock' ) ? 'NYSE' : $data['TickerExchange'];

        $data['OfficePhone1'] = '1' . $data['OfficePhone1'] . ' x1234';


        // get phone extension
        // matches x. 123, ext. 123
        // period and spacing is optional
        // 'x' and 'ext' are case insensitive
        // number of digits is infinite
        $phoneNumber = $data['OfficePhone1'];
        if ( preg_match('/(x|(e(xt)?\.?))\s*(\d*)/i', $phoneNumber, $phoneMatches, PREG_OFFSET_CAPTURE) ) {
            // 4th group is the extension
            // 0 index is the text
            // 1 is the offset for the group into the original string
            $phoneExtension = $phoneMatches[4][0];

            // remove entire extension text from phone number
            $phoneNumber = substr($phoneNumber, 0, $phoneMatches[0][1]);
        } else {
            $phoneExtension = '';
        }

        // ensure we only have digits
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // ensure phone number is 10 digits and extract country code
        $phoneLength = strlen($phoneNumber);
        if ( $phoneLength > 10 ) {
            $countryCode = substr($phoneNumber, 0, $phoneLength - 10);
            $phoneNumber = substr($phoneNumber, strlen($countryCode), 10);
        } else {
            $countryCode = 1;
        }

        if ( strlen($data['State']) > 2 ) {
            $stateKey = strtolower($data['State']);
            $stateCode = self::$statesCache->get($stateKey);
            if ( !$stateCode ) {
                $usState = \DB\Datahub\UsState::fetch_one_where("LOWER(state_long) = ?", [$stateKey]);
                if ( $usState ) {
                    $stateCode = strtolower($usState->state_postal);
                    self::$statesCache->put($stateKey, $stateCode);
                }
            }
        } else {
            $stateCode = strtolower($data['State']);
        }
        if ( $stateCode ) {
            $marketCode = $this->get_market_by_city_state($data['City'], $stateCode);
            if ( !empty($marketCode) ) {
                $marketCode = $marketCode->market_code;
            } else {
                $marketCode = '';
            }
        } else {
            $marketCode = '';
        }


        $company = new \DB\Datahub\Company(
            [
                'employeeCount'    => 0,
                'generateCode'     => $data['GenId'],
                'isActive'         => true,
                'name'             => $data['Name'],
                'sourceModifiedAt' => $data['DateModified'],
                'stockSymbol'      => $data['Ticker'],
                'url'              => $data['Url'],
            ]);

        $companyInstance = new \DB\Datahub\CompanyInstance(
            [
                'sicCode'        => $data['Sic'],
                'tickerExchange' => $data['TickerExchange'],
                'url'            => $data['Url'],
                'marketCode'     => $marketCode,
            ] );

        $sourceName = 'refinery' . strtolower((empty($data['SourceID']) ? '' : ":{$data['SourceID']}"));

        $propertyArray = [
            'sourceTypeId' => self::$sourceTypes[$sourceName]->sourceTypeId,
            'sourceId' => $data['InternalId'],
        ];

        $propertyArray['name'] = 'address1';
        $propertyArray['value'] = $data['Addr1'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'address2';
        $propertyArray['value'] = $data['Addr2'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'city';
        $propertyArray['value'] = $data['City'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'country';
        $propertyArray['value'] = $data['Country'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'latitude';
        $propertyArray['value'] = $data['Lat'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'longitude';
        $propertyArray['value'] = $data['Lon'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'state';
        $propertyArray['value'] = $data['State'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'zipCode';
        $propertyArray['value'] = $data['PostalCode'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'phoneExtension';
        $propertyArray['value'] = $phoneExtension;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'phoneNumber';
        $propertyArray['value'] = $phoneNumber;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'phoneCountryCode';
        $propertyArray['value'] = $countryCode;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $company->add_company_instance( $companyInstance);
        
        return $company;

    }

    private function init () {
        if ( is_null ( self::$marketsCache) ) {
            self::$marketsCache = new LRUCache(50);
        }

        if ( is_null( self::$statesCache) ) {
            self::$statesCache = new LRUCache(50);
        }
    }

    private function get_market_by_city_state ( $city, $stateCode ) {

        $marketKey = strtolower($city.$stateCode);

        $market = self::$marketsCache->get($marketKey);

        if ( !$market ) {
            $market = \DB\Datahub\Market::query(
            "SELECT
              m.*
            FROM
              `datahub`.`msa_pmsa` msa
              INNER JOIN `datahub`.`market_msa_pmsa_map` USING ( sa_code )
              INNER JOIN `datahub`.`market` m USING ( market_id )
            WHERE
              msa.sa_name = ?
            LIMIT 1",
            [ "{$city}, {$stateCode}" ]
            );

            if ( $market ) {
                $market = $market->first();
            }

            self::$marketsCache->put($marketKey, $market);

        }


        return $market;
    }

}
