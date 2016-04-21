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
            $data['InternalId'],
            null,
            $data['GenId'],
            (empty( $data['SourceID']) ? 'Refinery' : 'Refinery:' . $data['SourceID']),
            $data['Name'],
            $data['Ticker'],
            $data['TickerExchange'],
            $data['DateModified'],
            $data['Addr1'],
            $data['Addr2'],
            $data['City'],
            $data['State'],
            $data['PostalCode'], // validate
            $data['Country'], // validate
            $data['Lat'],
            $data['Lon'],
            $data['OfficePhone1'],
            $data['Url'],
            true,
            $data['Sic'],
            0,
        ];

    }

}
