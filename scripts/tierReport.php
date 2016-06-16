<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/20/16
 * Time: 12:31 PM
 */
use DB\Datahub\CompanyInstance;

/**
 * generates 7 files, 1 for each tier
 * files contain
 * instance_name, instance_id, entity_id (company id)
 *
 *
 *
 *
 *
 */

$basicFields = [
    'address1',
    //    'address2',
    'city',
    'country',
    'latitude',
    'longitude',
    'zipCode',
    'state',
];


$tier_1 = fopen('/home/vagrant/files/tier_1.csv', 'w');
$tier_2 = fopen('/home/vagrant/files/tier_2.csv', 'w');
$tier_3 = fopen('/home/vagrant/files/tier_3.csv', 'w');
$tier_4 = fopen('/home/vagrant/files/tier_4.csv', 'w');
$tier_5 = fopen('/home/vagrant/files/tier_5.csv', 'w');
$tier_6 = fopen('/home/vagrant/files/tier_6.csv', 'w');
$tier_7 = fopen('/home/vagrant/files/tier_7.csv', 'w');

$paginate = 500;
$db       = new PDO('mysql:host=devdb.bizj-internal.com; dbname=datahub', 'web', '');
$sql      = "
    SELECT
    c.name AS entityName,
    c.companyId AS entityId,
    ci.* ,
    cip.name AS propName,
    cip.value AS propValue,
    cip.sourceId,
    cip.updatedAt AS propUpdatedAT
    FROM company c
       JOIN companyInstance ci USING (companyId)
       JOIN companyInstanceProperty cip USING(companyInstanceId)
       WHERE c.companyId = 279672
       LIMIT 500;";

//$entityQuery = "
//    SELECT c.name, ci.*
//    FROM company
//       JOIN companyInstance ci USING (companyId)
//    LIMIT 2;
//";

$stmnt = $db->prepare($sql);

$stmnt->execute();
$results = $stmnt->fetchAll(\PDO::FETCH_ASSOC);

$props = [];


// justin loves this sort of code
// store off the unique instance names
$instanceNames = [];
foreach ($results as $result) {
    array_push($instanceNames, $result['name']);

}
$instanceNames = array_unique($instanceNames);

foreach ($instanceNames as $instanceName) {

    $company = new CompanyInstance();
    $company->fetch_by_id($result['entityId'])
    $company = [
        'entityName'        => [],
        'entityId'          => [],
        'companyInstanceId' => [],
        'marketCode'        => [],
        'marketOfRecord'    => [],
        'name'              => [],
        'sicCode'           => [],
        'stateId'           => [],
        'stockSymbol'       => [],
        'tickerExchange'    => [],
        'properties'        => [],
    ];
    foreach ($results as $k => $result) {

        $entityName = empty($result['entityName']) ? null : str_replace('"', '', $result['entityName']);
        // justin REALLY loves this type of code
        array_push($company['entityName'], $result['entityName']);
        array_push($company['entityId'], $result['entityId']);
        array_push($company['companyInstanceId'], $result['companyInstance']);
        array_push($company['marketCode'], $result['marketCode']);
        array_push($company['marketOfRecord'], $result['marketOfRecord']);
        array_push($company['name'], $result['name']);
        array_push($company['sicCode'], $result['sicCode']);
        array_push($company['stateId'], $result['stateId']);
        array_push($company['stockSymbol'], $result['stockSymbol']);
        array_push($company['tickerExchange'], $result['tickerExchange']);
        // properties array normalising
        $properties = [
            $result['propName'] => [],
        ];
        array_push($company['properties'], [
            'propName'      => $result['propName'],
            'propValue'     => $result['propValue'],
            'propSourceId'  => $result['propSourceId'],
            'propUpdatedAT' => $result['propUpdatedAT'],
        ]);


    }
    foreach ($company as $key => &$value) {
        if ($key !== 'properties') {
            $value = is_array($value) ? array_unique($value) : $value;
        }
    }
    echo "line 127" . ' in ' . "tierReport.php" . PHP_EOL;
    die(var_dump($company));
    fputcsv($tier_1, $company);
}


//$cols = [
//    'meroveusIndustryId',
//    'meroveusIndustryName',
//];
//fputcsv($file, $cols);
//
//foreach ($results as $line) {
//    fputcsv($file, $line);
//}