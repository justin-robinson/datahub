<?php

namespace Api\Controller;

use Api\ResponseFormatter\InstanceFormatter;
use Api\ResponseFormatter\InstanceCollectionFormatter;
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
            return new JsonModel( InstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode(204);
        return null;
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

        return new JsonModel( InstanceFormatter::format( $instance ) );
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

            return new JsonModel( InstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode(204);
        return null;

    }

    public function delete ( $id ) {

        $instance = CompanyInstance::fetch_by_id( $id );
        if( $instance ) {
            $instance->delete();
            $instance = CompanyInstance::query( 'SELECT * FROM datahub.companyInstance WHERE companyInstanceId = ?', [ $id ] )->first();

            return new JsonModel( InstanceFormatter::format( $instance ) );
        }

        $this->response->setStatusCode(204);
        return null;
    }

    public function getList () {

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page-1);

        $instances = CompanyInstance::fetch($limit, $offset);

        if ( $instances ) {
            return new JsonModel(InstanceCollectionFormatter::format($instances, $page, $limit));
        }

        $this->response->setStatusCode(204);
        return null;

    }
}
