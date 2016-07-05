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

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page - 1);

        $contacts = CompanyInstanceProperty::fetch_where('companyInstanceId = ?', [$companyInstanceId], $limit,
            $offset);

        if ($contacts) {
            $count = Generic::query('SELECT count(*) AS count FROM companyInstanceProperty WHERE companyInstanceId = ?',
                [$companyInstanceId])->first()->count;

            return new JsonModel(PropertyCollectionFormatter::format($contacts, $page, $limit,
                "/api/v1/instance/{$companyInstanceId}/properties", $count));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
