<?php
$config = \Doctrine\ORM\Tools\Setup::createYAMLMetadataConfiguration(array(__DIR__), true);
$config->setProxyNamespace('Entity\Proxy');

$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'dbname'   => 'bizj_preview',
    'host'     => 'devdb.bizjournals.int',
    'port'     => '3306',
    'user'     => 'bizjcms-write',
    'password' => 'bizjcms-write',
);
 
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
 
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

return $helperSet;