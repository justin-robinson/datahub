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
    public function get($entryId)
    {
        
        $entry = DatasetEntries::fetch_by_id($entryId);
        if ($entry) {
            return new JsonModel(DatasetEntriesFormatter::format($entry));
        }
        
        return $this->getResponse()->setStatusCode(404);
    }
    
    public function create($data)
    {
        $entry = new DatasetEntries($data);
        if ($entry->save()) {
            // get the actual timestamps
            $entry->reload();
        }
        
        return new JsonModel(DatasetEntriesFormatter::format($entry, true));
    }
    public function update($entryId, $data)
    {
        $entry = DatasetEntries::fetch_by_id($entryId);
        $entry->populate($data);
        $entry->save();
        $entry->save();
        return new JsonModel(DatasetEntriesFormatter::format($entry, true));
    }
    
    public function delete($entryId)
    {
                
        $entry = DatasetEntries::fetch_by_id($entryId);
        if ($entry) {
            $entry->delete();
            return $this->getResponse()->setStatusCode(204);
        }
        
        return $this->getResponse()->setStatusCode(500);
    }
}