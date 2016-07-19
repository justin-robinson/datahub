<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\CompanyCollectionFormatter;
use DB\Datahub\Company;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class CompanySearchFuzzyController
 * @package Api\v1\Controller
 */
class CompanySearchFuzzyController extends AbstractRestfulController
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

        $companies = Company::fetch_where(
            'name LIKE ? OR companyId LIKE ?',
            [$searchString, $searchString]
        );

        if ( $companies === false ) {
            $companies = new Rows();
        }

        return new JsonModel(CompanyCollectionFormatter::format($companies));

    }
}
