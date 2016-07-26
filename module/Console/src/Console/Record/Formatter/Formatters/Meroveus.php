<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;
use DB\Datahub\State;
use Scoop\Database\Literal;

/**
 * Class Meroveus
 */
class Meroveus
{

    use FormatterTrait;

    /**
     * @param $data
     *
     * @return array
     */
    public function format($data)
    {

        $this->init();

        $phoneNumber = isset($data['contact-phone_static']) ? $data['contact-phone_static'] : '';
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

        $stateKey = strtolower(isset($data['street-state_static']) ? $data['street-state_static'] : '');
        $state = self::$statesCache->get($stateKey);
        if (!$state) {
            $state = State::fetch_one_where("LOWER(name) = ? OR LOWER(code) = ?", [$stateKey, $stateKey]);
            self::$statesCache->put($stateKey, $state);
        }
        $stateCode = $state ? strtolower($state->code) : false;
        if ($stateCode) {
            $marketCode = $this->get_market_by_city_state(isset($data['street-city_static']) ? $data['street-city_static'] : null,
                $stateCode);
            if (!empty($marketCode)) {
                $marketCode = $marketCode->market_code;
            } else {
                $marketCode = '';
            }
        } else {
            $marketCode = '';
        }

        $createdAt = isset($data['createdAt']) ? $data['createdAt'] : new Literal('NOW()');
        $updatedAt = isset($data['updatedAt']) ? $data['updatedAt'] : new Literal('NOW()');

        $company = new Company(
            [
                'employeeCount' => empty($target['universal-employee-count_static']) ? 0 : [$target['universal-employee-count_static']],
                'isActive'      => true,
                'name'          => isset($data['firm-name_static']) ? $data['firm-name_static'] : '',
                'createdAt'     => $createdAt,
                'updatedAt'     => $updatedAt,
            ]);

        $companyInstance = new CompanyInstance(
            [
                'generateCode'   => isset($data['generate_codeId']) ? $data['generate_codeId'] : null,
                'name'           => isset($data['firm-name_static']) ? $data['firm-name_static'] : '',
                'sicCode'        => isset($data['sicCode']) ? $data['sicCode'] : null,
                'stateId'        => $state ? $state->stateId : null,
                'stockSymbol'    => isset($data['idk']) ? $data['idk'] : null,
                'tickerExchange' => isset($data['idk']) ? $data['idk'] : null,
                'url'            => isset($data['contact-website_static']) ? $data['contact-website_static'] : null,
                'marketCode'     => $marketCode,
                'createdAt'      => $createdAt,
                'updatedAt'      => $updatedAt,
            ]);

        $source = SourceType::fetch_one_where("name = 'meroveus'");

        $propertyArray = [
            'sourceTypeId' => $source->sourceTypeId,
            'sourceId'     => isset($data['meroveusId']) ? $data['meroveusId'] : null,
            'createdAt'    => $createdAt,
            'updatedAt'    => $updatedAt,
        ];

        $propertyArray['name'] = 'address1';
        $propertyArray['value'] = isset($data['street-address_static']) ? $data['street-address_static'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'address2';
        $propertyArray['value'] = isset($data['street-line2-address_static']) ? $data['street-line2-address_static'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'city';
        $propertyArray['value'] = isset($data['street-city_static']) ? $data['street-city_static'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'country';
        $propertyArray['value'] = isset($data['street-country_static']) ? $data['street-country_static'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        /**
         * @TODO    search $data keys for business-services-blob_YEAR for descriptions
         * @todo    actully don't do this
         */
//        $propertyArray['name'] = 'description';
//        $propertyArray['value'] = $data['Description'];
//        $companyInstance->add_property( new CompanyInstanceProperty( $propertyArray ) );

        $propertyArray['name'] = 'latitude';
        $propertyArray['value'] = isset($data['coordinates']['lat']) ? $data['coordinates']['lat'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'longitude';
        $propertyArray['value'] = isset($data['coordinates']['long']) ? $data['coordinates']['long'] : null;
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'state';
        $propertyArray['value'] = isset($state->name) ? $state->name : '';
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'zipCode';
        $propertyArray['value'] = isset($data['street-zip_static']) ? $data['street-zip_static'] : null;
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

        $propertyArray['name'] = 'revenue';
        $propertyArray['value'] = empty($target['universal-revenue-volume_static']) ? null : $target['universal-revenue-volume_static'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'employeeCountTotal';
        $propertyArray['value'] = empty($target['universal-employee-count_static']) ? null : $target['universal-employee-count_static'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'employeeCountInstance';
        $propertyArray['value'] = empty($target['universal-employee-local_static']) ? null : $target['universal-employee-local_static'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'yearEstablished';
        $propertyArray['value'] = empty($target['universal-established-year_static']) ? null : $target['universal-established-year_static'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $propertyArray['name'] = 'description';
        $propertyArray['value'] = empty($target['universal-profile-blob_static']) ? null : $target['universal-profile-blob_static'];
        $companyInstance->add_property(new CompanyInstanceProperty($propertyArray));

        $company->add_company_instance($companyInstance);

        return $company;

    }

}
