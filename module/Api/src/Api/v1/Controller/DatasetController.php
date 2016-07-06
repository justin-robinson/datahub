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
        $set = Dataset::fetch_by_id($setId);
        $set->fetchDatasetEntries();
        if ($set) {
            return new JsonModel(DatasetFormatter::format($set));
        }
        return $this->getResponse()->setStatusCode(204);
    }

}