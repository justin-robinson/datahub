<?php
/**
 *  Let's get rid of all of the crap and prepare the rest for import!
 *  requires the path : /usr/local/bizj/dHubWorkSpace
 */
if (($handle = fopen('/usr/local/bizj/dHubWorkSpace/bridgetree_dump', "r")) !== false) {
    $parsedFile   = fopen('/usr/local/bizj/dHubWorkSpace/parsed.csv', 'w');
    $headerRaw    = fgetcsv($handle, 0, "|");
    $headerSource = [];
    foreach ($headerRaw as $key => $value) {
        $headerSource[$key] = str_replace('|', '', $value);
    }

    $headerProcessed = [];

    $colsToKeep = [
        'CompanyId',
        'Name',
        'Ticker',
        'TickerExchange',
        'Addr1',
        'Addr2',
        'City',
        'State',
        'ZipCode',
        'Country',
        'OfficePhone1',
        'Url',
        'LastStoryDate',
    ];
    foreach ($headerSource as $k => $value) {
        if (in_array($value, $colsToKeep)) {
            $headerProcessed[$k] = $value;
        }
    }

    // write the header row
    fputcsv($parsedFile, $headerProcessed);

    while ($recordRaw = fgetcsv($handle, 0, '|')) {
        $recordProcessed = [];
        foreach ($recordRaw as $k => $v) {
            if (array_key_exists($k, $headerProcessed)) {
                $recordProcessed[$k] = trim($v, '|');
            }
        }
        if (!empty($recordProcessed[52])) {
            fputcsv($parsedFile, $recordProcessed);
        }
    }
    fclose($parsedFile);
    fclose($handle);
}
