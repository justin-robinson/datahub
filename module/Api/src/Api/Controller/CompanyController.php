<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\Controller;

use Api\Response\CompanyResponse;
use DB\Datahub\Company;
use Zend\Json\Json;
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
        return new JsonModel($company->to_array());
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
        return new JsonModel(['getList' => 'not implemented']);
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

            $company->fetch_company_instances();

            $sortedProperties = [];
            foreach ( $company->get_company_instances() as $instance ) {
                $instance->fetch_properties();
                $sortedProperties[] = $instance->sort_properties();
                $instance->fetch_contacts();
            }

            $company = $company->to_array();

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
