<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\PropertyCollectionFormatter;
use DB\Datahub\CompanyInstanceProperty;
use Scoop\Database\Model\Generic;
use Zend\View\Model\JsonModel;

/**
 * Class InstancePropertiesController
 * @package Api\v1\Controller
 */
class InstancePropertiesController extends AbstractRestfulController
{

    public function get($companyInstanceId)
    {

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);

        $properties = CompanyInstanceProperty::fetch_where('companyInstanceId = ?', [$companyInstanceId], $limit,
            $offset);

        if ($properties) {
            $count = Generic::query('SELECT count(*) AS count FROM companyInstanceProperty WHERE companyInstanceId = ?',
                [$companyInstanceId])->first()->count;

            return new JsonModel(PropertyCollectionFormatter::format($properties, $page, $limit,
                "/api/v1/instance/{$companyInstanceId}/properties", $count));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
