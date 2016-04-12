<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 4/11/16
 * Time: 2:17 PM
 */

echo "export started: " . date('h:i:s A') . PHP_EOL;

$file = fopen('lists.json', 'w');

$db = new PDO('mysql:host=reportdb.bizjournals.int; dbname=bizj', 'operations', 'operations');

$sql = "SELECT DISTINCT list_id FROM top25_list ORDER BY list_id";

$stmnt = $db->prepare($sql);

$stmnt->execute();
$listIds = $stmnt->fetchAll(\PDO::FETCH_NUM);


$sql2 = "SELECT company_name, object_id FROM top25_list_row WHERE list_id = :list_id";


$lists = [];

$howManyLists  = count($listIds);
$elasticAction = [
    "create" => [
        "_index" => "lists",
        "_type"  => 'with_companies',
    ],
];
foreach ($listIds as $listId) {
    $list = [];

    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([':list_id' => $listId[0]]);
    $listCompanies     = $stmt2->fetchAll(\PDO::FETCH_ASSOC);
    $list['list_id']   = $listId[0];
    $list['companies'] = $listCompanies;
    fwrite($file, json_encode($elasticAction) . PHP_EOL);
    fwrite($file, json_encode($list) . PHP_EOL);
}

fclose($file);

echo "export ended: " . date('h:i:s A') . PHP_EOL;