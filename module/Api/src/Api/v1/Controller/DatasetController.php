<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 7/6/16
 * Time: 10:08 AM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetFormatter;
use DB\Datahub\Dataset;
use Zend\View\Model\JsonModel;

/**
 * Class DatasetController
 *
 * @package Api\v1\Controller
 */
class DatasetController extends AbstractRestfulController
{
    /**
     * @param $setId
     *
     * @return JsonModel
     */
    
    //@todo set up formatter in constructor
    
    public function get($setId)
    {
        // looking for formatting types
        $e     = $this->getEvent();
        $route = $e->getRouteMatch();
        $type  = $route->getParam('type');
        /** @var $set \DB\Datahub\Dataset */
        $set = Dataset::fetch_by_id($setId);
        if ($set) {
            $set->fetchDatasetEntries();

            return new JsonModel(DatasetFormatter::format($set, false, $type));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {
        /**
         * this needs to get the company instance id's?
         * probably not just rename the col maroveus_id
         */
          // json encode the json
        $data['fields'] = json_encode($data['fields']);
        foreach ($data['entries'] as &$entry) {
            $entry['meta'] = json_encode($entry['meta']);
        }
        
        
        $set = new Dataset($data);
        if ($set->save()) {
            // get the actual timestamps
            $set->reload();
        }

        return new JsonModel(DatasetFormatter::format($set, true));
    }


}