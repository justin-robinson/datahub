<?php

namespace Api\Controller;

use Api\Formatter\ContactCollectionFormatter;
use DB\Datahub\Contact;
use Scoop\Database\Model\Generic;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceContactsController
 * @package Api\Controller
 */
class InstanceContactsController extends AbstractRestfulController {

    public function get ($companyInstanceId) {

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page-1);

        $contacts = Contact::fetch_where('companyInstanceId = ?', [$companyInstanceId], $limit, $offset);

        if ( $contacts ) {
            $count = Generic::query('select count(*) as count from contact where companyInstanceId = ?', [$companyInstanceId])->first()->count;
            return new JsonModel(ContactCollectionFormatter::format($contacts, $page, $limit, "/api/instance/{$companyInstanceId}/contacts", $count));
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);

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
