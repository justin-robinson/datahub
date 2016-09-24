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
        
        $instance    = CompanyInstance::fetch_where('companyInstanceId = ?', [$companyInstanceId]);
        $bbmInstance = DatahubBbm::fetch_where('dhEntityId = ?', [$instance->first()->companyId]);
        
        if ($bbmInstance) {
            return new JsonModel(BbmFormatter::format($bbmInstance));
        }
        
        
        return $this->getResponse()->setStatusCode(204);
    }
}
