<?php

namespace Console\Controller;

use Console\Countries;
use Console\CsvIterator;
use Console\DB\Connection\DB;
use Console\Importer\Refinery;
use Scoop\Database\Connection;
use Scoop\Database\Model\Generic;

/**
 * Class CronController
 * @package Console\Controller
 */
class CronController extends AbstractActionController {

    /**
     * @throws \Console\DB\Error\ConfigException
     */
    public function exportReconAction () {

        // how many hours are we going back?
        // default: 60 minutes
        $days = (int)$this->getRequest()->getParam('days');
        $days = $days >= 0 ? $days : 0;
        $hours = (int)$this->getRequest()->getParam('hours');
        $hours = $hours >= 0 ? $hours : 0;
        $minutes = (int)$this->getRequest()->getParam('minutes');
        $minutes = $minutes >= 0 ? $minutes : 0;

        $minutes = ((($days*24) + $hours) * 60) + $minutes;
        $minutes = $minutes >= 0 ? $minutes : 60;

        // that looks like a good spot to save a file
        $timestamp = time();
        $csvFilePath = "/tmp/datahub-cron-recon-dump-{$timestamp}.csv";

        // tell em where it's at
        echo $csvFilePath . PHP_EOL;

        // get something to write to deez ladies
        $csvFileHandle = new CsvIterator( $csvFilePath, 'w' );

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
            "Description"
        ];

        // each row in the elastic dump needs another row telling it to what to do with the data it's
        // about to get
        $elasticActionRow = json_encode([
            "create" => [
                "_index" => 'companies',
                "_type"  => 'company',
            ],
        ]) . "\n";

        // write the header rows to the csv
        $csvFileHandle->fputcsv( $headers );

        // get our hardcoded lists of countries
        $countries = Countries::getAll();

        // connect to the recon db
        $dbConfig = $this->config['pdo']['db02'];
        $dbConfig['database'] = $dbConfig['dbname'];

        $connection = new Connection($dbConfig);

        $results = Generic::query(
            "SELECT
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
                sic.SIC,
                descr.Description
              FROM
                recon.Org org
                LEFT JOIN recon.OrgAddress addr  ON ( org.id = addr.OrgId )
                LEFT JOIN recon.OrgPhone   phone ON ( org.id = phone.OrgId )
                LEFT JOIN recon.OrgUrl     url   ON ( org.id = url.OrgId )
                LEFT JOIN recon.OrgSIC     sic   ON ( org.id = sic.OrgId )
                LEFT JOIN recon.OrgDesc    descr ON ( org.id = descr.OrgId )
              WHERE
                (
                  org.DateModified      > (NOW() - INTERVAL ? MINUTE )
                  OR addr.DateModified  > (NOW() - INTERVAL ? MINUTE )
                  OR phone.DateModified > (NOW() - INTERVAL ? MINUTE )
				  OR url.DateModified   > (NOW() - INTERVAL ? MINUTE )
				  OR sic.DateModified   > (NOW() - INTERVAL ? MINUTE )
				  OR descr.DateModified > (NOW() - INTERVAL ? MINUTE )
				)
                AND addr.City IS NOT NULL
                AND addr.City != ''
                AND org.Name != ''
              ORDER BY
                org.QName",
            [$minutes, $minutes, $minutes, $minutes, $minutes, $minutes],
            $connection);

        if ( $results === false ) {
            return null;
        }

        $elasticChunkNumber = 0;
        // parse each row into a csv and json file
        foreach ( $results as $index => $row ) {

            // chunk elastic bulk data into 50000 entries
            if ( $index % 50000 === 0 ) {
                ++$elasticChunkNumber;
                $jsonFilePath = "/tmp/datahub-cron-recon-dump-{$timestamp}-{$elasticChunkNumber}.json";
                $jsonFileHandle = new \SplFileObject($jsonFilePath, 'w');
                echo $jsonFilePath . PHP_EOL;
            }
            $row->TickerExchange = strpos( $row->TickerExchange, 'NASDAQ' ) !== false ? 'NASDAQ' : $row->TickerExchange;
            $row->TickerExchange = strpos( $row->TickerExchange, 'York Stock' ) !== false ? 'NYSE' : $row->TickerExchange;
            $row->ExternalId = strlen( $row->ExternalId ) > 12 ? $row->ExternalId : '';
            $row->Name = trim( preg_replace( '/\s+/', ' ', $row->Name ) );

            // get the country names
            // normalize the col for array searching
            $processed = strtoupper( $row->Country );
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
            if( !empty($row->OfficePhone1) ) {
                // remove all but digits
                $phone = preg_replace( '/\D/', '', $row->OfficePhone1 );

                // take off the leading 1 if it's not american
                $phoneLength = strlen( $phone );
                if( ($phoneLength > 10) && (substr( $phone, 0, 1 ) === '1') ) {
                    $phone = substr( $phone, 1, $phoneLength - 1 );
                }
            }

            // grab OrgUrl Data, normalise and tack on
            $url = '';
            if( !empty($row->Url) ) {
                // add http to those lacking either http or https
                $url = strpos( $row->Url, 'http' ) === 0 ? $row->Url : 'http://' . $row->Url;
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
                $row->id,
                $row->ExternalId,
                $row->SourceId,
                $row->Name,
                $row->Ticker,
                $row->TickerExchange,
                $row->DateModified,
                trim( preg_replace( '/\s+/', ' ', $row->Address1 ) ),
                trim( preg_replace( '/\s+/', ' ', $row->Address2 ) ),
                trim( preg_replace( '/\s+/', ' ', $row->City ) ),
                trim( preg_replace( '/\s+/', ' ', $row->State ) ),
                trim( preg_replace( '/\s+/', ' ', $row->ZipCode ) ),
                $countryCode,
                trim( preg_replace( '/\s+/', ' ', $row->Lat ) ),
                trim( preg_replace( '/\s+/', ' ', $row->Lon ) ),
                $phone,
                $url,
                $row->SIC,
                $row->Description
            ];
            $csvFileHandle->fputcsv($outputLine);
            $jsonFileHandle->fwrite($elasticActionRow);
            $jsonFileHandle->fwrite(json_encode(array_combine($headers, $outputLine)) . "\n");
        }

        // import the new data into meroveus
        $importer = new Refinery();
        list($companiesProcessed, $instancesProcessed) = $importer->import($csvFilePath);

        //printf("Imported: %s\t%s companies%s\t%s instances%s", PHP_EOL,$companiesProcessed,PHP_EOL,$instancesProcessed,PHP_EOL);
        echo "Raw data: " . PHP_EOL . PHP_EOL;
        var_export($results->to_array());

    }

}
