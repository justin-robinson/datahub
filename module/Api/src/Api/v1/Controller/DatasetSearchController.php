<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetCollectionFormatter;
use DB\Datahub\Dataset;
use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class DatasetSearchController
 * @package Api\v1\Controller
 */
class DatasetSearchController extends AbstractRestfulController
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

        $datasets = Dataset::fetch_where('name LIKE ?', [$searchString]);

        if ( $datasets === false ) {
            $datasets = new Rows();
            $totalCount = 0;
        } else {
            $totalCount = Generic::query('select count(*) as count from dataset where name like ?', [$searchString])->first()->count;
        }

        return new JsonModel(DatasetCollectionFormatter::format($datasets, 1, 1000, $totalCount));

    }
}
