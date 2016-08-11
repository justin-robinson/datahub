#!/usr/bin/env php
<?php
$src_dir = dirname(__DIR__) . '/src';
$doctrine_module = dirname(__DIR__) . '/vendor/doctrine/doctrine-module/bin/doctrine-module';

system("php $doctrine_module orm:generate-entities --regenerate-entities=1 --extend='Entity\Entity\Base' $src_dir");
system("php $doctrine_module orm:generate-proxies $src_dir/Entity/Proxy");
