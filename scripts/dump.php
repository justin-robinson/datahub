<?php
/**
 * removes
 *      new lines
 * replaces
 *      ` with '
 *      " with '
 * normalises
 *      countries to their country code
 *      urls to http:// or https://
 *      phone to num only
 */
echo "started at " . date('h:i:s A') . PHP_EOL;
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

//@$filename = '/tmp/refineryDump.csv';
 // if you're using vagrant this will "ust work" you will find it under dev/files on your host
//@$filename = '/home/vagrant/files/refineryDump.csv';
@$filename = '~/refineryDumpThatsWorthACrap.csv';

$fd = fopen($filename, 'w');

fputs($fd, '');


//$db = new PDO('mysql:host=reportdb.bizjournals.int; dbname=recon', 'operations', 'operations');
$db = new PDO('mysql:host=db02.bizjournals.int; dbname=recon', 'datahub', 'readonly');
//host: db02 db:recon
//username: datahub
//password: readonly

$SQL = "
  SELECT
    id,
    ExternalId,
    SourceId,
    Name,
    Ticker,
    TickerExchange,
    DateModified
  FROM
    Org
  WHERE
    HasStories = 1
";

$delimiter = ',';

fputs(
    $fd,
    "InternalId" . $delimiter .
    "GenId" . $delimiter .
    "SourceID" . $delimiter .
    "Name" . $delimiter .
    "Ticker" . $delimiter .
    "TickerExchange" . $delimiter .
    "DateModified" . $delimiter .
    "Addr1" . $delimiter .
    "Addr2" . $delimiter .
    "City" . $delimiter .
    "State" . $delimiter .
    "PostalCode" . $delimiter .
    "Country" . $delimiter .
    "Lat" . $delimiter .
    "Lon" . $delimiter .
    "OfficePhone1" . $delimiter .
    "Url" . $delimiter .
    "Sic" . "\n"
);


// fetch all the good bits
foreach ($db->query($SQL) as $row) {

    $row['TickerExchange'] = strpos($row['TickerExchange'], 'NASDAQ') ? 'NASDAQ' : $row['TickerExchange'];
    $row['TickerExchange'] = strpos($row['TickerExchange'], 'York Stock') ? 'NYSE' : $row['TickerExchange'];
    $row['ExternalId']     = strlen($row['ExternalId']) > 12 ? $row['ExternalId'] : '';
    $row['Name']           = trim(preg_replace('/\s+/', ' ', $row['Name']));

    $line =
        '"' . $row['id'] . '"' . $delimiter .
        '"' . $row['ExternalId'] . '"' . $delimiter .
        '"' . $row['SourceId'] . '"' . $delimiter .
        '"' . $row['Name'] . '"' . $delimiter .
        '"' . $row['Ticker'] . '"' . $delimiter .
        '"' . $row['TickerExchange'] . '"' . $delimiter .
        '"' . $row['DateModified'] . '"';

    $SQL = "
      SELECT
        Address1,
        Address2,
        City,
        State,
        ZipCode,
        Country,
        Lat,
        Lon
      FROM
        OrgAddress
      WHERE
        OrgId=" . $row['id'] . " AND
        isPrimary='1'
    ";

    $stmt = $db->prepare($SQL);
    $stmt->execute();
    $OrgAddress_results = $stmt->fetchAll(PDO::FETCH_NUM);

    if ($OrgAddress_results && ($OrgAddress_results[0][5] !== '')) {

        if (empty($OrgAddress_results[0][3])) {
            continue;
        }

        if ($OrgAddress_results[0][5]) {
            // get the country names
            // normalize the col for array searching
            $raw       = $OrgAddress_results[0][5];
            $processed = strtoupper($raw);
            $splode    = explode("(", $processed);
            $processed = trim($splode[0]);
            $processed = preg_replace('/,.*/', '', $processed);
            $processed = preg_replace("/\([^)]+\)/", "", $processed);

            if (in_array($processed, $countries)) {
                $countryCode = array_search($processed, $countries);
            } else {
                if (in_array($processed, $secondChanceCountries)) {
                    $countryCode = array_search($processed, $secondChanceCountries);
                } else {
                    // no match so we don't care
                    continue;
                }
            }

        } else {
            // assume that all records that have an empty country col are US
            $countryCode = 'US';
        }
        $line .=
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][0])) . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][1])) . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][2])) . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][3])) . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][4])) . '"' .
            $delimiter . '"' . $countryCode . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][6])) . '"' .
            $delimiter . '"' . trim(preg_replace('/\s+/', ' ', $OrgAddress_results[0][7])) . '"';
    } else {
        // no address so no care
        continue;
    }

    // fetch phone records
    $SQL = "
    SELECT
      OfficePhone1
    FROM
      OrgPhone
    WHERE
      OrgId=" . $row['id'] . " AND
        isPrimary='1'
    ";

    $stmt = $db->prepare($SQL);
    $stmt->execute();
    $OrgPhone_results = $stmt->fetchAll(PDO::FETCH_NUM);

    if (!empty($OrgPhone_results)) {
        // remove all but digits
        $phone = preg_replace('/\D/', '', $OrgPhone_results[0][0]);

        // take off the leading 1 if it's not american
        if ((strlen($phone) > 10) && (substr($phone, 0, 1) == 1)) {
            $phone = trim($phone, '1');
        }
        $line .= $delimiter . '"' . $phone . '"';
    } else {
        $line .= $delimiter;
    }

    // grab OrgUrl Data, normalise and tack on
    $SQL = "
    SELECT
      Url
    FROM
      OrgUrl
    WHERE
      OrgId=" . $row['id'] . " AND
        isPrimary='1'
    ";

    $stmt = $db->prepare($SQL);
    $stmt->execute();
    $OrgUrl_results = $stmt->fetchAll(PDO::FETCH_NUM);

    if (!empty($OrgUrl_results[0][0])) {
        // add http to those lacking either http or https
        $url = strpos($OrgUrl_results[0][0], 'http') === 0 ? $OrgUrl_results[0][0] : 'http://' . $OrgUrl_results[0][0];
        // remove everything after and including the first comma if there is a comma
        $url = strpos($url, ',') ? substr($url, 0, strpos($url, ',')) : $url;
        // remove everything after and including the first space if there is a space
        $url = strpos($url, ' ') ? substr($url, 0, strpos($url, ' ')) : $url;

        if ($url !== "http:??") {
            $line .= $delimiter . '"' . $url . '"';
        } else {
            $line .= $delimiter;
        }
    } else {
        $line .= $delimiter;
    }

    // grab sic Data, and tack on
    $SQL = "
    SELECT
      SIC
    FROM
      OrgSIC
    WHERE
      OrgId = " . $row['id'] . " ";

    $stmt = $db->prepare($SQL);
    $stmt->execute();
    $sicResult = $stmt->fetchAll(PDO::FETCH_NUM);


    if (!empty($sicResult[0][0])) {
        $line .= $delimiter . '"' . $sicResult[0][0] . '"';
    } else {
        $line .= $delimiter;
    }
    // format and write row to file
    fputs($fd, $line . "\n");
}

echo "ended at " . date('h:i:s A') . PHP_EOL;
