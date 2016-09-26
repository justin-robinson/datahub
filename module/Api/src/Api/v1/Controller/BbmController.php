<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/12/16
 * Time: 3:20 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\BbmFormatter;
use DB\Datahub\CompanyInstance;
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
        
        // is it a refinery request?
        $e     = $this->getEvent();
        $route = $e->getRouteMatch();
        if ($route->getParam('type')) { // came in on the refinery endpoint
            $bbmInstance = DatahubBbm::fetch_where('acbj_refinery_org_id = ?', [$companyInstanceId]);
        } else { // came in on then instanceId endpoint
            $instance    = CompanyInstance::fetch_where('companyInstanceId = ?', [$companyInstanceId]);
            $bbmInstance = DatahubBbm::fetch_where('acbj_datahub_org_id = ?', [$instance->first()->companyId]);
        }
        if ($bbmInstance) {
            return new JsonModel(BbmFormatter::format($bbmInstance));
        }
        return $this->getResponse()->setStatusCode(204);
    }
}
