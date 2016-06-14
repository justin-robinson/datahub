<?php

namespace Api\Controller;

use DB\Datahub\Company;
use Zend\View\Model\JsonModel;

class CompanyController extends AbstractRestfulController {

    public function get ($companyId) {
        $company = Company::fetch_by_id($companyId);
        if ( $company ) {
            $company->fetch_company_instances();
            $company = $company->to_array();
            $company['instanceIds'] = [];
            foreach ( $company['instances'] as $instance ) {
                $company['instanceIds'][] = $instance->companyInstanceId;
            }
            unset($company['instances']);
            return new JsonModel($company);
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);
    }

    public function create ($data) {

        // don't allow instances to be saved
        if ( array_key_exists('instances', $data) ) {
            unset($data['instances']);
        }

        $company = new Company($data);
        if ( $company->save() ) {
            // get the actual timestamps
            $company->reload();
        }
        return new JsonModel($company->to_array());
    }

    public function update ($companyId, $data) {

        // don't allow instances to be saved
        if ( array_key_exists('instances', $data) ) {
            unset($data['instances']);
        }

        $company = Company::fetch_by_id($companyId);

        if ( $company ) {
            $company->populate($data);
            $company->save();
            $company->reload();
            return new JsonModel($company->to_array());
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);

    }

    public function delete ( $id ) {

        $company = Company::fetch_by_id($id);
        if ( $company ) {
            $company->delete();
            $company = Company::query('select * from datahub.company where companyId = ?', [$id])->first();
            $company = $company ? $company->to_array() : [$company];
            return new JsonModel($company);
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);
    }
}
