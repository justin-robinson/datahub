<?php
/**
 * @todo
 *  convert semicolons to spaces
 *  convert backticks to '
 *  get lat and lon
 *  get countries for records without
 *  git zips for records without
 *
 *
 */
@$filename = '/tmp/bridgetree_refinery_' . date('Ymd');

$fd = fopen($filename, 'w');

fputs($fd, '');

$db  = new PDO('mysql:host=db02;dbname=recon;port=3318;', 'operations', 'operations');
$db2 = new PDO('mysql:dbname=bizj;host=reportdb', 'operations', 'operations');

// pull all the Orgs

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
  LIMIT
    300";

$delimiter = '`';

fputs($fd,
    'GenerateId' . $delimiter .
    'CompanyId' . $delimiter .
    'SourceID' . $delimiter .
    'Name' . $delimiter .
    'Ticker' . $delimiter .
    'TickerExchange' . $delimiter .
    'DateModified' . $delimiter .
    'Addr1' . $delimiter .
    'Addr2' . $delimiter .
    'City' . $delimiter .
    'State' . $delimiter .
    'ZipCode' . $delimiter .
    'Country' . $delimiter .
    'OfficePhone1' . $delimiter .
    'Url' . "\n");

foreach ($db->query($SQL) as $row) {

    $line =
        $row['id'] . $delimiter .
        $row['ExternalId']. $delimiter .
        $row['SourceID']. $delimiter .
        $row['Name'] . $delimiter .
        $row['Ticker'] . $delimiter .
        $row['TickerExchange'] . $delimiter .
        $row['DateModified'];

    // grab OrgAddress Data and tack on
    $SQL = "
      SELECT
        Address1,
        Address2,
        City,
        State,
        ZipCode,
        Country
      FROM
        OrgAddress
      WHERE
        OrgId=" . $row['id'] . " AND
        isPrimary='1'
    ";

    $stmt = $db->prepare($SQL);
    $stmt->execute();
    $OrgAddress_results = $stmt->fetchAll(PDO::FETCH_NUM);

    if (!empty($OrgAddress_results)) {
        $line .=
            $delimiter . $OrgAddress_results[0][0] .
            $delimiter . $OrgAddress_results[0][1] .
            $delimiter . $OrgAddress_results[0][2] .
            $delimiter . $OrgAddress_results[0][3] .
            $delimiter . $OrgAddress_results[0][4] .
            $delimiter . $OrgAddress_results[0][5]
        ;
    } else {
        $line .= $delimiter . $delimiter . $delimiter . $delimiter . $delimiter . $delimiter;
    }


    // grab OrgPhone Data and tack on
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
        $line .= $delimiter . $OrgPhone_results[0][0];
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
        $line .= $delimiter . $OrgUrl_results[0][0];
    } else {
        $line .= $delimiter;
    }
    // format and write row to file
    fputs($fd, $line . "\n");
}