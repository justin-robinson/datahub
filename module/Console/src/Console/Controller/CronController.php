<?php

namespace Console\Controller;

use Console\Countries;
use Console\CsvIterator;
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

        // how far back are we looking?
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

        // write the header rows to the csv
        $csvFileHandle->fputcsv( $headers );

        // get our hardcoded lists of countries
        $countries = Countries::getAll();

        // connect to the recon db
        $dbConfig = $this->config['mysql']['db02'];
        $dbConfig['database'] = $dbConfig['dbname'];

        $offset = 0;
        $limit = 10000;
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
                org.QName
              LIMIT ?, ?",
            [$minutes, $minutes, $minutes, $minutes, $minutes, $minutes, $offset, $limit],
            $connection);

        if ( $results === false ) {
            return null;
        }

        while ( ($results = Generic::query(
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
                org.QName
              LIMIT ?, ?",
            [$minutes, $minutes, $minutes, $minutes, $minutes, $minutes, $offset, $limit],
            $connection)) !== false ) {

            // parse each row into a csv and json file
            foreach ( $results as $index => $row ) {

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
            }

            $offset += $limit;
            echo '.';
        }


        // import the new data into meroveus
        echo PHP_EOL . "Importing {$csvFilePath}" . PHP_EOL;
        $importer = new Refinery();
        list($companiesProcessed, $instancesProcessed) = $importer->import($csvFilePath);

        printf("Imported: %s\t%s companies%s\t%s instances%s", PHP_EOL,$companiesProcessed,PHP_EOL,$instancesProcessed,PHP_EOL);

    }

    public function listsForRelatedAction () {
        echo "
 _       _______  _____  _______  _____ (_)(_)(_)(_)
(_)     (_______)(_____)(__ _ __)(_____)(_)(_)(_)(_)
(_)        (_)  (_)___     (_)  (_)___  (_)(_)(_)(_)
(_)        (_)    (___)_   (_)    (___)_(_)(_)(_)(_)
(_)____  __(_)__  ____(_)  (_)    ____(_)_  _  _  _ 
(______)(_______)(_____)   (_)   (_____)(_)(_)(_)(_)
";

        echo "export started: " . date('h:i:s A') . PHP_EOL;

        // how far back are we looking?
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

        // get the mysql connection credentials
        $dbconfig = $this->config['mysql']['reportdb'];
        // create a new mysql connection for our query
        $connection = new Connection(
            [
                'host' => $dbconfig['host'],
                'user' => $dbconfig['user'],
                'password' => $dbconfig['password'],
                'database' => $dbconfig['dbname'],
                'port' => $dbconfig['port'],
            ]);
        // get the lists to be released in the specified range, along with the companies
        $listCompanies = Generic::query(
            "SELECT DISTINCT
              tlr.list_id,
              tlr.rank,
              tlr.object_id,
              tlr.company_name,
              tl.market_id,
              tl.issue_date,
              tl.page_headline,
              concat(p.site, p.path, p.slug, '.html') AS url
            FROM
              bizj.top25_list_row tlr
              JOIN bizj.top25_list tl USING (list_id )
              JOIN bizj.page p USING ( page_id )
            WHERE
              p.release_time BETWEEN (NOW() - INTERVAL ? MINUTE ) AND NOW()
              AND object_id <> 0
            ORDER BY tlr.created_at DESC",
            [$minutes], $connection);

        if ( $listCompanies ) {
            // every row of data needs an elastic action row
            $elasticAction = json_encode(
                [
                    "create" => [
                        "_index" => "lists",
                        "_type"  => 'company_related',
                    ],
                ] );

            $prevListId = $listCompanies->first()->list_id;
            $companies = [];
            $numListsInChunk = 0;
            $chunkNumber = -1;
            // get the companies on each list and add them to the json file
            foreach ($listCompanies as $listCompany) {
                // no id is no bueno
                if (empty($listCompany->list_id)) {
                    echo "no list!" . PHP_EOL;
                    continue;
                }

                // fix for JSON_ERROR_UTF8
                $listCompany->company_name  = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($listCompany->company_name));
                $listCompany->page_headline = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($listCompany->page_headline));

                // write out if we have a new list id
                if ( $prevListId !== $listCompany->list_id ) {

                    // chunk elastic bulk data into 50000 entries
                    if ( $numListsInChunk % 50000 === 0 ) {
                        ++$chunkNumber;
                        $numListsInChunk = 0;
                        $jsonFilePath = "/tmp/datahub-cron-recon-dump-{$timestamp}-{$chunkNumber}.json";
                        $file = new \SplFileObject($jsonFilePath, 'w');
                        echo $jsonFilePath . PHP_EOL;
                    }

                    // add a new list to this chunk
                    ++$numListsInChunk;
                    // add this list to the json file
                    $file->fwrite($elasticAction . PHP_EOL);
                    $file->fwrite(json_encode(['list_id' => $prevListId, 'companies' => $companies]) . PHP_EOL);

                    // reset the companies array
                    $companies = [];
                }
                $prevListId = $listCompany->list_id;
                $company = $listCompany->to_array();
                unset($company['list_id']);
                $companies[] = $company;
            }

            // write out any remaining lists
            if ( !empty($companies) ) {
                $file->fwrite($elasticAction . PHP_EOL);
                $file->fwrite(json_encode(['list_id' => $prevListId, 'companies' => $companies]) . PHP_EOL);
            }
        }

        echo "export ended: " . date('h:i:s A') . PHP_EOL;
    }

}
