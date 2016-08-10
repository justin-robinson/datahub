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
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;

use Scoop\Database\Model\Generic;
use Zend\Db\Sql\Ddl\Column\Integer;
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
     */
    public function get($companyInstanceId){
        $lists = CompanyInstanceTop25lists::fetch_where('companyInstanceId = ?', [$companyInstanceId]);
        if ($lists) {
            
            return new JsonModel(Top25ListCollectionFormatter::format($lists));
        }

        return $this->getResponse()->setStatusCode(204);
        
    }
    
    /**
     * here's an example of the body contained in $data
     * {
     *   "companyMeroveusId": 11111,
     *   "listId":            1111,
     *   "issueDate":         "",
     *   "pageHeadline":      "",
     *   "listUrl":           ""
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
        $instance = CompanyInstance::fetch_by_source_name_and_id('meroveus', $data['companyMeroveusId']);
        
        $list = new CompanyInstanceTop25lists();
        $list->companyInstanceId = $instance->first()->companyInstanceId;
        $list->listId = $data['listId'];
        $list->issueDate = $data['issueDate'];
        $list->pageHeadline = $data['pageHeadline'];
        $list->listUrl = $data['listUrl'];
        
        
        if ($list->save()) {
            $list->reload();
        }
        
        return new JsonModel($list->to_array());
    }
}