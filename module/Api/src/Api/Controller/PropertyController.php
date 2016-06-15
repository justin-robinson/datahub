<?php

namespace Api\Controller;

use Api\Formatter\CompanyInstancePropertyFormatter;
use DB\Datahub\CompanyInstanceProperty;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceController
 * @package Api\Controller
 */
class PropertyController extends AbstractRestfulController {

    public function get ( $companyInstancePropertyId ) {

        $instance = CompanyInstanceProperty::fetch_by_id( $companyInstancePropertyId );
        if( $instance ) {
            return new JsonModel( CompanyInstancePropertyFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );
    }

    public function create ( $data ) {

        // don't allow properties or contacts to be saved
        unset($data['companyInstancePropertyId']);

        $instance = new CompanyInstanceProperty( $data );
        if( $instance->save() ) {
            // get the actual timestamps
            $instance->reload();
        }

        return new JsonModel( CompanyInstancePropertyFormatter::format( $instance ) );
    }

    public function update ( $companyInstancePropertyId, $data ) {

        // don't allow properties or contacts to be saved
        unset($data['companyInstancePropertyId']);

        $instance = CompanyInstanceProperty::fetch_by_id( $companyInstancePropertyId );

        if( $instance ) {
            $instance->populate( $data );
            $instance->save();
            $instance->reload();

            return new JsonModel( CompanyInstancePropertyFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );

    }

    public function delete ( $id ) {

        $instance = CompanyInstanceProperty::fetch_by_id( $id );
        if( $instance ) {
            $instance->delete();
            $instance = CompanyInstanceProperty::query( 'SELECT * FROM datahub.companyInstanceProperty WHERE companyInstancePropertyId = ?', [ $id ] )->first();

            return new JsonModel( CompanyInstancePropertyFormatter::format( $instance ) );
        }

        $this->response->setStatusCode( 404 );

        return new JsonModel( [ 'message' => 'not found' ] );
    }
}
