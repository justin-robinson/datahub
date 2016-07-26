<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\InstanceCollectionFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceSearchFuzzyController
 * @package Api\v1\Controller
 */
class InstanceSearchFuzzyController extends AbstractRestfulController
{

    public function get($_)
    {

        return $this->getList();
    }

    public function getList()
    {

        $searchString = $this->params('search');

        if ( empty($searchString) ) {
            return new JsonModel([]);
        }

        $searchString = "%{$searchString}%";

        $instances = CompanyInstance::fetch_where(
            'name LIKE ? OR companyInstanceId LIKE ?',
            [$searchString, $searchString]
        );

        if ( $instances === false ) {
            return new JsonModel([]);
        }

        return new JsonModel(InstanceCollectionFormatter::format($instances));

    }
}
