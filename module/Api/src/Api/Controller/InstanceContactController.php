<?php

namespace Api\Controller;

use Api\Formatter\ContactFormatter;
use DB\Datahub\Contact;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceContactController
 * @package Api\Controller
 */
class InstanceContactController extends AbstractRestfulController {

    public function get ($companyInstanceId) {

        $contactRows = Contact::fetch_where('companyInstanceId = ?', [$companyInstanceId]);

        if ( $contactRows->get_num_rows() === 0 ) {
            $this->response->setStatusCode(404);
            return new JsonModel(['message' => 'not found']);
        }

        $contacts = [];
        foreach ( $contactRows as $contact ) {
            $contacts[] = ContactFormatter::format($contact);
        }
        return new JsonModel($contacts);

    }

    public function create ($data) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);
    }

    public function update ($companyId, $data) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);

    }

    public function delete ( $id ) {

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not allowed']);
    }
}
