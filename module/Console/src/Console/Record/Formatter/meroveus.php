<?php

namespace Console\Record\Formatter;

/**
 * Class Meroveus
 */
class Meroveus implements FormatterInterface {

    /**
     * @param $data
     * @return array
     */
    public function format ( $data ) {

        return [

            ':refinery_id'        => isset( $data['refinery_id'] ) ? $data['refinery_id'] : 'noData',
            ':meroveus_id'        => isset( $data['meroveusId'] ) ? $data['meroveusId'] : 'noData',
            ':generate_code'      => isset( $data['generate_codeId'] ) ? $data['generate_codeId'] : 'noData',
            ':record_source'      => isset( $data['sourceId'] ) ? $data['sourceId'] : 'noData',
            ':company_name'       => isset( $data['firm-name_static'] ) ? $data['firm-name_static'] : 'noData',
            ':public_ticker'      => isset( $data['idk'] ) ? $data['idk'] : 'noData',
            ':ticker_exchange'    => isset( $data['idk'] ) ? $data['idk'] : 'noData',
            ':source_modified_at' => isset( $data['idk'] ) ? $data['idk'] : 'noData',
            ':address1'           => isset( $data['street-address_static'] ) ? $data['street-address_static'] : 'noData',
            ':address2'           => isset( $data['street-line2-address_static'] ) ? $data['street-line2-address_static'] : 'noData',
            ':city'               => isset( $data['street-city_static'] ) ? $data['street-city_static'] : 'noData',
            ':state'              => isset( $data['street-state_static'] ) ? $data['street-state_static'] : null,
            ':postal_code'        => isset( $data['street-zip_static'] ) ? $data['street-zip_static'] : null, // validate
            ':country'            => isset( $data['street-country_static'] ) ? $data['street-country_static'] : null, // validate
            ':latitude'           => isset( $data['coordinates']['lat'] ) ? $data['coordinates']['lat'] : null,
            ':longitude'          => isset( $data['coordinates']['long'] ) ? $data['coordinates']['long'] : null,
            ':phone'              => isset( $data['contact-phone_static'] ) ? $data['contact-phone_static'] : null,
            ':website'            => isset( $data['contact-website_static'] ) ? $data['contact-website_static'] : null,
            ':is_active'          => true,
            ':sic_code'           => isset( $data['sicCode'] ) ? $data['sicCode'] : null,
            ':employee_count'     => 0,
            ':created_at'         => 'NOW()',
            ':updated_at'         => 'NOW()',
            ':deleted_at'         => null,

        ];
    }

}