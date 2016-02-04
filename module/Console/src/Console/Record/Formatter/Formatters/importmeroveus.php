<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;

/**
 * Class ImportMeroveus
 * @package Console\Record\Formatter\Formatters
 */
class ImportMeroveus {

    use FormatterTrait;

    /**
     * @param $data
     *
     * @return array
     */
    public function format ( $data ) {
        $data['TickerExchange'] = strpos( $data['TickerExchange'], 'NASDAQ') ? 'NASDAQ' : $data['TickerExchange'];
        $data['TickerExchange'] = strpos( $data['TickerExchange'], 'York Stock') ? 'NYSE' : $data['TickerExchange'];

        return [
            
            ':refinery_id'        => $data['InternalId'],
            ':meroveus_id'        => null,
            ':generate_code'      => $data['GenId'],
            ':record_source'      => (empty( $data['SourceID']) ? 'Refinery' : 'Refinery:' . $data['SourceID']),
            ':company_name'       => $data['Name'],
            ':public_ticker'      => $data['Ticker'],
            ':ticker_exchange'    => $data['TickerExchange'],
            ':source_modified_at' => $data['DateModified'],
            ':address1'           => $data['Addr1'],
            ':address2'           => $data['Addr2'],
            ':city'               => $data['City'],
            ':state'              => $data['State'],
            ':postal_code'        => $data['PostalCode'], // validate
            ':country'            => $data['Country'], // validate
            ':latitude'           => $data['Lat'],
            ':longitude'          => $data['Lon'],
            ':phone'              => $data['OfficePhone1'],
            ':website'            => $data['Url'],
            ':is_active'          => true,
            ':sic_code'           => $data['Sic'],
            ':employee_count'     => 0,
        ];

    }

}
