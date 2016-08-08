<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\ContactCollectionFormatter;
use DB\Datahub\Contact;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class ContactSearchFuzzyController
 * @package Api\v1\Controller
 */
class ContactSearchFuzzyController extends AbstractRestfulController
{

    public function get($_)
    {

        return $this->getList();
    }

    public function getList()
    {

        $searchString = $this->params('search');

        if ( empty($searchString) ) {
            return new JsonModel([]);
        }

        $searchString = "%{$searchString}%";

        $contacts = Contact::fetch_where(
            'firstName LIKE ?
            OR lastName LIKE ?
            OR email LIKE ?
            OR address1 LIKE ?
            OR contactId LIKE ?',
        [$searchString, $searchString, $searchString, $searchString, $searchString]
        );

        if ( $contacts === false ) {
            $contacts = new Rows();
        }

        return new JsonModel(ContactCollectionFormatter::format($contacts));

    }
}
