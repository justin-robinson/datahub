#!/usr/bin/env php
<?php
/**
 *  __    __                                           ______                                __                                __
|  \  |  \                                         /      \                              |  \                              |  \
| $$  | $$ _______    ______    ______    ______  |  $$$$$$\ ______    _______   _______  \$$  ______   _______    ______  | $$
| $$  | $$|       \  /      \  /      \  /      \ | $$_  \$$/      \  /       \ /       \|  \ /      \ |       \  |      \ | $$
| $$  | $$| $$$$$$$\|  $$$$$$\|  $$$$$$\|  $$$$$$\| $$ \   |  $$$$$$\|  $$$$$$$|  $$$$$$$| $$|  $$$$$$\| $$$$$$$\  \$$$$$$\| $$
| $$  | $$| $$  | $$| $$  | $$| $$   \$$| $$  | $$| $$$$   | $$    $$ \$$    \  \$$    \ | $$| $$  | $$| $$  | $$ /      $$| $$
| $$__/ $$| $$  | $$| $$__/ $$| $$      | $$__/ $$| $$     | $$$$$$$$ _\$$$$$$\ _\$$$$$$\| $$| $$__/ $$| $$  | $$|  $$$$$$$| $$
 \$$    $$| $$  | $$| $$    $$| $$       \$$    $$| $$      \$$     \|       $$|       $$| $$ \$$    $$| $$  | $$ \$$    $$| $$
  \$$$$$$  \$$   \$$| $$$$$$$  \$$        \$$$$$$  \$$       \$$$$$$$ \$$$$$$$  \$$$$$$$  \$$  \$$$$$$  \$$   \$$  \$$$$$$$ \$$
                    | $$
                    | $$
                     \$$
 *
 *
 *  Let's get rid of all of the crap and prepare the rest for import.
 *  requires the path : /usr/local/bizj/dHubWorkSpace
 *  requires something to parse as well
 *  note: for the time being I've had to hand convert the bridgetree_dump file to "backtick" delimited
 *  and remove all semicolons to get it to work.
 * @todo next up is a script to do that on a cron
 *      1. convert all existing backticks to apostrophes
 *      2. convert the group "|:|" to backtick
 *      2a. convert semi colons to spaces
 *      3. ?
 *      4. Go have a sandwich.
 *      5. Think about how you wish that you could do something about the initial export
 *
 */
// stage one
// filter out records that we don't want
//

if (($handle = fopen('/usr/local/bizj/dHubWorkSpace/bridgetree_dumpBacktik', "r")) !== false) {

    $headerRaw    = fgetcsv($handle, 0, "`");
    $headerSource = [];

    foreach ($headerRaw as $key => $value) {

        $headerSource[$key] = $value;

    }

    $headerProcessed = [];
    $colsToKeep      = [
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
            // PostalCode reminds us that it's international
            $headerProcessed[$k] = $value === 'ZipCode' ? 'PostalCode' : $value;

        }

    }

    $processedArray = [];
    array_push($processedArray, $headerProcessed);
    // write the header row

    while ($recordRaw = fgetcsv($handle, 0, "`")) {

        $recordProcessed = [];
        foreach ($recordRaw as $k => $v) {

            if (array_key_exists($k, $headerProcessed)) {

                $recordProcessed[$k] = $v;

            }

        }
        // we only care about records with LastStoryDate 'cause these are referenced in a story
        if (!empty($recordProcessed[26]) && strtotime($recordProcessed[26])) {

            array_push($processedArray, $recordProcessed);

        }

    }

    fclose($handle);
}

///
/// stage 2 normalize
///


$finalArray        = [];
$referenceCols     = array_shift($processedArray);
$referenceCols[13] = 'Country';

array_push($finalArray, $referenceCols);

/**
 * $referenceCols as of 11-23:
   [
      [0] => "CompanyId"
      [1] => "Name"
      [2] => "Ticker"
      [3] => "TickerExchange"
      [5] => "Addr1"
      [6] => "Addr2"
      [8] => "City"
      [9] => "State"
      [10] => "PostalCode"
      [11] => "Country"
      [21] => "OfficePhone1"
      [24] => "Url"
      [26] => "LastStoryDate"
      [13] => "Country"
    ]
 */

