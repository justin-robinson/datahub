<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 8/10/16
 * Time: 2:05 PM
 */

namespace Api\v1\ResponseFormatter;

use DB\Datahub\CompanyInstanceTop25lists;
use Scoop\Database\Rows;

class Top25ListCollectionFormatter
{
    public  static function format(Rows $lists)
    {
        $array = $lists->to_array();
        return $array;
    }
}