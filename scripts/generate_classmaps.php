#!/usr/bin/env php
<?php
/**
 * Simple script to genterate all of the autoload_classmap.php files for all modules
 * 
 * @author      bizjournals <bizops@bizjournals.com>
 * @copyright   Copyright © 2012 bizjournals, LLC.
 * @version     SVN $Id$
 */

$module_dir = dirname(__DIR__) . '/module';
chdir($module_dir);

$dir = new DirectoryIterator($module_dir);
foreach ($dir as $item) {
    if ($item->isDir() && substr($item->getBasename(), 0, 1) != '.') {
        chdir($item->getPathname());
        system('php ../../vendor/zendframework/zendframework/bin/classmap_generator.php -s');
    }
}
