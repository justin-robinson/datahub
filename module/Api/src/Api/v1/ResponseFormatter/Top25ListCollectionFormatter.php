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

/**
 * Class Top25ListCollectionFormatter
 *
 * @package Api\v1\ResponseFormatter
 */
class Top25ListCollectionFormatter
{
    /**
     * @param Rows $lists
     *
     * @return array
     */
    public  static function format( $lists)
    {
        $array = $lists->to_array();
        return $array;
    }
}