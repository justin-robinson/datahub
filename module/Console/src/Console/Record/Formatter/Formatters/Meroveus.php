<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;

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

        return [

            ':refinery_id'                       => isset($data['refinery_id']) ? $data['refinery_id'] : null,
            ':meroveus_id'                       => isset($data['meroveusId']) ? $data['meroveusId'] : null,
            ':generate_code'                     => isset($data['generate_codeId']) ? $data['generate_codeId'] : null,
            ':record_source'                     => isset($data['sourceId']) ? $data['sourceId'] : null,
            ':company_name'                      => isset($data['firm-name_static']) ? $data['firm-name_static'] : '',
            ':public_ticker'                     => isset($data['idk']) ? $data['idk'] : null,
            ':ticker_exchange'                   => isset($data['idk']) ? $data['idk'] : null,
            ':source_modified_at'                => isset($data['idk']) ? $data['idk'] : null,
            ':address1'                          => isset($data['street-address_static']) ? $data['street-address_static'] : null,
            ':address2'                          => isset($data['street-line2-address_static']) ? $data['street-line2-address_static'] : null,
            ':city'                              => isset($data['street-city_static']) ? $data['street-city_static'] : null,
            ':state'                             => isset($data['street-state_static']) ? $data['street-state_static'] : null,
            ':postal_code'                       => isset($data['street-zip_static']) ? $data['street-zip_static'] : null,
            // validate
            ':country'                           => isset($data['street-country_static']) ? $data['street-country_static'] : null,
            // validate
            ':latitude'                          => isset($data['coordinates']['lat']) ? $data['coordinates']['lat'] : null,
            ':longitude'                         => isset($data['coordinates']['long']) ? $data['coordinates']['long'] : null,
            ':phone'                             => isset($data['contact-phone_static']) ? $data['contact-phone_static'] : null,
            ':website'                           => isset($data['contact-website_static']) ? $data['contact-website_static'] : null,
            ':is_active'                         => true,
            ':sic_code'                          => isset($data['sicCode']) ? $data['sicCode'] : null,
            ':employee_count'                    => 0,
            ':created_at'                        => 'NOW()',
            ':updated_at'                        => 'NOW()',
            ':deleted_at'                        => null,
            ':universal_revenue_volume_static'   => empty($target['universal-revenue-volume_static']) ? null : $target['universal-revenue-volume_static'],
            ':universal_employee_count_static'   => empty($target['universal-employee-count_static']) ? null : $target['universal-employee-count_static'],
            ':universal_employee_local_static'   => empty($target['universal-employee-local_static']) ? null : $target['universal-employee-local_static'],
            ':universal_established_year_static' => empty($target['universal-established-year_static']) ? null : $target['universal-established-year_static'],
            ':universal_profile_blob_static'     => empty($target['universal-profile-blob_static']) ? null : $target['universal-profile-blob_static'],

        ];
    }

}
