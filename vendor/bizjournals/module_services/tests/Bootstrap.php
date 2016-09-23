<?php

namespace Tests;

putenv('APPLICATION_ENV=testing');

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

require_once(__DIR__ . '/../vendor/autoload.php');
