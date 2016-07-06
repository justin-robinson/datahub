<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 7/6/16
 * Time: 10:08 AM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetFormatter;
use DB\Datahub\Dataset;
use Zend\View\Model\JsonModel;

/**
 * Class DatasetController
 *
 * @package Api\v1\Controller
 */
class DatasetController extends AbstractRestfulController
{
    /**
     * @param $setId
     *
     * @return JsonModel
     */
    public function get($setId)
    {
        /** @var $set \DB\Datahub\Dataset */
        $set = Dataset::fetch_by_id($setId);
        $set->fetchDatasetEntries();
        if ($set) {
            return new JsonModel(DatasetFormatter::format($set));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {
        $set = new Dataset($data);
        if ($set->save()) {
            // get the actual timestamps
            $set->reload();
        }

        return new JsonModel(DatasetFormatter::format($set, true));
    }

}