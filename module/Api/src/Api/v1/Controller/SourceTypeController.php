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

        $state = SourceType::fetch_by_id($sourceTypeId);
        if ($state) {
            return new JsonModel($state->to_array());
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {

        unset($data['sourceTypeId']);

        $state = new State($data);
        if ($state->save()) {
            // get the actual timestamps
            $state->reload();
        }

        return new JsonModel($state->to_array());
    }

    public function update($sourceTypeId, $data)
    {

        // don't allow properties or states to be saved
        unset($data['sourceTypeId']);

        $state = SourceType::fetch_by_id($sourceTypeId);

        if ($state) {
            $state->populate($data);
            $state->save();
            $state->reload();

            return new JsonModel($state->to_array());
        }

        return $this->getResponse()->setStatusCode(204);

    }

    public function delete($id)
    {

        $state = SourceType::fetch_by_id($id);
        if ($state) {
            $state->delete();
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function getList()
    {

        $states = SourceType::fetch_where('1');

        if ($states === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel($states);
    }
}
