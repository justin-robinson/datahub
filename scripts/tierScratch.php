<?php
use DB\Datahub\Company;
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/6/16
 * Time: 2:36 PM
 */

$company = Company::fetch_company_and_instances(1);

echo "line 12". ' in '."tierScratch.php".PHP_EOL;
die(var_dump( $company ));