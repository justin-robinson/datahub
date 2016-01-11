<?php
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('date.timezone', 'America/New_York');

defined('LIBRARY_ROOT') ||
    define('LIBRARY_ROOT', realpath(dirname(__FILE__) . '/../library'));
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/'));
define('APPLICATION_ENV','testing');

set_include_path(implode(PATH_SEPARATOR, array (
    realpath(LIBRARY_ROOT),
    get_include_path()
)));
