<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\MeroveusIndustry;
use DB\Datahub\SourceType;
use DB\Datahub\State;

/**
 * Class ImportRefinery
 * @package Console\Record\Formatter\Formatters
 */
class ImportRefinery
{

    use FormatterTrait;

    /**
     * @param $data
     *
     * @return \DB\Datahub\Company
     */
    public function format($data)
    {

        $this->init();

        $data['TickerExchange'] = (strpos($data['TickerExchange'],
                'NASDAQ') === false) ? $data['TickerExchange'] : 'NASDAQ';
        $data['TickerExchange'] = (strpos($data['TickerExchange'],
                'York Stock') === false) ? $data['TickerExchange'] : 'NYSE';

        // get phone extension
        // matches x. 123, ext. 123
        // period and spacing is optional
        // 'x' and 'ext' are case insensitive
        // number of digits is infinite
        $phoneNumber = $data['OfficePhone1'];
        if (preg_match('/(x|(e(xt)?\.?))\s*(\d*)/i', $phoneNumber, $phoneMatches, PREG_OFFSET_CAPTURE)) {
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
        if ($phoneLength > 10) {
            $countryCode = substr($phoneNumber, 0, $phoneLength - 10);
            $phoneNumber = substr($phoneNumber, strlen($countryCode), 10);
        } else {
            $countryCode = 1;
        }

        $stateKey = strtolower($data['State']);
        $state = self::$statesCache->get($stateKey);
        if (!$state) {
            $state = State::fetch_one_where("LOWER(name) = ? OR LOWER(code) = ?", [$stateKey, $stateKey]);
            self::$statesCache->put($stateKey, $state);
        }
        $stateCode = $state ? strtolower($state->code) : false;
        if ($stateCode) {
            $marketCode = $this->get_market_by_city_state($data['City'], $stateCode);
            if (!empty($marketCode)) {
                $marketCode = $marketCode->market_code;
            } else {
                $marketCode = '';
            }
        } else {
            $marketCode = '';
        }

        $company = new Company(
            [
                'employeeCount' => 0,
                'isActive'      => true,
                'name'          => $data['Name'],
                'createdAt'     => $data['DateModified'],
                'updatedAt'     => $data['DateModified'],
                'deletedAt'    => Company::$dBColumnDefaultValuesArray['deletedAt'],
            ]);

        $companyInstance = new CompanyInstance(
            [
                'generateCode'   => $data['GenId'],
                'name'           => $data['Name'],
                'sicCode'        => $data['Sic'],
                'stateId'        => $state ? $state->stateId : null,
                'stockSymbol'    => $data['Ticker'],
                'tickerExchange' => $data['TickerExchange'],
                'url'            => $data['Url'],
                'marketCode'     => $marketCode,
                'createdAt'      => $data['DateModified'],
                'updatedAt'      => $data['DateModified'],
                'deletedAt'    => CompanyInstance::$dBColumnDefaultValuesArray['deletedAt'],
            ]);

        $sourceName = 'refinery' . strtolower((empty($data['SourceID']) ? '' : ":{$data['SourceID']}"));
        $source = SourceType::fetch_one_where('name = ?', [$sourceName]);

        $propertyArray = [
            'sourceTypeId' => $source->sourceTypeId,
            'sourceId'     => $data['InternalId'],
            'createdAt'    => $data['DateModified'],
            'updatedAt'    => $data['DateModified'],
            'deletedAt'    => CompanyInstanceProperty::$dBColumnDefaultValuesArray['deletedAt'],
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

        $propertyArray['name'] = 'description';
        $propertyArray['value'] = $data['Description'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'latitude';
        $propertyArray['value'] = $data['Lat'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'longitude';
        $propertyArray['value'] = $data['Lon'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'state';
        $propertyArray['value'] = isset($state->name) ? $state->name : '';
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

        if ($companyInstance->sicCode) {
            $meroveusIndustries = MeroveusIndustry::query(
                "SELECT
                    mI.*
                FROM
                  sic_code_meroveus_industry_map scmim
                  JOIN meroveusIndustry mI ON ( scmim.meroveus_industry_id = mI.meroveusIndustryId )
                WHERE
                  scmim.sic = ?",
                [$companyInstance->sicCode]
            );
            if ($meroveusIndustries) {
                foreach ($meroveusIndustries as $meroveusIndustry) {
                    $propertyArray['name'] = 'industry';
                    $propertyArray['value'] = $meroveusIndustry->industry;
                    $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));
                }
            }
        }

        $company->add_company_instance($companyInstance);

        return $company;

    }

}
