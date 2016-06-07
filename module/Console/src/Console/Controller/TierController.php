<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 5/23/16
 * Time: 11:05 AM
 */

namespace Console\Controller;

use Console\DB\Connection\DB;
use DBCore\Datahub\CompanyInstance;


/**
 * Class TierController
 *
 * @package Console\Controller
 */
class TierController extends AbstractActionController
{
    /**
     * @param        $instance
     * @param bolean $firstRun
     */
    public function tierInstance($instance, bolean $firstRun)
    {

        // no contact = tiers 4 -7
        //


    }


    /**
     * @param $property
     */
    private function calcFreshnessRating($property)
    {
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
    }


    /**
     * @param $instance
     *
     * @return bool
     */private function hasStory($instance)
    {
        $return = false;
        if ($instance->hasStory) {
            $return = true;
        }

        return $return;
    }


    /**
     * @param $instance
     *
     * @return bool
     */private function hasBasicFields($instance)
    {
        $return = false;
        if ($instance->hasBasicFields) {
            $return = true;
        }

        return $return;
    }

    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasIdFields($instance)
    {
        $return = false;
        if ($instance->hasIdFields) {
            $return = true;
        }

        return $return;
    }

    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasEnhancedFields($instance)
    {
        $return = false;
        if ($instance->hasEnhancedFields) {
            $return = true;
        }

        return $return;
    }

    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasGroupingFields($instance)
    {
        $return = false;
        if ($instance->hasGroupingFields) {
            $return = true;
        }

        return $return;
    }


    /**
     * @param     $field
     * @param int $sourceTypeId
     *
     * @return bool
     */private function sourceField($field, $sourceTypeId = 1)
    {
        $return = false;
        if ($field->sourceTypeId <= $sourceTypeId) {
            $return = true;

        }
        return $return;
    }

      /**
     * @param $instance
     *
     * @return bool
     */
    private function hasContact($instance)
    {
        $return = false;
        if ($instance->hasContact) {
            $return = true;

        }
        return $return;
    }
    
}