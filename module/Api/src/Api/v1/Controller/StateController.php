<?php

namespace Api\v1\Controller;

use DB\Datahub\State;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

/**
 * Class StateController
 * @package Api\v1\Controller
 */
class StateController extends AbstractRestfulController
{

    public function get($stateId)
    {

        $state = State::fetch_by_id($stateId);
        if ($state) {
            return new JsonModel($state->to_array());
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $state = new State($data);
        if ($state->save()) {
            // get the actual timestamps
            $state->reload();
        }

        return new JsonModel($state->to_array());
    }

    public function update($stateId, $data)
    {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $state = State::fetch_by_id($stateId);

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

        $state = State::fetch_by_id($id);
        if ($state) {
            $state->delete();
            $state = State::query('SELECT * FROM datahub.state WHERE stateId = ?', [$id])->first();

            return new JsonModel($state->to_array());
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function getList()
    {

        $states = State::fetch_where('1');

        if ($states) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel($states);
    }
}
