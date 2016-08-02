<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 8/2/16
 * Time: 2:27 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetEntriesFormatter;
use DB\Datahub\Dataset;
use DB\Datahub\DatasetEntries;
use Zend\View\Model\JsonModel;


class DatasetEntriesController extends AbstractRestfulController
{
    public function get($entryId){
        $entry = DatasetEntries::fetch_by_id($entryId);
        if($entry){
            return new JsonModel(DatasetEntriesFormatter::format($entry));
        }
        return $this->getResponse()->setStatusCode(404);
    }
}