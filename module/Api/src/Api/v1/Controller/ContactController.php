<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\ContactFormatter;
use DB\Datahub\Contact;
use Zend\View\Model\JsonModel;

/**
 * Class ContactController
 * @package Api\v1\Controller
 */
class ContactController extends AbstractRestfulController {

    public function get ( $contactId ) {

        $contact = Contact::fetch_by_id( $contactId );
        if( $contact ) {
            return new JsonModel( ContactFormatter::format( $contact ) );
        }

        $this->response->setStatusCode(204);
        return null;
    }

    public function create ( $data ) {

        // don't allow properties or contacts to be saved
        unset($data['contactId']);

        $contact = new Contact( $data );
        if( $contact->save() ) {
            // get the actual timestamps
            $contact->reload();
        }

        return new JsonModel( ContactFormatter::format( $contact ) );
    }

    public function update ( $contactId, $data ) {

        // don't allow properties or contacts to be saved
        unset($data['contactId']);

        $contact = Contact::fetch_by_id( $contactId );

        if( $contact ) {
            $contact->populate( $data );
            $contact->save();
            $contact->reload();

            return new JsonModel( ContactFormatter::format( $contact ) );
        }

        $this->response->setStatusCode(204);
        return null;

    }

    public function delete ( $id ) {

        $contact = Contact::fetch_by_id( $id );
        if( $contact ) {
            $contact->delete();
            $contact = Contact::query( 'SELECT * FROM datahub.contact WHERE contactId = ?', [ $id ] )->first();

            return new JsonModel( ContactFormatter::format( $contact ) );
        }

        $this->response->setStatusCode(204);
        return null;
    }
}
