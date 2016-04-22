<?php

namespace Api\Controller;

use Api\Response\PublicCompanyResponse;
use Elastica\Client;
use Elastica\Query;
use Elastica\QueryBuilder;
use Elastica\Search;
use Elasticsearch\ClientBuilder;
use Zend\View\Model\JsonModel;

/**
 * Class PublicCompanyController
 * @package Api\Controller
 */
class PublicCompanyController extends AbstractRestfulController {

    /**
     * @return JsonModel
     */
    public function indexAction () {

        $response = new PublicCompanyResponse();

        switch ( $_SERVER['REQUEST_METHOD'] ) {
            case 'GET':
            case 'POST':
                if( empty($_REQUEST['search']) || !is_array( $_REQUEST['search'] ) ) {
                    $response->message = "missing 'search' parameter array";
                } else {
                    $response = $this->findDatahubCompanyThroughElastic( $_REQUEST['search'] );
                }
                break;
            default:
                $response->message = $_SERVER['REQUEST_METHOD'] . ' not allowed';
                break;
        }

        return new JsonModel($response->toArray());

    }

    /**
     * @param array $elasticSearchTerms
     *
     * @return array
     */
    private function findDatahubCompanyThroughElastic ( array $elasticSearchTerms ) {

        // load our datahub config
        $config = $this->getServiceLocator()->get( 'Config' )['elastica-datahub'];

        // create the elastic client
        $elasticClient = ClientBuilder::create()
                                      ->setHosts( [ $config['host'] . ':' . $config['port'] ] )
                                      ->build();

        // our elastic query
        $params = [
            'index' => 'companies',
            'type'  => 'company',
            'body'  => [
                'query' => [
                    'bool' => [
                        'should' => [ ],
                    ],
                ],
            ],
        ];

        // add all search terms to the elastic query
        foreach ( $elasticSearchTerms as $searchTermName => &$searchTerm ) {
            $params['body']['query']['bool']['must'][] = [ 'match' => [ $searchTermName => $searchTerm ] ];
        }

        // query elastic
        $elasticResponse = $elasticClient->search( $params );

        // our api response
        $response = new PublicCompanyResponse();

        // did we get a hit?
        if( isset($elasticResponse['hits']['hits'][0]) ) {

            // find company by refinery_id in url
            $record = $this->getServiceLocator()->get( '\Hub\Model\Company' )
                           ->findOneBy(
                               [ 'refinery_id' => $elasticResponse['hits']['hits'][0]['_source']['InternalId'] ] );

            // we find?
            if ( $record ) {
                $response->success = true;
                $response->body = $record->toArray( true );
            } else {
                $response->message = 'record not found';
            }
        } else {
            $response->message = 'match not found';
        }

        return $response;
    }

}
