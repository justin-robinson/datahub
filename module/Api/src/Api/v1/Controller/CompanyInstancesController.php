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

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
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

    public function create($data)
    {

        $this->response->setStatusCode(405);

        return new JsonModel(['message' => 'not allowed']);
    }

    public function update($companyId, $data)
    {

        $this->response->setStatusCode(405);

        return new JsonModel(['message' => 'not allowed']);

    }

    public function delete($id)
    {

        $this->response->setStatusCode(405);

        return new JsonModel(['message' => 'not allowed']);
    }
}
