<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/19/16
 * Time: 1:44 PM
 * dump of sic_industries to csv for building another table
 */


$file = fopen('/home/vagrant/files/meroveusIndustries.csv', 'w');

$db = new PDO('mysql:host=devdb.bizj-internal.com; dbname=datahub', 'web', '');

$sql = "SELECT meroveus_industry_id, industry FROM meroveus_industry;";

$stmnt = $db->prepare($sql);

$stmnt->execute();
$results = $stmnt->fetchAll(\PDO::FETCH_NUM);
$cols    = [
    'meroveusIndustryId',
    'meroveusIndustryName',
];
fputcsv($file, $cols);

foreach ($results as $line) {
    fputcsv($file, $line);
}