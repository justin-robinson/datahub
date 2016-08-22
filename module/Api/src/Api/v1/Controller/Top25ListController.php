<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 8/10/16
 * Time: 1:52 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\Top25ListCollectionFormatter;
use DB\Datahub\CompanyInstanceTop25lists;
use DB\Datahub\Top25List;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class Top25ListController
 *
 * @package Api\v1\Controller
 */
class Top25ListController extends AbstractRestfulController
{
    /**
     * @param $companyInstanceId
     *
     * @return JsonModel
     *
     * there's no provision to get lists directly as a resource
     */
    public function get($companyInstanceId)
    {
        $collection = CompanyInstanceTop25lists::fetch_where('companyInstanceId = ?', [$companyInstanceId]);
        
        $results = [];
        foreach ($collection as $entry) {
            
            $list = Top25List::fetch_where('listId = ?', [$entry->listId]);
            if ($list) {
                $results[] = $list;
            }
        }
        
        
        if ($results) {
            
            return new JsonModel(Top25ListCollectionFormatter::format($results));
        }
        
        return $this->getResponse()->setStatusCode(204);
        
    }
    
    /**
     * here's an example of the body contained in $data
     * {
     * "listId":            323423444,
     * "companyMeroveusIds": [
     * 265504,
     * 564178
     * ],
     * "issueDate":         "",
     * "pageHeadline":      "this came from a post as well",
     * "listUrl":           "/google.html"
     * }
     *
     * @param $data
     *
     * this little guy has to figure out the company instance id from the given meroveus id
     * before he can store the data
     *
     * @return mixed
     */
    public function create($data)
    {
        if (empty($data['companyMeroveusIds'])) {
            $this->getResponse()->setStatusCode(500);
            
            return new JsonModel(['message' => 'missing company ids']);
        }
        
        // do the mappings
        foreach ($data['companyMeroveusIds'] as $id) {
            // get the companyInstanceId
            $instance = CompanyInstance::fetch_by_source_name_and_id('meroveus', $id);
            // if we ever decide to implement this:
//            if (!$instance) {
//                $this->getResponse()->setStatusCode(500);
//                return new JsonModel(['message' => 'instance with meroveus_id#' . $id . ' not present in datahub']);
//            }
            
            if ($instance) {
                // build the mapping
                $map                    = new CompanyInstanceTop25lists();
                $map->companyInstanceId = $instance->first()->companyInstanceId;
                $map->listId            = $data['listId'];
                // save the mapping
                $mapSave = $map->save();
                
                if (!$mapSave) {
                    $this->getResponse()->setStatusCode(500);
                    
                    return new JsonModel(['message' => 'mapping did not save']);
                }
            }
        }
        
        // build the list
        $list               = new Top25List();
        $list->listId       = $data['listId'];
        $list->issueDate    = $data['issueDate'];
        $list->pageHeadline = $data['pageHeadline'];
        $list->listUrl      = $data['listUrl'];
        // save the list
        if ($list->save()) {
            $list->reload();
            
            return new JsonModel($list->to_array());
        } else {
            $this->getResponse()->setStatusCode(500);
            
            return new JsonModel(['message' => 'list failed to save']);
        }
    }
    
    
    /**
     * @param mixed $id
     *
     * @return JsonModel
     */
    public function delete($listId)
    {
        $mappings = CompanyInstanceTop25lists::fetch_where('listId = ?', [$listId]);
        
        // delete each entry
        foreach ($mappings as $entry) {
            $list = Top25List::fetch_where('listId = ?', [$entry->listId]);
            foreach($list as $deleteMe){
                if (!$deleteMe->delete()) {
                    $this->getResponse()->setStatusCode(500);
                    return new JsonModel(['message' => 'list id ' . $list->listId . ' failed to delete']);
                }
            }
        }
        
        // delete the mapping collection
        foreach ($mappings as $mapping) {
            if (!$mapping->delete()) {
                $this->getResponse()->setStatusCode(500);
                return new JsonModel(['message' => 'list id ' . $entry->listId . ' failed to delete']);
            }
        }
        
        return new JsonModel(['message' => 'list id ' . $entry->listId . ' deleted']);
        
    }
}