<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetCollectionFormatter;
use Api\v1\ResponseFormatter\FormatterHelpers;
use DB\Datahub\Dataset;
use Elasticsearch\ClientBuilder;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class DatasetSearchElasticController
 * @package Api\v1\Controller
 */
class DatasetSearchElasticController extends AbstractRestfulController
{

    public function get($_)
    {

        return $this->getList();
    }

    public function getList()
    {

        $config = $this->getServiceLocator()->get('Config')['elastica-datahub'];

        $searchTerm = $this->params()->fromRoute('search');

        $index = $type = 'datasets';

        if (empty($searchTerm)) {
            $response = [
                'error'       => "missing 'search' parameter array",
                'ex'          => FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '/sanfrancisco',
                'searchTerms' => [],
            ];

            // create the elastic client
            $elasticClient = ClientBuilder::create()
                                          ->setHosts(["{$config['host']}:{$config['port']}/$index"])
                                          ->build();

            $elasticResponse = $elasticClient->info();
            if (isset($elasticResponse[$index]['mappings'][$type]['properties'])) {
                foreach ($elasticResponse[$index]['mappings'][$type]['properties'] as $propertyName => $value) {
                    $response['searchTerms'][] = $propertyName;
                }
            }

            return new JsonModel($response);
        }

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 100);
        $offset = $limit * ($page - 1);

        // create the elastic client
        $elasticClient = ClientBuilder::create()
                                      ->setHosts(["{$config['host']}:{$config['port']}"])
                                      ->build();

        // our elastic query
        $params = [
            'index' => $index,
            'type'  => $type,
            'size' => $limit,
            'from' => $offset,
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $searchTerm,
                        'fields' => [
                            'name^3',
                            'description^3',
                            'market_code^2',
                        ]
                    ]
                ]
            ],
        ];

        // query elastic
        $elasticResponse = $elasticClient->search($params);

        // did we get a hit?
        if (empty($elasticResponse['hits']['hits'])) {
            return $this->getResponse()->setStatusCode(204);
        }

        $datasets = new Rows();
        $queryParams = [];
        foreach ($elasticResponse['hits']['hits'] as $hit) {

            $queryParams[] = $hit['_id'];
        }

        if ( !empty($queryParams) ) {
            $queryPlaceholders = implode(',', array_fill(0, count($queryParams), '?'));
            $datasets = Dataset::fetch_where("id IN ( {$queryPlaceholders} )", $queryParams);
        }

        if ($datasets->get_num_rows() === 0) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel(DatasetCollectionFormatter::format($datasets, $page, $limit, $elasticResponse['hits']['total']));
    }
}
