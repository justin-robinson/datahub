<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\Controller;

use Api\ResponseFormatter\CompanyProfileCollectionFormatter;
use Api\ResponseFormatter\CompanyProfileFormatter;
use Api\Response\CompanyResponse;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyProfileController
 *
 * @package Api\Controller
 */
class CompanyProfileController extends AbstractRestfulController
{
    /**
     * @param mixed $companyId
     *
*@return JsonModel
     */
    public function get($companyId)
    {

        $company = Company::fetch_company_and_instances($companyId);

        if ($company === false) {
            $this->response->setStatusCode(204);
            return null;
        }

        return new JsonModel(CompanyProfileFormatter::format($company));
    }

    /**
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function delete($companyId)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);
    }


    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
        return new JsonModel(['message' => 'not allowed']);
    }

    /**
     * @return JsonModel|void
     */
    public function getList()
    {
        $from = isset($_GET['from']) ? $_GET['from'] : '0';
        $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d H:i:s');
        $page = (isset($_GET['page']) && (int)$_GET['page'] >= 1 ) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 1000;
        $offset = $limit * ($page-1);

        try {
            $count = Company::fetch_modified_in_range_count($from, $to);
            $companies = $count ? Company::fetch_modified_in_range($from, $to, $offset, $limit) : false;

            if ($companies === false) {
                $this->response->setStatusCode(204);
                return null;
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


            return new JsonModel(CompanyProfileCollectionFormatter::format($companies, $page, $limit, $count, $from, $to));
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);
            return new JsonModel(['error' => true, 'message' => 'ERROR: ' . $e->getMessage()]);
        }
    }

    /**
     * Return a list of deleted records
     *
     * @return JsonModel|void
     */
    public function deleteListAction()
    {
        $from = isset($_GET['from']) ? $_GET['from'] : '0';
        $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d H:i:s');
        $page = (isset($_GET['page']) && (int)$_GET['page'] >= 1 ) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 1000;
        $offset = $limit * ($page-1);

        try {
            $count = Company::fetch_deleted_in_range_count($from, $to);
            $companies = $count ? Company::fetch_deleted_in_range($from, $to, $offset, $limit) : false;

            if ($companies === false) {
                $this->response->setStatusCode(204);
                return null;
            }

            foreach ($companies as $company) {
                /**
                 * @var $company Company
                 */
                $company->fetch_deleted_company_instances();

                foreach ($company->get_company_instances() as $instance) {
                    /**
                     * @var $instance CompanyInstance
                     */
                    //$instance->fetch_properties(true);
                    $instance->fetch_contacts();
                    //$instance->fetch_state();
                    //$instance->fetch_channel_ids();
                }
            }


            return new JsonModel(CompanyProfileCollectionFormatter::format($companies, $page, $limit, $count, $from, $to));
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

        $response = new CompanyResponse();

        if ( $company ) {

            // the company instances
            $company->fetch_company_instances();

            // sorted list of properties
            $sortedProperties = [];

            // get and sort all properties and contacts
            foreach ( $company->get_company_instances() as $instance ) {

                // get
                $instance->fetch_properties();

                // sort
                $sortedProperties[] = $instance->sort_properties();

                // contacts
                $instance->fetch_contacts();
            }

            // convert to array
            $company = $company->to_array();

            // replace instance properties with sorted ones
            reset($sortedProperties);
            foreach ( $company['instances'] as &$instance ) {
                $instance['properties'] = current($sortedProperties);
                next($sortedProperties);
            }

            $response->success = true;
        } else {

            $response->message = "company not found";
        }

        $response->body = $company;


        return new JsonModel($response->toArray());
    }



}
