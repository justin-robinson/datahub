<?php

namespace Api\Controller;

use Api\Formatter\CompanyInstanceFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyInstanceController
 * @package Api\Controller
 */
class CompanyInstanceController extends AbstractRestfulController {

    public function get ($companyId) {

        $companyInstances = CompanyInstance::fetch_where('companyId = ?', [$companyId]);
        if ( $companyInstances->get_num_rows() === 0 ) {
            $this->response->setStatusCode(404);
            return new JsonModel(['message' => 'not found']);
        }

        $instances = [];
        foreach ( $companyInstances as $instance ) {
            $instances[] = CompanyInstanceFormatter::format($instance);
        }

        return new JsonModel($instances);
    }

    public function create ($data) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);
    }

    public function update ($companyId, $data) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);

    }

    public function delete ( $id ) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);
    }
}
