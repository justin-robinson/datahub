<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\InstanceCollectionFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceSearchFuzzyController
 * @package Api\v1\Controller
 */
class InstanceSearchFuzzyController extends AbstractRestfulController
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

        $instances = CompanyInstance::fetch_where(
            'name LIKE ? OR companyInstanceId LIKE ?',
            [$searchString, $searchString]
        );

        if ( $instances === false ) {
            return new JsonModel([]);
        }

        if ( array_key_exists('profile', $this->params()->fromQuery()) ) {
            /**
             * @var $instance CompanyInstance
             */
            foreach ( $instances as $instance ) {
                $instance->fetch_properties();
                $instance->fetch_channel_ids();
                $instance->fetch_contacts();
                $instance->fetch_lists();
                $instance->fetch_state();
            }
        }

        return new JsonModel(InstanceCollectionFormatter::format($instances));


    }
}