$countries = [
    'AF' => 'AFGHANISTAN',
    'AL' => 'ALBANIA',
    'DZ' => 'ALGERIA',
    'AS' => 'AMERICAN SAMOA',
    'AD' => 'ANDORRA',
    'AO' => 'ANGOLA',
    'AI' => 'ANGUILLA',
    'AQ' => 'ANTARCTICA',
    'AG' => 'ANTIGUA AND BARBUDA',
    'AR' => 'ARGENTINA',
    'AM' => 'ARMENIA',
    'AW' => 'ARUBA',
    'AU' => 'AUSTRALIA',
    'AT' => 'AUSTRIA',
    'AZ' => 'AZERBAIJAN',
    'BS' => 'BAHAMAS',
    'BH' => 'BAHRAIN',
    'BD' => 'BANGLADESH',
    'BB' => 'BARBADOS',
    'BY' => 'BELARUS',
    'BE' => 'BELGIUM',
    'BZ' => 'BELIZE',
    'BJ' => 'BENIN',
    'BM' => 'BERMUDA',
    'BT' => 'BHUTAN',
    'BO' => 'BOLIVIA',
    'BA' => 'BOSNIA AND HERZEGOVINA',
    'BW' => 'BOTSWANA',
    'BV' => 'BOUVET ISLAND',
    'BR' => 'BRAZIL',
    'IO' => 'BRITISH INDIAN OCEAN TERRITORY',
    'BN' => 'BRUNEI DARUSSALAM',
    'BG' => 'BULGARIA',
    'BF' => 'BURKINA FASO',
    'BI' => 'BURUNDI',
    'KH' => 'CAMBODIA',
    'CM' => 'CAMEROON',
    'CA' => 'CANADA',
    'CV' => 'CAPE VERDE',
    'KY' => 'CAYMAN ISLANDS',
    'CF' => 'CENTRAL AFRICAN REPUBLIC',
    'TD' => 'CHAD',
    'CL' => 'CHILE',
    'CN' => 'CHINA',
    'CX' => 'CHRISTMAS ISLAND',
    'CC' => 'COCOS (KEELING) ISLANDS',
    'CO' => 'COLOMBIA',
    'KM' => 'COMOROS',
    'CG' => 'CONGO',
    'CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
    'CK' => 'COOK ISLANDS',
    'CR' => 'COSTA RICA',
    'CI' => 'COTE D IVOIRE',
    'HR' => 'CROATIA',
    'CU' => 'CUBA',
    'CY' => 'CYPRUS',
    'CZ' => 'CZECH REPUBLIC',
    'DK' => 'DENMARK',
    'DJ' => 'DJIBOUTI',
    'DM' => 'DOMINICA',
    'DO' => 'DOMINICAN REPUBLIC',
    'TP' => 'EAST TIMOR',
    'EC' => 'ECUADOR',
    'EG' => 'EGYPT',
    'SV' => 'EL SALVADOR',
    'GQ' => 'EQUATORIAL GUINEA',
    'ER' => 'ERITREA',
    'EE' => 'ESTONIA',
    'ET' => 'ETHIOPIA',
    'FK' => 'FALKLAND ISLANDS (MALVINAS)',
    'FO' => 'FAROE ISLANDS',
    'FJ' => 'FIJI',
    'FI' => 'FINLAND',
    'FR' => 'FRANCE',
    'GF' => 'FRENCH GUIANA',
    'PF' => 'FRENCH POLYNESIA',
    'TF' => 'FRENCH SOUTHERN TERRITORIES',
    'GA' => 'GABON',
    'GM' => 'GAMBIA',
    'GE' => 'GEORGIA',
    'DE' => 'GERMANY',
    'GG' => 'GUERNSEY',
    'GH' => 'GHANA',
    'GI' => 'GIBRALTAR',
    'GR' => 'GREECE',
    'GL' => 'GREENLAND',
    'GD' => 'GRENADA',
    'GP' => 'GUADELOUPE',
    'GU' => 'GUAM',
    'GT' => 'GUATEMALA',
    'GN' => 'GUINEA',
    'GW' => 'GUINEA-BISSAU',
    'GY' => 'GUYANA',
    'HT' => 'HAITI',
    'HM' => 'HEARD ISLAND AND MCDONALD ISLANDS',
    'VA' => 'HOLY SEE (VATICAN CITY STATE)',
    'HN' => 'HONDURAS',
    'HK' => 'HONG KONG',
    'HU' => 'HUNGARY',
    'IS' => 'ICELAND',
    'IN' => 'INDIA',
    'ID' => 'INDONESIA',
    'IR' => 'IRAN',
    'IQ' => 'IRAQ',
    'IE' => 'IRELAND',
    'IL' => 'ISRAEL',
    'IT' => 'ITALY',
    'JM' => 'JAMAICA',
    'JP' => 'JAPAN',
    'JO' => 'JORDAN',
    'KZ' => 'KAZAKSTAN',
    'KE' => 'KENYA',
    'KI' => 'KIRIBATI',
    'KP' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
    'KR' => 'KOREA',
    'KW' => 'KUWAIT',
    'KG' => 'KYRGYZSTAN',
    'LA' => 'LAO PEOPLES DEMOCRATIC REPUBLIC',
    'LV' => 'LATVIA',
    'LB' => 'LEBANON',
    'LS' => 'LESOTHO',
    'LR' => 'LIBERIA',
    'LY' => 'LIBYAN ARAB JAMAHIRIYA',
    'LI' => 'LIECHTENSTEIN',
    'LT' => 'LITHUANIA',
    'LU' => 'LUXEMBOURG',
    'MO' => 'MACAU',
    'MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
    'MG' => 'MADAGASCAR',
    'MW' => 'MALAWI',
    'MY' => 'MALAYSIA',
    'MV' => 'MALDIVES',
    'ML' => 'MALI',
    'MT' => 'MALTA',
    'MH' => 'MARSHALL ISLANDS',
    'MQ' => 'MARTINIQUE',
    'MR' => 'MAURITANIA',
    'MU' => 'MAURITIUS',
    'YT' => 'MAYOTTE',
    'MX' => 'MEXICO',
    'FM' => 'MICRONESIA, FEDERATED STATES OF',
    'MD' => 'MOLDOVA, REPUBLIC OF',
    'MC' => 'MONACO',
    'MN' => 'MONGOLIA',
    'MS' => 'MONTSERRAT',
    'MA' => 'MOROCCO',
    'MZ' => 'MOZAMBIQUE',
    'MM' => 'MYANMAR',
    'NA' => 'NAMIBIA',
    'NR' => 'NAURU',
    'NP' => 'NEPAL',
    'NL' => 'NETHERLANDS',
    'AN' => 'NETHERLANDS ANTILLES',
    'NC' => 'NEW CALEDONIA',
    'NZ' => 'NEW ZEALAND',
    'NI' => 'NICARAGUA',
    'NE' => 'NIGER',
    'NG' => 'NIGERIA',
    'NU' => 'NIUE',
    'NF' => 'NORFOLK ISLAND',
    'MP' => 'NORTHERN MARIANA ISLANDS',
    'NO' => 'NORWAY',
    'OM' => 'OMAN',
    'PK' => 'PAKISTAN',
    'PW' => 'PALAU',
    'PS' => 'PALESTINIAN TERRITORY, OCCUPIED',
    'PA' => 'PANAMA',
    'PG' => 'PAPUA NEW GUINEA',
    'PY' => 'PARAGUAY',
    'PE' => 'PERU',
    'PH' => 'PHILIPPINES',
    'PN' => 'PITCAIRN',
    'PL' => 'POLAND',
    'PT' => 'PORTUGAL',
    'PR' => 'PUERTO RICO',
    'QA' => 'QATAR',
    'RE' => 'REUNION',
    'RO' => 'ROMANIA',
    'RU' => 'RUSSIA',
    'RW' => 'RWANDA',
    'SH' => 'SAINT HELENA',
    'KN' => 'SAINT KITTS AND NEVIS',
    'LC' => 'SAINT LUCIA',
    'PM' => 'SAINT PIERRE AND MIQUELON',
    'VC' => 'SAINT VINCENT AND THE GRENADINES',
    'WS' => 'SAMOA',
    'SM' => 'SAN MARINO',
    'ST' => 'SAO TOME AND PRINCIPE',
    'SA' => 'SAUDI ARABIA',
    'SN' => 'SENEGAL',
    'SC' => 'SEYCHELLES',
    'SL' => 'SIERRA LEONE',
    'SG' => 'SINGAPORE',
    'SK' => 'SLOVAKIA',
    'SI' => 'SLOVENIA',
    'SB' => 'SOLOMON ISLANDS',
    'SO' => 'SOMALIA',
    'ZA' => 'SOUTH AFRICA',
    'GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
    'ES' => 'SPAIN',
    'LK' => 'SRI LANKA',
    'SD' => 'SUDAN',
    'SR' => 'SURINAME',
    'SJ' => 'SVALBARD AND JAN MAYEN',
    'SZ' => 'SWAZILAND',
    'SE' => 'SWEDEN',
    'CH' => 'SWITZERLAND',
    'SY' => 'SYRIAN ARAB REPUBLIC',
    'TW' => 'TAIWAN',
    'TJ' => 'TAJIKISTAN',
    'TZ' => 'TANZANIA',
    'TH' => 'THAILAND',
    'TG' => 'TOGO',
    'TK' => 'TOKELAU',
    'TO' => 'TONGA',
    'TT' => 'TRINIDAD AND TOBAGO',
    'TN' => 'TUNISIA',
    'TR' => 'TURKEY',
    'TM' => 'TURKMENISTAN',
    'TC' => 'TURKS AND CAICOS ISLANDS',
    'TV' => 'TUVALU',
    'UG' => 'UGANDA',
    'UA' => 'UKRAINE',
    'AE' => 'UNITED ARAB EMIRATES',
    'GB' => 'UNITED KINGDOM',
    'US' => 'UNITED STATES',
    'UY' => 'URUGUAY',
    'UZ' => 'UZBEKISTAN',
    'VU' => 'VANUATU',
    'VE' => 'VENEZUELA',
    'VN' => 'VIETNAM',
    'VG' => 'VIRGIN ISLANDS, BRITISH',
    'VI' => 'VIRGIN ISLANDS, U.S.',
    'WF' => 'WALLIS AND FUTUNA',
    'EH' => 'WESTERN SAHARA',
    'YE' => 'YEMEN',
    'YU' => 'YUGOSLAVIA',
    'ZM' => 'ZAMBIA',
    'ZW' => 'ZIMBABWE',
];

