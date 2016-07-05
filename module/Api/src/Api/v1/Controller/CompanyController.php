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

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1) ? (int)$_GET['page'] : 1;
        $limit = 1000;
        $offset = $limit * ($page - 1);

        $companies = Company::fetch($limit, $offset);

        if ($companies) {
            return new JsonModel(CompanyCollectionFormatter::format($companies, $page, $limit));
        }

        return $this->getResponse()->setStatusCode(204);

    }

    public function searchAction()
    {

        $config = $this->getServiceLocator()->get('Config')['elastica-datahub'];
        if (empty($_GET['search']) || !is_array($_GET['search'])) {
            $response = [
                'error'       => "missing 'search' parameter array",
                'ex'          => FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?search[Name]=Google&search[State]=CA',
                'searchTerms' => [],
            ];
            $client = new \Zend\Http\Client("{$config['host']}:{$config['port']}/companies");
            $elasticResponse = $client->send();
            if ($elasticResponse->isSuccess()) {
                $body = json_decode($elasticResponse->getBody());
                if (isset($body->companies->mappings->company->properties)) {
                    foreach ($body->companies->mappings->company->properties as $propertyName => $value) {
                        $response['searchTerms'] = $propertyName;
                    }
                }
            }

            return new JsonModel($response);
        } else {

            // create the elastic client
            $elasticClient = ClientBuilder::create()
                                          ->setHosts([$config['host'] . ':' . $config['port']])
                                          ->build();

            // our elastic query
            $params = [
                'index' => 'companies',
                'type'  => 'company',
                'body'  => [
                    'query' => [
                        'bool' => [
                            'should' => [],
                        ],
                    ],
                ],
            ];

            // add all search terms to the elastic query
            foreach ($_GET['search'] as $searchTermName => &$searchTerm) {
                $params['body']['query']['bool']['must'][] = ['match' => [$searchTermName => $searchTerm]];
            }

            // query elastic
            $elasticResponse = $elasticClient->search($params);

            // did we get a hit?
            if (empty($elasticResponse['hits']['hits'])) {
                return $this->getResponse()->setStatusCode(204);
            }

            $companies = new Rows();
            foreach ($elasticResponse['hits']['hits'] as $hit) {
                $company = Company::fetch_by_source_name_and_id('refinery%', $hit['_source']['InternalId']);

                if ($company === false) {
                    continue;
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

                $companies->add_row($company);
            }

            if ($companies->get_num_rows() === 0) {
                return $this->getResponse()->setStatusCode(204);
            }

            return CompanyProfileCollectionFormatter::format($companies, 1, 1000, $companies->get_num_rows(), '0', '0',
                '/api/v1/public/company');

        }
    }
}
