<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/12/16
 * Time: 3:25 PM
 */

namespace Api\v1\ResponseFormatter;


use Scoop\Database\Rows;

class BbmFormatter
{
    public static function format($bbm){
        
        return $bbm->to_array();
        
    }
}