$secondChanceCountries = [
    'GB' => 'UK',
    'NL' => 'THE NETHERLANDS',
];

foreach ($processedArray as $record) {

    // abbreviate the exchange names
    // strpos returns 0 if the matched portion is at the beginning of the string
    // hence the weird search strings
    $record[3] = strpos($record[3], 'NASDAQ')     ? 'NASDAQ' : $record[3];
    $record[3] = strpos($record[3], 'York Stock') ? 'NYSE'   : $record[3];

    if ($record[11] !== '') {
        // get the country names
        // normalize the col for array searching
        $raw       = $record[11];
        $processed = strtoupper($raw);
        $splode    = explode("(", $processed);
        $processed = trim($splode[0]);
        $processed = preg_replace('/,.*/', '', $processed);
        $processed = preg_replace("/\([^)]+\)/", "", $processed);

        // is the country in the array
        if (in_array($processed, $countries)) {

            $record[13] = array_search($processed, $countries);

        } else {

            // try again
            if (in_array($processed, $secondChanceCountries)) {

                $record[13] = array_search($processed, $secondChanceCountries);

            } else {
                // no match so we don't care
                continue;

            }
        }

        array_push($finalArray, $record);

    } else {
        // assume that all records that have an empty country col are US
        $record[13] = 'US';
        array_push($finalArray, $record);

    }
}

$normalizedFile = fopen('/usr/local/bizj/dHubWorkSpace/normalized.csv', 'w');

foreach ($finalArray as $row) {

    unset($row[11]);
    // sort the row to move the country code up a bit
    ksort($row);

    fputcsv($normalizedFile, $row);

}

fclose($normalizedFile);
