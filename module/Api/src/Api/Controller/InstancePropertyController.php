<?php

namespace Api\Controller;

use Api\Formatter\CompanyInstancePropertyFormatter;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use Zend\View\Model\JsonModel;

/**
 * Class InstancePropertyController
 * @package Api\Controller
 */
class InstancePropertyController extends AbstractRestfulController {

    public function get ($companyInstanceId) {

        $propertyRows = CompanyInstanceProperty::fetch_where('companyInstanceId = ?', [$companyInstanceId]);

        if ( $propertyRows->get_num_rows() === 0 ) {
            $this->response->setStatusCode(404);
            return new JsonModel(['message' => 'not found']);
        }

        $properties = [];
        foreach ( $propertyRows as $property ) {
            $properties[] = CompanyInstancePropertyFormatter::format($property);
        }
        return new JsonModel($properties);

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
