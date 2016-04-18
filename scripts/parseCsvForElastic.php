<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 4/11/16
 * Time: 2:17 PM
 */

echo "export started: " . date('h:i:s A') . PHP_EOL;

$index = 'companies';
$type = 'company';



if (($handle = fopen('/home/vagrant/files/refineryDump.csv', "r")) !== false) {

    $outputFile = fopen('/home/vagrant/files/' . $index . '.json', 'w');

    $headerRow = fgetcsv($handle, 0, ",");

    $elasticAction = [
        "create" => [
            "_index" => $index,
            "_type"  => $type,
        ],
    ];

    $number = 2;

    while (($company = fgetcsv($handle, 0, ',')) && $number > 0) {
        $record = [];
        foreach ($headerRow as $k => $col){
            $record[$col] = $company[$k];
        }
//        $number--;
        fwrite($outputFile, json_encode($elasticAction) . "\n");
        fwrite($outputFile, json_encode($record) . "\n");
    }

    fclose($outputFile);
}
echo "export ended: " . date('h:i:s A') . PHP_EOL;