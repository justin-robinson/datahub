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
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;

use Scoop\Database\Model\Generic;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Json\Json;
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
     * useful for debugging since we want to get this payload with the company return
     */
    public function get($companyInstanceId)
    {
        $lists = CompanyInstanceTop25lists::fetch_where('companyInstanceId = ?', [$companyInstanceId]);
        if ($lists) {
            
            return new JsonModel(Top25ListCollectionFormatter::format($lists));
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
            
            if($instance){
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
            return new JsonModel(['message' => 'list failed to sve']);
        }
    }
}