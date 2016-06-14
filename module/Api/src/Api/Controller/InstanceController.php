<?php

namespace Api\Controller;

use Api\Formatter\CompanyInstanceFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceController
 * @package Api\Controller
 */
class InstanceController extends AbstractRestfulController {

    public function get ( $companyInstanceId ) {

        $instance = CompanyInstance::fetch_by_id( $companyInstanceId );
        if( $instance ) {
            return new JsonModel( CompanyInstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );
    }

    public function create ( $data ) {

        // don't allow properties or contacts to be saved
        unset($data['companyInstanceId']);
        unset($data['properties']);
        unset($data['contacts']);

        $instance = new CompanyInstance( $data );
        if( $instance->save() ) {
            // get the actual timestamps
            $instance->reload();
        }

        return new JsonModel( CompanyInstanceFormatter::format( $instance ) );
    }

    public function update ( $companyInstanceId, $data ) {

        // don't allow properties or contacts to be saved
        unset($data['companyInstanceId']);
        unset($data['properties']);
        unset($data['contacts']);

        $instance = CompanyInstance::fetch_by_id( $companyInstanceId );

        if( $instance ) {
            $instance->populate( $data );
            $instance->save();
            $instance->reload();

            return new JsonModel( CompanyInstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );

    }

    public function delete ( $id ) {

        $instance = CompanyInstance::fetch_by_id( $id );
        if( $instance ) {
            $instance->delete();
            $instance = CompanyInstance::query( 'SELECT * FROM datahub.companyInstance WHERE companyInstanceId = ?', [ $id ] )->first();

            return new JsonModel( CompanyInstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );
    }
}
