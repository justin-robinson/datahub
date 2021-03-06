<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\ContactCollectionFormatter;
use DB\Datahub\Contact;
use Scoop\Database\Model\Generic;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceContactsController
 * @package Api\v1\Controller
 */
class InstanceContactsController extends AbstractRestfulController
{

    public function get($companyInstanceId)
    {

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);

        $contacts = Contact::fetch_where('companyInstanceId = ?', [$companyInstanceId], $limit, $offset);

        if ($contacts) {
            $count = Generic::query('SELECT count(*) AS count FROM contact WHERE companyInstanceId = ?',
                [$companyInstanceId])->first()->count;

            return new JsonModel(ContactCollectionFormatter::format($contacts, $page, $limit,
                "/api/v1/instance/{$companyInstanceId}/contacts", $count));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
