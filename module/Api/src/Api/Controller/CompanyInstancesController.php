<?php

namespace Api\Controller;

use Api\ResponseFormatter\InstanceCollectionFormatter;
use DB\Datahub\CompanyInstance;
use Scoop\Database\Model\Generic;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyInstancesController
 * @package Api\Controller
 */
class CompanyInstancesController extends AbstractRestfulController {

    public function get ($companyId) {

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page-1);

        $companyInstances = CompanyInstance::fetch_where('companyId = ?', [$companyId], $limit, $offset);
        if ( $companyInstances ) {
            $count = Generic::query('select count(*) as count from companyInstance where companyId = ?', [$companyId])->first()->count;
            return new JsonModel(InstanceCollectionFormatter::format($companyInstances, $page, $limit, "/api/company/{$companyId}/instances", $count));
        }

        $this->response->setStatusCode(204);
        return null;

    }

    public function create ($data) {

        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);
    }

    public function update ($companyId, $data) {

        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);

    }

    public function delete ( $id ) {

        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);
    }
}
