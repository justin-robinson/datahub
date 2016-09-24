<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/12/16
 * Time: 3:20 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\BbmFormatter;
use DB\Datahub\Company;
use DB\Datahub\DatahubBbm;
use Zend\View\Model\JsonModel;

class BbmController extends AbstractRestfulController
{
    /**
     * @param $companyInstanceId
     *
     * @return null|JsonModel
     */
    public function get($companyInstanceId)
    {
        
        // set appropriate where clause for the fetch_where
        $e           = $this->getEvent();
        $route       = $e->getRouteMatch();
        $where       = $route->getParam('type') ? 'acbj_refinery_org_id = ?' : 'acbj_datahub_org_id = ?';
        $bbmInstance = DatahubBbm::fetch_where($where, [$companyInstanceId]);
        
        if ($bbmInstance) {
            return new JsonModel(BbmFormatter::format($bbmInstance));
        }
        
        
        return $this->getResponse()->setStatusCode(204);
    }
}
