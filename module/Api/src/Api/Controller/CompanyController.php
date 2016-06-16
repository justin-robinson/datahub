<?php

namespace Api\Controller;

use Api\Formatter\CompanyCollectionFormatter;
use Api\Formatter\CompanyFormatter;
use DB\Datahub\Company;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyController
 * @package Api\Controller
 */
class CompanyController extends AbstractRestfulController {

    public function get ( $companyInstanceId) {
        $company = Company::fetch_by_id( $companyInstanceId);
        if ( $company ) {
            return new JsonModel(CompanyFormatter::format($company));
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);
    }

    public function create ($data) {

        // don't allow instances to be saved
        unset($data['companyId']);
        unset($data['instances']);

        $company = new Company($data);
        if ( $company->save() ) {
            // get the actual timestamps
            $company->reload();
        }
        return new JsonModel(CompanyFormatter::format($company));
    }

    public function update ($companyId, $data) {

        // don't allow instances to be saved
        unset($data['companyId']);
        unset($data['instances']);

        $company = Company::fetch_by_id($companyId);

        if ( $company ) {
            $company->populate($data);
            $company->save();
            $company->reload();
            return new JsonModel(CompanyFormatter::format($company));
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);

    }

    public function delete ( $id ) {

        $company = Company::fetch_by_id($id);
        if ( $company ) {
            $company->delete();
            $company = Company::query('select * from datahub.company where companyId = ?', [$id])->first();
            return new JsonModel(CompanyFormatter::format($company));
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);
    }

    public function getList () {

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page-1);

        $companies = Company::fetch($limit, $offset);

        if ( $companies ) {
            return new JsonModel(CompanyCollectionFormatter::format($companies, $page, $limit));
        }

        $this->response->setStatusCode(404);
        return new JsonModel(['message' => 'not found']);
    }
}
