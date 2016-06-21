<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 6/20/16
 * Time: 10:41 AM
 * craps out psuedoJson for elasticsearch bulk inserts
 */
echo "
 _       _______  _____  _______  _____ (_)(_)(_)(_)
(_)     (_______)(_____)(__ _ __)(_____)(_)(_)(_)(_)
(_)        (_)  (_)___     (_)  (_)___  (_)(_)(_)(_)
(_)        (_)    (___)_   (_)    (___)_(_)(_)(_)(_)
(_)____  __(_)__  ____(_)  (_)    ____(_)_  _  _  _ 
(______)(_______)(_____)   (_)   (_____)(_)(_)(_)(_)
";

echo "export started: " . date('h:i:s A') . PHP_EOL;

$file = fopen('/home/vagrant/files/listsByCompany.json', 'w');

$db = new PDO('mysql:host=reportdb.bizjournals.int; dbname=bizj', 'operations', 'operations');

$sql = "
SELECT
 DISTINCT tlr.list_id

FROM bizj.top25_list_row tlr
  INNER JOIN bizj.top25_list tl ON tlr.list_id = tl.list_id
  INNER JOIN bizj.page p ON tl.page_id = p.page_id
WHERE p.release_time <= NOW() AND object_id <> 0
ORDER BY tlr.created_at DESC
# LIMIT 0, 12;
";


$stmnt = $db->prepare($sql);

$stmnt->execute();

$listIds = $stmnt->fetchAll(\PDO::FETCH_NUM);

$sql2 = "
SELECT
 DISTINCT 
 tlr.rank,
 tlr.object_id,
 tlr.company_name,
 tl.market_id,
 tl.issue_date,
 tl.page_headline,
 concat(p.site, p.path, p.slug, '.html') AS url
FROM bizj.top25_list_row tlr
  INNER JOIN bizj.top25_list tl ON tlr.list_id = tl.list_id
  INNER JOIN bizj.page p ON tl.page_id = p.page_id
WHERE p.release_time <= NOW() AND object_id <> 0
AND tlr.list_id = :list_id
ORDER BY tlr.created_at DESC

";


$lists = [];

$elasticAction = [
    "create" => [
        "_index" => "lists",
        "_type"  => 'company_related',
    ],
];

foreach ($listIds as $listId) {
    if (!empty($listId[0])) {
        $list  = [];
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute([':list_id' => $listId[0]]);
        $listCompanies = $stmt2->fetchAll(\PDO::FETCH_ASSOC);


        if (count(($listCompanies)) >= 1) {
            // fix for JSON_ERROR_UTF8
            foreach ($listCompanies as &$company) {
                $company['company_name']  = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($company['company_name']));
                $company['page_headline'] = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($company['page_headline']));
            }
            $list['list_id']   = $listId[0];
            $list['companies'] = $listCompanies;
            fwrite($file, json_encode($elasticAction) . PHP_EOL);
            fwrite($file, json_encode($list) . PHP_EOL);
        }
    } else {
        echo "no list!" . PHP_EOL;
    }
}

fclose($file);

echo "export ended: " . date('h:i:s A') . PHP_EOL;
