<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\CompanyProfileCollectionFormatter;
use Api\v1\ResponseFormatter\CompanyProfileFormatter;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyProfileController
 * @package Api\v1\Controller
 */
class CompanyProfileController extends AbstractRestfulController
{

    /**
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function get($companyId)
    {

        $company = Company::fetch_company_and_instances($companyId);

        if ($company === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel(CompanyProfileFormatter::format($company));
    }

    /**
     * @return JsonModel|void
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

        try {
            if ($companies === false) {
                return $this->getResponse()->setStatusCode(204);
            }

            foreach ($companies as $company) {
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

            return new JsonModel(CompanyProfileCollectionFormatter::format($companies, $page, $limit, $count, $from,
                $to, '/api/v1/company/profiles'));
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);

            return new JsonModel(['error' => true, 'message' => 'ERROR: ' . $e->getMessage()]);
        }
    }

    /**
     * @return JsonModel|void
     */
    public function deleteListAction()
    {

        $from = $this->params()->fromQuery('from', '0');
        $to = $this->params()->fromQuery('to', date('Y-m-d H:i:s'));
        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);
        $count = Company::fetch_deleted_instances_in_range_count($from, $to);
        $companies = $count ? Company::fetch_deleted_instances_in_range($from, $to, $offset, $limit) : false;

        try {
            if ($companies === false) {
                return $this->getResponse()->setStatusCode(204);
            }

            foreach ($companies as $company) {
                /**
                 * @var $company Company
                 */
                $company->fetch_deleted_company_instances();
            }

            return new JsonModel(CompanyProfileCollectionFormatter::format($companies, $page, $limit, $count, $from,
                $to, '/api/v1/company/profiles/deletes'));
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);

            return new JsonModel(['error' => true, 'message' => 'ERROR: ' . $e->getMessage()]);
        }
    }


    /**
     * @return JsonModel
     * this is a bridge method to look up companies by the refinery_id
     * since datahub will eventually replace refinery, it will be depricated
     * at that time
     */
    public function refineryAction()
    {

        // get id from url
        $refineryId = $this->params()->fromRoute('id');

        $company = Company::fetch_by_source_name_and_id('refinery%', $refineryId);

        if ($company === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        foreach ($company->fetch_company_instances() as $instance) {
            /**
             * @var $instance CompanyInstance
             */
            $instance->fetch_properties();
            $instance->fetch_contacts();
            $instance->fetch_state();
            $instance->fetch_channel_ids();
        }

        return new JsonModel(CompanyProfileFormatter::format($company));

    }


}
