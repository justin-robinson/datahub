<?php

namespace Console\Controller;

use Console\Countries;
use Console\CsvIterator;
use Console\DB\Connection\DB;

/**
 * Class CronController
 * @package Console\Controller
 */
class CronController extends AbstractActionController {

    /**
     * @throws \Console\DB\Error\ConfigException
     */
    public function exportReconAction () {

        // how many days are we going back?
        // default: 7
        $daysToLookBack = $this->getRequest()->getParam('days') ?: 7;

        // that looks like a good spot to save a file
        $timestamp = time();
        $csvFilePath = "/tmp/datahub-cron-recon-dump-{$timestamp}.csv";
        $jsonFilePath = "/tmp/datahub-cron-recon-dump-{$timestamp}.json";

        // tell em where it's at
        echo $csvFilePath . PHP_EOL;
        echo $jsonFilePath . PHP_EOL;

        // get something to write to deez ladies
        $csvFileHandle = new CsvIterator( $csvFilePath, 'w' );
        $jsonFileHandle = new \SplFileObject($jsonFilePath, 'w');

        // these are our fancy column names/object properties
        $headers = [
            "InternalId",
            "GenId",
            "SourceID",
            "Name",
            "Ticker",
            "TickerExchange",
            "DateModified",
            "Addr1",
            "Addr2",
            "City",
            "State",
            "PostalCode",
            "Country",
            "Lat",
            "Lon",
            "OfficePhone1",
            "Url",
            "Sic",
        ];

        // each row in the elastic dump needs another row telling it to what to do with the data it's
        // about to get
        $elasticActionRow = json_encode([
            "create" => [
                "_index" => 'companies',
                "_type"  => 'company',
            ],
        ]) . '\n';

        // write the header rows to the csv
        $csvFileHandle->fputcsv( $headers );

        // get our hardcoded lists of countries
        $countries = Countries::getAll();

        // connect to the recon db
        $db = DB::createPdo( $this->config['pdo']['db02'] );

        // gets all organizations and relevant information created in the specified time period
        $sql = "
              SELECT
                org.id,
                org.ExternalId,
                org.SourceId,
                org.Name,
                org.Ticker,
                org.TickerExchange,
                org.DateModified,
                addr.Address1,
                addr.Address2,
                addr.City,
                addr.State,
                addr.ZipCode,
                # assume all empty countries are US
                IF ( addr.Country IS NULL OR addr.Country = '',
                  'United States',
                  addr.Country) AS Country,
                addr.Lat,
                addr.Lon,
                phone.OfficePhone1,
                url.Url,
                sic.SIC
              FROM Org org
                LEFT JOIN OrgAddress addr  ON ( org.id = addr.OrgId AND addr.isPrimary = 1 )
                LEFT JOIN OrgPhone   phone ON ( org.id = phone.OrgId AND phone.isPrimary = 1 )
                LEFT JOIN OrgUrl     url   ON ( org.id = url.OrgId AND url.isPrimary = 1 )
                LEFT JOIN OrgSIC     sic   ON ( org.id = sic.OrgId AND sic.isPrimary = 1 )
              WHERE
                org.DateCreated > (NOW() - INTERVAL {$daysToLookBack} DAY )
                AND addr.City IS NOT NULL
                AND addr.City != ''";

        $db->setAttribute( \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false );

        $results = $db->query( $sql, \PDO::FETCH_ASSOC );

        // parse each row into a csv and json file
        foreach ( $results as $index => $row ) {
            $row['TickerExchange'] = strpos( $row['TickerExchange'], 'NASDAQ' ) !== false ? 'NASDAQ' : $row['TickerExchange'];
            $row['TickerExchange'] = strpos( $row['TickerExchange'], 'York Stock' ) !== false ? 'NYSE' : $row['TickerExchange'];
            $row['ExternalId'] = strlen( $row['ExternalId'] ) > 12 ? $row['ExternalId'] : '';
            $row['Name'] = trim( preg_replace( '/\s+/', ' ', $row['Name'] ) );

            // get the country names
            // normalize the col for array searching
            $processed = strtoupper( $row['Country'] );
            $processed = trim( explode( "(", $processed )[0] );
            $processed = preg_replace( '/,.*/', '', $processed );
            $processed = preg_replace( "/\([^)]+\)/", "", $processed );
            if( isset($countries['first'][$processed]) ) {
                $countryCode = $countries['first'][$processed];
            } else {
                if( isset($countries['second'][$processed]) ) {
                    $countryCode = $countries['second'][$processed];
                } else {
                    // no match so we don't care
                    continue;
                }
            }

            // scrub phone number
            $phone = '';
            if( !empty($row['OfficePhone1']) ) {
                // remove all but digits
                $phone = preg_replace( '/\D/', '', $row['OfficePhone1'] );

                // take off the leading 1 if it's not american
                $phoneLength = strlen( $phone );
                if( ($phoneLength > 10) && (substr( $phone, 0, 1 ) === '1') ) {
                    $phone = substr( $phone, 1, $phoneLength - 1 );
                }
            }

            // grab OrgUrl Data, normalise and tack on
            $url = '';
            if( !empty($row['Url']) ) {
                // add http to those lacking either http or https
                $url = strpos( $row['Url'], 'http' ) === 0 ? $row['Url'] : 'http://' . $row['Url'];
                // remove everything after and including the first comma if there is a comma
                $url = strpos( $url, ',' ) ? substr( $url, 0, strpos( $url, ',' ) ) : $url;
                // remove everything after and including the first space if there is a space
                $url = strpos( $url, ' ' ) ? substr( $url, 0, strpos( $url, ' ' ) ) : $url;

                if( $url === "http:??" ) {
                    $url = '';
                }
            }

            // format and write row to file
            $outputLine = [
                $row['id'],
                $row['ExternalId'],
                $row['SourceId'],
                $row['Name'],
                $row['Ticker'],
                $row['TickerExchange'],
                $row['DateModified'],
                trim( preg_replace( '/\s+/', ' ', $row['Address1'] ) ),
                trim( preg_replace( '/\s+/', ' ', $row['Address2'] ) ),
                trim( preg_replace( '/\s+/', ' ', $row['City'] ) ),
                trim( preg_replace( '/\s+/', ' ', $row['State'] ) ),
                trim( preg_replace( '/\s+/', ' ', $row['ZipCode'] ) ),
                $countryCode,
                trim( preg_replace( '/\s+/', ' ', $row['Lat'] ) ),
                trim( preg_replace( '/\s+/', ' ', $row['Lon'] ) ),
                $phone,
                $url,
                $row['SIC'],
            ];
            $csvFileHandle->fputcsv($outputLine);
            $jsonFileHandle->fwrite($elasticActionRow);
            $jsonFileHandle->fwrite(json_encode(array_combine($headers, $outputLine)) . '\n');
        }

    }

}
