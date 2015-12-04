<?php
//echo "started at ".date('l jS \of F Y h:i:s A').PHP_EOL;
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

@$filename = '/tmp/bridgetree_refinery_' . date('Ymd') . '.csv';

$fd = fopen($filename, 'w');

fputs($fd, '');

$db = new PDO('mysql:host=radb.bizjournals.int; dbname=recon', 'operations', 'operations');

$db2 = new PDO('mysql:host=reportdb.bizjournals.int; dbname=bizj', 'operations', 'operations');

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

$delimiter = '`';

fputs(
    $fd,
    'InternalId' . $delimiter .
    'GenId' . $delimiter .
    'SourceID' . $delimiter .
    'Name' . $delimiter .
    'Ticker' . $delimiter .
    'TickerExchange' . $delimiter .
    'DateModified' . $delimiter .
    'Addr1' . $delimiter .
    'Addr2' . $delimiter .
    'City' . $delimiter .
    'State' . $delimiter .
    'PostalCode' . $delimiter .
    'Country' . $delimiter .
    'Lat' . $delimiter .
    'Lon' . $delimiter .
    'OfficePhone1' . $delimiter .
    'Url' . "\n"
);



// fetch all the good bits
foreach ($db->query($SQL) as $row) {

    $row['TickerExchange'] = strpos($row['TickerExchange'], 'NASDAQ') ? 'NASDAQ' : $row['TickerExchange'];
    $row['TickerExchange'] = strpos($row['TickerExchange'], 'York Stock') ? 'NYSE' : $row['TickerExchange'];
    $row['ExternalId']     = strlen($row['ExternalId']) > 12 ? $row['ExternalId'] : '';

    $line      =
        $row['id']. $delimiter .
        $row['ExternalId']. $delimiter .
        $row['SourceId']. $delimiter .
        str_replace('"', '', $row['Name']) . $delimiter .
        $row['Ticker'] . $delimiter .
        $row['TickerExchange'] . $delimiter .
        $row['DateModified'];

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

        if ($OrgAddress_results[0][5]) {
            // get the country names
            // normalize the col for array searching
            $raw       = $OrgAddress_results[0][5];
            $processed = strtoupper($raw);
            $splode    = explode("(", $processed);
            $processed = trim($splode[0]);
            $processed = preg_replace('/,.*/', '', $processed);
            $processed = preg_replace("/\([^)]+\)/", "", $processed);

            // is the country in the array
            if (in_array($processed, $countries)) {

                $countryCode = array_search($processed, $countries);

            } else {

                // try again
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
            $delimiter . $OrgAddress_results[0][0] .
            $delimiter . $OrgAddress_results[0][1] .
            $delimiter . $OrgAddress_results[0][2] .
            $delimiter . $OrgAddress_results[0][3] .
            $delimiter . $OrgAddress_results[0][4] .
            $delimiter . $countryCode .
            $delimiter . $OrgAddress_results[0][6] .
            $delimiter . $OrgAddress_results[0][7];
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
        $phone = preg_replace('/\D/', '', $OrgPhone_results[0][0]);
        if ((strlen($phone) > 10) && (substr($phone, 0, 1) == 1)) {
            $phone = ltrim($phone, '1');
        }
        $line .= $delimiter . $phone;
    } else {
        $line .= $delimiter;
    }

    // grab OrgUrl Data and tack on
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

    if (!empty($OrgUrl_results)) {
        $line .= $delimiter . str_replace(',', ' ', $OrgUrl_results[0][0]);
    } else {
        $line .= $delimiter;
    }
    // format and write row to file
    fputs($fd, $line . "\n");

}

//echo "ended at " .date('l jS \of F Y h:i:s A').PHP_EOL;

