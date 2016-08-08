#!/usr/local/bin/php
<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

if (($e = array_search('-e', $_SERVER['argv'])) !== false || ($e = array_search('--env', $_SERVER['argv'])) !== false) {
    $environment = $_SERVER['argv'][$e + 1];
} elseif (array_key_exists('APPLICATION_ENV', $_SERVER)) {
    $environment = $_SERVER['APPLICATION_ENV'];
} else {
    throw new Exception('Missing environment; use either -e or --env');
}

putenv("APPLICATION_ENV=$environment");

// Setup autoloading
require 'vendor/autoload.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
