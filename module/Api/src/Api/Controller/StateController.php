<?php

namespace Api\Controller;

use DB\Datahub\State;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

/**
 * Class StateController
 * @package Api\Controller
 */
class StateController extends AbstractRestfulController {

    public function get ( $stateId ) {

        $state = State::fetch_by_id( $stateId );
        if( $state ) {
            return new JsonModel( $state->to_array() );
        }

        $this->response->setStatusCode(204);
        return null;
    }

    public function create ( $data ) {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $state = new State( $data );
        if( $state->save() ) {
            // get the actual timestamps
            $state->reload();
        }

        return new JsonModel( $state->to_array() );
    }

    public function update ( $stateId, $data ) {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $state = State::fetch_by_id( $stateId );

        if( $state ) {
            $state->populate( $data );
            $state->save();
            $state->reload();

            return new JsonModel( $state->to_array() );
        }

        $this->response->setStatusCode(204);
        return null;

    }

    public function delete ( $id ) {

        $state = State::fetch_by_id( $id );
        if( $state ) {
            $state->delete();
            $state = State::query( 'SELECT * FROM datahub.state WHERE stateId = ?', [ $id ] )->first();

            return new JsonModel( $state->to_array() );
        }

        $this->response->setStatusCode(204);
        return null;
    }

    public function getList () {

        $states = State::fetch_where('1');

        if ( $states->get_num_rows() === 0 ) {
            $this->response->setStatusCode(204);
            return null;
        }

        return new JsonModel($states);
    }
}
