<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\InstanceCollectionFormatter;
use DB\Datahub\CompanyInstance;
use Scoop\Database\Model\Generic;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyInstancesController
 * @package Api\v1\Controller
 */
class CompanyInstancesController extends AbstractRestfulController
{

    public function get($companyId)
    {

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);

        $companyInstances = CompanyInstance::fetch_where('companyId = ?', [$companyId], $limit, $offset);
        if ($companyInstances) {
            $count = Generic::query('SELECT count(*) AS count FROM companyInstance WHERE companyId = ?',
                [$companyId])->first()->count;

            return new JsonModel(InstanceCollectionFormatter::format($companyInstances, $page, $limit,
                "/api/v1/company/{$companyId}/instances", $count));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
