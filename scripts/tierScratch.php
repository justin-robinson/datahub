<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/6/16
 * Time: 2:36 PM
 */

$property['updatedAt'] = 7;
switch ($property['updatedAt']) {
            case ($property['updatedAt'] >= 3);
                $return = 4;
                break;
            case (($property['updatedAt'] > 1) && ($property['updatedAt'] <= 3));
                $return = 3;
                break;
            case (($property['updatedAt'] > 1) && ($property['updatedAt'] <= 2));
                $return = 2;
                break;
            case (($property['updatedAt'] <= 1));
                $return = 1;
                break;
        }
echo $return.PHP_EOL;