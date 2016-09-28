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
use DB\Datahub\DatasetEntries;
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
    
    /**
     * @param null $setId
     *
     * @return JsonModel
     */
    public function get($setId = null)
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
    
    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        /**
         * this needs to get the company instance id's?
         * probably not just rename the col maroveus_id
         */
        // json encode the json
//        $data['fields'] = json_encode($data['fields']);
//        foreach ($data['entries'] as &$entry) {
//            $entry['meta'] = json_encode($entry['meta']);
//        }

        $set = new Dataset($data);
        $set->save();
        
        return new JsonModel(DatasetFormatter::format($set, true));
    }
    
    /**
     * @param mixed $datasetId
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($datasetId, $data)
    {
        /** @var $set \DB\Datahub\Dataset */
        $set = Dataset::fetch_by_id($datasetId);
        
        if ($set) {

            $data['fields'] = empty($data['fields']) ? null : json_encode($data['fields']);

            $set->populate($data);
            $set->save();

            foreach ( $data['entries'] as $k => $entryData ) {
                $entry = new DatasetEntries($entryData);
                $entry->dataset_id = $set->id;
                $entry->set_loaded_from_database($entry->has_id())->save();
            }
            
//            foreach ($set->entries as $k => $entry) {
//                // process the entries
////                $entry->populate($data['entries'][$k]);
//
//                $entry->meta            = empty($data['entries'][$k]['meta']) ? $entry->meta : json_encode($data['entries'][$k]['meta']);
//                $entry->featured        = empty($data['entries'][$k]['featured']) ? $entry->featured : $data['entries'][$k]['featured'];
//                $entry->featuredExpires = empty($data['entries'][$k]['featuredExpires']) ? $entry->featuredExpires : $data['entries'][$k]['featuredExpires'];
//                $entry->logo            = empty($data['entries'][$k]['logo']) ? $entry->logo : $data['entries'][$k]['logo'];
//                $entry->image           = empty($data['entries'][$k]['image']) ? $entry->image : $data['entries'][$k]['image'];
//                $entry->promoText       = empty($data['entries'][$k]['promoText']) ? $entry->promoText : $data['entries'][$k]['promoText'];
//
//                $entry->save();
//            }
            
            return new JsonModel(DatasetFormatter::format($set, true));
        }
        
        return $this->getResponse()->setStatusCode(204);
        
    }
    
    /**
     * @param mixed $id
     *
     * @return JsonModel
     */
    public function delete($id)
    {
        
        $set = Dataset::fetch_by_id($id);
        if ($set) {
            $set->delete();
            $set = Dataset::query('SELECT * FROM datahub.company WHERE companyId = ?', [$id])->first();
            
            return new JsonModel(DatasetFormatter::format($set));
        }
        
        return $this->getResponse()->setStatusCode(204);
    }
    

}
