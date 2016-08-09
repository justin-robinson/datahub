<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\CompanyExportFormatter;
use Api\v1\ResponseFormatter\CompanyProfileCollectionFormatter;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyExportController
 * @package Api\v1\Controller
 */
class CompanyExportController extends AbstractRestfulController {

    /**
     * @return JsonModel
     */
    public function getList()
    {

        $from = $this->params()->fromQuery('from', '0');
        $to = $this->params()->fromQuery('to', date('Y-m-d H:i:s'));
        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);
        $count = Company::fetch_modified_in_range_count($from, $to);
        $companies = $count ? Company::fetch_modified_in_range($from, $to, $offset, $limit) : false;

        try{
            if ( $companies === false) {
                return $this->getResponse()->setStatusCode(204);
            }

            foreach ( $companies as $company ) {
                /**
                 * @var $company Company
                 */
                $company->fetch_company_instances();

                foreach ($company->get_company_instances() as $instance) {
                    /**
                     * @var $instance CompanyInstance
                     */
                    $instance->fetch_properties();
                    $instance->fetch_contacts();
                    $instance->fetch_state();
                    $instance->fetch_channel_ids();
                }
            }

            return new JsonModel(CompanyExportFormatter::format($companies, $page, $limit, $count, $from, $to));
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);

            return new JsonModel(['error' => true, 'message' => 'ERROR: ' . $e->getMessage()]);
        }
    }

    public function deleteListAction ()
    {
        $from = $this->params()->fromQuery('from', '0000-00-00 00:00:01');
        $to = $this->params()->fromQuery('to', date('Y-m-d H:i:s'));
        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);
        $count = Company::fetch_deleted_in_range_count($from, $to);
        $companies = $count ? Company::fetch_deleted_in_range($from, $to, $offset, $limit) : false;

        if ( $companies === false ) {
            return $this->response->setStatusCode(204);
        }

        return new JsonModel(CompanyProfileCollectionFormatter::format($companies, $page, $limit, $count, $from,
            $to, '/api/v1/company/export/deletes'));
    }
}
