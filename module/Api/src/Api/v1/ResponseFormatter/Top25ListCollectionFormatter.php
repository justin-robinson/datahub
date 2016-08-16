<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 8/10/16
 * Time: 2:05 PM
 */

namespace Api\v1\ResponseFormatter;

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
        
        $return = [];
        foreach ($lists as $list) {
            $return = $list->to_array();
        }
        
        return $return;
    }
}