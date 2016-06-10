<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\Controller;

use Api\Response\CompanyResponse;
use DB\Datahub\Company;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyController
 *
 * @package Api\Controller
 */
class CompanyController extends AbstractRestfulController
{
    /**
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function get($companyId)
    {
        $company = Company::fetch_company_and_instances($companyId);

        if ( $company ) {
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
        }

        return new JsonModel($company);
    }

    /**
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function delete($companyId)
    {
        return new JsonModel(['delete' => 'record deleted']);
    }


    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(['create' => $data]);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel(['update' => $data]);
    }

    /**
     * @return JsonModel
     */
    public function getList()
    {
        $from = isset($_GET['from']) ? $_GET['from'] : '1970-01-01 00:00:00';
        $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d H:i:s');
        $limit = 1000;
        $offset = $limit * (((isset($_GET['page']) && (int)$_GET['page'] >= 1 ) ? $_GET['page'] : 1)-1);
        $companies = Company::fetch_modified_in_range( $from, $to, $offset, $limit);

        $sortedProperties = [];
        foreach ( $companies as $company ) {
            foreach ( $company->get_company_instances() as $instance ) {
                $sortedProperties[] = $instance->sort_properties();
            }
        }

        $companies = $companies->to_array();

        // replace instance properties with sorted ones
        reset($sortedProperties);
        foreach ( $companies as &$company ) {
            foreach ( $company['instances'] as &$instance ) {
                $instance['properties'] = current( $sortedProperties );
                next( $sortedProperties );
            }
        }

        return new JsonModel($companies);
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
