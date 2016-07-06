<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\CompanyCollectionFormatter;
use Api\v1\ResponseFormatter\CompanyFormatter;
use Api\v1\ResponseFormatter\FormatterHelpers;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use Elasticsearch\ClientBuilder;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class CompanyController
 * @package Api\v1\Controller
 */
class CompanyController extends AbstractRestfulController
{

    public function get($companyId)
    {

        $company = Company::fetch_by_id($companyId);
        if ($company) {
            return new JsonModel(CompanyFormatter::format($company));
        }

        return $this->getResponse()->setStatusCode(204);

    }

    public function create($data)
    {

        // don't allow instances to be saved
        unset($data['companyId']);
        unset($data['instances']);

        $company = new Company($data);
        if ($company->save()) {
            // get the actual timestamps
            $company->reload();
        }

        return new JsonModel(CompanyFormatter::format($company));
    }

    public function update($companyId, $data)
    {

        // don't allow instances to be saved
        unset($data['companyId']);
        unset($data['instances']);

        $company = Company::fetch_by_id($companyId);

        if ($company) {
            $company->populate($data);
            $company->save();
            $company->reload();

            return new JsonModel(CompanyFormatter::format($company));
        }

        return $this->getResponse()->setStatusCode(204);

    }

    public function delete($id)
    {

        $company = Company::fetch_by_id($id);
        if ($company) {
            $company->delete();
            $company = Company::query('SELECT * FROM datahub.company WHERE companyId = ?', [$id])->first();

            return new JsonModel(CompanyFormatter::format($company));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function getList()
    {
        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = 1000;
        $offset = $limit * ($page - 1);

        $companies = Company::fetch($limit, $offset);

        if ($companies) {
            return new JsonModel(CompanyCollectionFormatter::format($companies, $page, $limit));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
