<?php

namespace Api\v1\Controller;

use DB\Datahub\SourceType;
use Zend\View\Model\JsonModel;

/**
 * Class SourceTypeController
 * @package Api\v1\Controller
 */
class SourceTypeController extends AbstractRestfulController
{

    public function get($sourceTypeId)
    {

        $sourceType = SourceType::fetch_by_id($sourceTypeId);
        if ($sourceType) {
            return new JsonModel($sourceType->to_array());
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {

        unset($data['sourceTypeId']);

        $sourceType = new State($data);
        if ($sourceType->save()) {
            // get the actual timestamps
            $sourceType->reload();
        }

        return new JsonModel($sourceType->to_array());
    }

    public function update($sourceTypeId, $data)
    {

        // don't allow properties or states to be saved
        unset($data['sourceTypeId']);

        $sourceType = SourceType::fetch_by_id($sourceTypeId);

        $statusCode = 204;

        if ($sourceType) {
            $sourceType->populate($data);
            $statusCode = $sourceType->save() ? 200 : 500;
        }

        return $this->getResponse()->setStatusCode($statusCode);

    }

    public function delete($id)
    {

        $sourceType = SourceType::fetch_by_id($id);
        if ($sourceType) {
            $sourceType->delete();
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function getList()
    {

        $sourceTypes = SourceType::fetch_where('1');

        if ($sourceTypes === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel($sourceTypes);
    }
}
